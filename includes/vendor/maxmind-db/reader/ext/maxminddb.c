/* MaxMind, Inc., licenses this file to you under the Apache License, Version
 * 2.0 (the "License"); you may not use this file except in compliance with
 * the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

#include "php_maxminddb.h"

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <php.h>
#include <zend.h>
#include "Zend/zend_exceptions.h"
#include "ext/standard/info.h"
#include <maxminddb.h>

#ifdef ZTS
#include <TSRM.h>
#endif

#define __STDC_FORMAT_MACROS
#include <inttypes.h>

#define PHP_MAXMINDDB_NS ZEND_NS_NAME("MaxMind", "Db")
#define PHP_MAXMINDDB_READER_NS ZEND_NS_NAME(PHP_MAXMINDDB_NS, "Reader")
#define PHP_MAXMINDDB_READER_EX_NS        \
    ZEND_NS_NAME(PHP_MAXMINDDB_READER_NS, \
                 "InvalidDatabaseException")

#ifdef ZEND_ENGINE_3
#define Z_MAXMINDDB_P(zv)  php_maxminddb_fetch_object(Z_OBJ_P(zv))
#define _ZVAL_STRING ZVAL_STRING
#define _ZVAL_STRINGL ZVAL_STRINGL
typedef size_t strsize_t;
typedef zend_object free_obj_t;
#else
#define Z_MAXMINDDB_P(zv) (maxminddb_obj *) zend_object_store_get_object(zv TSRMLS_CC)
#define _ZVAL_STRING(a, b) ZVAL_STRING(a, b, 1)
#define _ZVAL_STRINGL(a, b, c) ZVAL_STRINGL(a, b, c, 1)
typedef int strsize_t;
typedef void free_obj_t;
#endif

#ifdef ZEND_ENGINE_3
typedef struct _maxminddb_obj {
    MMDB_s *mmdb;
    zend_object std;
} maxminddb_obj;
#else
typedef struct _maxminddb_obj {
    zend_object std;
    MMDB_s *mmdb;
} maxminddb_obj;
#endif

PHP_FUNCTION(maxminddb);

static const MMDB_entry_data_list_s *handle_entry_data_list(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value
    TSRMLS_DC);
static const MMDB_entry_data_list_s *handle_array(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value TSRMLS_DC);
static const MMDB_entry_data_list_s *handle_map(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value TSRMLS_DC);
static void handle_uint128(const MMDB_entry_data_list_s *entry_data_list,
                           zval *z_value TSRMLS_DC);
static void handle_uint64(const MMDB_entry_data_list_s *entry_data_list,
                          zval *z_value TSRMLS_DC);
static void handle_uint32(const MMDB_entry_data_list_s *entry_data_list,
                          zval *z_value TSRMLS_DC);
static zend_class_entry * lookup_class(const char *name TSRMLS_DC);

#define CHECK_ALLOCATED(val)                  \
    if (!val ) {                              \
        zend_error(E_ERROR, "Out of memory"); \
        return;                               \
    }                                         \

#define THROW_EXCEPTION(name, ... )                                      \
    {                                                                    \
        zend_class_entry *exception_ce = lookup_class(name TSRMLS_CC);   \
        zend_throw_exception_ex(exception_ce, 0 TSRMLS_CC, __VA_ARGS__); \
    }                                                                    \


#if PHP_VERSION_ID < 50399
#define object_properties_init(zo, class_type)          \
    {                                                   \
        zval *tmp;                                      \
        zend_hash_copy((*zo).properties,                \
                       &class_type->default_properties, \
                       (copy_ctor_func_t)zval_add_ref,  \
                       (void *)&tmp,                    \
                       sizeof(zval *));                 \
    }
#endif

static zend_object_handlers maxminddb_obj_handlers;
static zend_class_entry *maxminddb_ce;

static inline maxminddb_obj *php_maxminddb_fetch_object(zend_object *obj TSRMLS_DC){
#ifdef ZEND_ENGINE_3
	return (maxminddb_obj *)((char*)(obj) - XtOffsetOf(maxminddb_obj, std));
#else
	return (maxminddb_obj *)obj;
#endif
}

ZEND_BEGIN_ARG_INFO_EX(arginfo_maxmindbreader_construct, 0, 0, 1)
    ZEND_ARG_INFO(0, db_file)
ZEND_END_ARG_INFO()

PHP_METHOD(MaxMind_Db_Reader, __construct){
    char *db_file = NULL;
    strsize_t name_len;
    zval * _this_zval = NULL;

    if (zend_parse_method_parameters(ZEND_NUM_ARGS() TSRMLS_CC, getThis(), "Os",
            &_this_zval, maxminddb_ce, &db_file, &name_len) == FAILURE) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "The constructor takes exactly one argument.");
        return;
    }

    if (0 != php_check_open_basedir(db_file TSRMLS_CC) || 0 != access(db_file, R_OK)) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "The file \"%s\" does not exist or is not readable.",
                        db_file);
        return;
    }

    MMDB_s *mmdb = (MMDB_s *)emalloc(sizeof(MMDB_s));
    uint16_t status = MMDB_open(db_file, MMDB_MODE_MMAP, mmdb);

    if (MMDB_SUCCESS != status) {
        THROW_EXCEPTION(
            PHP_MAXMINDDB_READER_EX_NS,
            "Error opening database file (%s). Is this a valid MaxMind DB file?",
            db_file);
        efree(mmdb);
        return;
    }

    maxminddb_obj *mmdb_obj = Z_MAXMINDDB_P(getThis());
    mmdb_obj->mmdb = mmdb;
}

ZEND_BEGIN_ARG_INFO_EX(arginfo_maxmindbreader_get, 0, 0, 1)
    ZEND_ARG_INFO(0, ip_address)
ZEND_END_ARG_INFO()

PHP_METHOD(MaxMind_Db_Reader, get){
    char *ip_address = NULL;
    strsize_t name_len;
    zval * _this_zval = NULL;

    if (zend_parse_method_parameters(ZEND_NUM_ARGS() TSRMLS_CC, getThis(), "Os",
            &_this_zval, maxminddb_ce, &ip_address, &name_len) == FAILURE) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "Method takes exactly one argument.");
        return;
    }

    const maxminddb_obj *mmdb_obj =
        (maxminddb_obj *)Z_MAXMINDDB_P(getThis());

    MMDB_s *mmdb = mmdb_obj->mmdb;

    if (NULL == mmdb) {
        THROW_EXCEPTION("BadMethodCallException",
                        "Attempt to read from a closed MaxMind DB.");
        return;
    }

    int gai_error = 0;
    int mmdb_error = MMDB_SUCCESS;
    MMDB_lookup_result_s result =
        MMDB_lookup_string(mmdb, ip_address, &gai_error,
                           &mmdb_error);

    if (MMDB_SUCCESS != gai_error) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "The value \"%s\" is not a valid IP address.",
                        ip_address);
        return;
    }

    if (MMDB_SUCCESS != mmdb_error) {
        char *exception_name;
        if (MMDB_IPV6_LOOKUP_IN_IPV4_DATABASE_ERROR == mmdb_error) {
            exception_name = "InvalidArgumentException";
        } else {
            exception_name = PHP_MAXMINDDB_READER_EX_NS;
        }
        THROW_EXCEPTION(exception_name,
                        "Error looking up %s. %s",
                        ip_address, MMDB_strerror(mmdb_error));
        return;
    }

    MMDB_entry_data_list_s *entry_data_list = NULL;

    if (!result.found_entry) {
        RETURN_NULL();
    }

    int status = MMDB_get_entry_data_list(&result.entry, &entry_data_list);

    if (MMDB_SUCCESS != status) {
        THROW_EXCEPTION(PHP_MAXMINDDB_READER_EX_NS,
                        "Error while looking up data for %s. %s",
                        ip_address, MMDB_strerror(status));
        MMDB_free_entry_data_list(entry_data_list);
        return;
    } else if (NULL == entry_data_list) {
        THROW_EXCEPTION(
            PHP_MAXMINDDB_READER_EX_NS,
            "Error while looking up data for %s. Your database may be corrupt or you have found a bug in libmaxminddb.",
            ip_address);
        return;
    }

    handle_entry_data_list(entry_data_list, return_value TSRMLS_CC);
    MMDB_free_entry_data_list(entry_data_list);
}

ZEND_BEGIN_ARG_INFO_EX(arginfo_maxmindbreader_void, 0, 0, 0)
ZEND_END_ARG_INFO()

PHP_METHOD(MaxMind_Db_Reader, metadata){
    if (ZEND_NUM_ARGS() != 0) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "Method takes no arguments.");
        return;
    }

    const maxminddb_obj *const mmdb_obj =
        (maxminddb_obj *)Z_MAXMINDDB_P(getThis());

    if (NULL == mmdb_obj->mmdb) {
        THROW_EXCEPTION("BadMethodCallException",
                        "Attempt to read from a closed MaxMind DB.");
        return;
    }

    const char *const name = ZEND_NS_NAME(PHP_MAXMINDDB_READER_NS, "Metadata");
    zend_class_entry *metadata_ce = lookup_class(name TSRMLS_CC);

    object_init_ex(return_value, metadata_ce);

#ifdef ZEND_ENGINE_3
    zval _metadata_array;
    zval *metadata_array = &_metadata_array;
    ZVAL_NULL(metadata_array);
#else
    zval *metadata_array;
    ALLOC_INIT_ZVAL(metadata_array);
#endif

    MMDB_entry_data_list_s *entry_data_list;
    MMDB_get_metadata_as_entry_data_list(mmdb_obj->mmdb, &entry_data_list);

    handle_entry_data_list(entry_data_list, metadata_array TSRMLS_CC);
    MMDB_free_entry_data_list(entry_data_list);
#ifdef ZEND_ENGINE_3
    zend_call_method_with_1_params(return_value, metadata_ce,
                                   &metadata_ce->constructor,
                                   ZEND_CONSTRUCTOR_FUNC_NAME,
                                   NULL,
                                   metadata_array);
    zval_ptr_dtor(metadata_array);
#else
    zend_call_method_with_1_params(&return_value, metadata_ce,
                                   &metadata_ce->constructor,
                                   ZEND_CONSTRUCTOR_FUNC_NAME,
                                   NULL,
                                   metadata_array);
    zval_ptr_dtor(&metadata_array);
#endif
}

PHP_METHOD(MaxMind_Db_Reader, close){
    if (ZEND_NUM_ARGS() != 0) {
        THROW_EXCEPTION("InvalidArgumentException",
                        "Method takes no arguments.");
        return;
    }

    maxminddb_obj *mmdb_obj =
	(maxminddb_obj *)Z_MAXMINDDB_P(getThis());

    if (NULL == mmdb_obj->mmdb) {
        THROW_EXCEPTION("BadMethodCallException",
                        "Attempt to close a closed MaxMind DB.");
        return;
    }
    MMDB_close(mmdb_obj->mmdb);
    efree(mmdb_obj->mmdb);
    mmdb_obj->mmdb = NULL;
}

static const MMDB_entry_data_list_s *handle_entry_data_list(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value
    TSRMLS_DC)
{
    switch (entry_data_list->entry_data.type) {
    case MMDB_DATA_TYPE_MAP:
        return handle_map(entry_data_list, z_value TSRMLS_CC);
    case MMDB_DATA_TYPE_ARRAY:
        return handle_array(entry_data_list, z_value TSRMLS_CC);
    case MMDB_DATA_TYPE_UTF8_STRING:
        _ZVAL_STRINGL(z_value,
                     (char *)entry_data_list->entry_data.utf8_string,
                     entry_data_list->entry_data.data_size);
        break;
    case MMDB_DATA_TYPE_BYTES:
        _ZVAL_STRINGL(z_value, (char *)entry_data_list->entry_data.bytes,
                     entry_data_list->entry_data.data_size);
        break;
    case MMDB_DATA_TYPE_DOUBLE:
        ZVAL_DOUBLE(z_value, entry_data_list->entry_data.double_value);
        break;
    case MMDB_DATA_TYPE_FLOAT:
        ZVAL_DOUBLE(z_value, entry_data_list->entry_data.float_value);
        break;
    case MMDB_DATA_TYPE_UINT16:
        ZVAL_LONG(z_value, entry_data_list->entry_data.uint16);
        break;
    case MMDB_DATA_TYPE_UINT32:
        handle_uint32(entry_data_list, z_value TSRMLS_CC);
        break;
    case MMDB_DATA_TYPE_BOOLEAN:
        ZVAL_BOOL(z_value, entry_data_list->entry_data.boolean);
        break;
    case MMDB_DATA_TYPE_UINT64:
        handle_uint64(entry_data_list, z_value TSRMLS_CC);
        break;
    case MMDB_DATA_TYPE_UINT128:
        handle_uint128(entry_data_list, z_value TSRMLS_CC);
        break;
    case MMDB_DATA_TYPE_INT32:
        ZVAL_LONG(z_value, entry_data_list->entry_data.int32);
        break;
    default:
        THROW_EXCEPTION(PHP_MAXMINDDB_READER_EX_NS,
                        "Invalid data type arguments: %d",
                        entry_data_list->entry_data.type);
        return NULL;
    }
    return entry_data_list;
}

static const MMDB_entry_data_list_s *handle_map(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value TSRMLS_DC)
{
    array_init(z_value);
    const uint32_t map_size = entry_data_list->entry_data.data_size;

    uint i;
    for (i = 0; i < map_size && entry_data_list; i++ ) {
        entry_data_list = entry_data_list->next;

        char *key =
            estrndup((char *)entry_data_list->entry_data.utf8_string,
                     entry_data_list->entry_data.data_size);
        if (NULL == key) {
            THROW_EXCEPTION(PHP_MAXMINDDB_READER_EX_NS,
                            "Invalid data type arguments");
            return NULL;
        }

        entry_data_list = entry_data_list->next;
#ifdef ZEND_ENGINE_3
        zval _new_value;
        zval * new_value = &_new_value;
        ZVAL_NULL(new_value);
#else
        zval *new_value;
        ALLOC_INIT_ZVAL(new_value);
#endif
        entry_data_list = handle_entry_data_list(entry_data_list,
                                                 new_value TSRMLS_CC);
        add_assoc_zval(z_value, key, new_value);
        efree(key);
    }
    return entry_data_list;
}

static const MMDB_entry_data_list_s *handle_array(
    const MMDB_entry_data_list_s *entry_data_list,
    zval *z_value TSRMLS_DC)
{
    const uint32_t size = entry_data_list->entry_data.data_size;

    array_init(z_value);

    uint i;
    for (i = 0; i < size && entry_data_list; i++) {
        entry_data_list = entry_data_list->next;
#ifdef ZEND_ENGINE_3
        zval _new_value;
        zval * new_value = &_new_value;
        ZVAL_NULL(new_value);
#else
        zval *new_value;
        ALLOC_INIT_ZVAL(new_value);
#endif
        entry_data_list = handle_entry_data_list(entry_data_list,
                                                 new_value TSRMLS_CC);
        add_next_index_zval(z_value, new_value);
    }
    return entry_data_list;
}

static void handle_uint128(const MMDB_entry_data_list_s *entry_data_list,
                           zval *z_value TSRMLS_DC)
{
    uint64_t high = 0;
    uint64_t low = 0;
#if MMDB_UINT128_IS_BYTE_ARRAY
    int i;
    for (i = 0; i < 8; i++) {
        high = (high << 8) | entry_data_list->entry_data.uint128[i];
    }

    for (i = 8; i < 16; i++) {
        low = (low << 8) | entry_data_list->entry_data.uint128[i];
    }
#else
    high = entry_data_list->entry_data.uint128 >> 64;
    low = (uint64_t)entry_data_list->entry_data.uint128;
#endif

    char *num_str;
    spprintf(&num_str, 0, "0x%016" PRIX64 "%016" PRIX64, high, low);
    CHECK_ALLOCATED(num_str);

    _ZVAL_STRING(z_value, num_str);
    efree(num_str);
}

static void handle_uint32(const MMDB_entry_data_list_s *entry_data_list,
                          zval *z_value TSRMLS_DC)
{
    uint32_t val = entry_data_list->entry_data.uint32;

#if LONG_MAX >= UINT32_MAX
    ZVAL_LONG(z_value, val);
    return;
#else
    if (val <= LONG_MAX) {
        ZVAL_LONG(z_value, val);
        return;
    }

    char *int_str;
    spprintf(&int_str, 0, "%" PRIu32, val);
    CHECK_ALLOCATED(int_str);

    _ZVAL_STRING(z_value, int_str);
    efree(int_str);
#endif
}


static void handle_uint64(const MMDB_entry_data_list_s *entry_data_list,
                          zval *z_value TSRMLS_DC)
{
    uint64_t val = entry_data_list->entry_data.uint64;

#if LONG_MAX >= UINT64_MAX
    ZVAL_LONG(z_value, val);
    return;
#else
    if (val <= LONG_MAX) {
        ZVAL_LONG(z_value, val);
        return;
    }

    char *int_str;
    spprintf(&int_str, 0, "%" PRIu64, val);
    CHECK_ALLOCATED(int_str);

    _ZVAL_STRING(z_value, int_str);
    efree(int_str);
#endif
}

static zend_class_entry *lookup_class(const char *name TSRMLS_DC)
{
#ifdef ZEND_ENGINE_3
    zend_string *n = zend_string_init(name, strlen(name), 0);
    zend_class_entry *ce = zend_lookup_class(n);
    zend_string_release(n);
    if( NULL == ce ) {
        zend_error(E_ERROR, "Class %s not found", name);
    }
    return ce;
#else
    zend_class_entry **ce;
    if (FAILURE ==
        zend_lookup_class(name, strlen(name),
                          &ce TSRMLS_CC)) {
        zend_error(E_ERROR, "Class %s not found", name);
    }
    return *ce;
#endif
}

static void maxminddb_free_storage(free_obj_t *object TSRMLS_DC)
{
    maxminddb_obj *obj = php_maxminddb_fetch_object((zend_object *)object TSRMLS_CC);
    if (obj->mmdb != NULL) {
        MMDB_close(obj->mmdb);
        efree(obj->mmdb);
    }

    zend_object_std_dtor(&obj->std TSRMLS_CC);
#ifndef ZEND_ENGINE_3
    efree(object);
#endif
}

#ifdef ZEND_ENGINE_3
static zend_object *maxminddb_create_handler(
    zend_class_entry *type TSRMLS_DC)
{
    maxminddb_obj *obj = (maxminddb_obj *)ecalloc(1, sizeof(maxminddb_obj));
    zend_object_std_init(&obj->std, type TSRMLS_CC);
    object_properties_init(&(obj->std), type);

    obj->std.handlers = &maxminddb_obj_handlers;

    return &obj->std;
}
#else
static zend_object_value maxminddb_create_handler(
    zend_class_entry *type TSRMLS_DC)
{
    zend_object_value retval;

    maxminddb_obj *obj = (maxminddb_obj *)ecalloc(1, sizeof(maxminddb_obj));
	zend_object_std_init(&obj->std, type TSRMLS_CC);
    object_properties_init(&(obj->std), type);

    retval.handle = zend_objects_store_put(obj, NULL,
                                           maxminddb_free_storage,
                                           NULL TSRMLS_CC);
    retval.handlers = &maxminddb_obj_handlers;

    return retval;
}
#endif

/* *INDENT-OFF* */
static zend_function_entry maxminddb_methods[] = {
    PHP_ME(MaxMind_Db_Reader, __construct, arginfo_maxmindbreader_construct,
           ZEND_ACC_PUBLIC | ZEND_ACC_CTOR)
    PHP_ME(MaxMind_Db_Reader, close,    arginfo_maxmindbreader_void, ZEND_ACC_PUBLIC)
    PHP_ME(MaxMind_Db_Reader, get,      arginfo_maxmindbreader_get,  ZEND_ACC_PUBLIC)
    PHP_ME(MaxMind_Db_Reader, metadata, arginfo_maxmindbreader_void, ZEND_ACC_PUBLIC)
    { NULL, NULL, NULL }
};
/* *INDENT-ON* */

PHP_MINIT_FUNCTION(maxminddb){
    zend_class_entry ce;

    INIT_CLASS_ENTRY(ce, PHP_MAXMINDDB_READER_NS, maxminddb_methods);
    maxminddb_ce = zend_register_internal_class(&ce TSRMLS_CC);
    maxminddb_ce->create_object = maxminddb_create_handler;
    memcpy(&maxminddb_obj_handlers,
           zend_get_std_object_handlers(), sizeof(zend_object_handlers));
    maxminddb_obj_handlers.clone_obj = NULL;
#ifdef ZEND_ENGINE_3
    maxminddb_obj_handlers.offset = XtOffsetOf(maxminddb_obj, std);
    maxminddb_obj_handlers.free_obj = maxminddb_free_storage;
#endif

    return SUCCESS;
}

static PHP_MINFO_FUNCTION(maxminddb)
{
    php_info_print_table_start();

    php_info_print_table_row(2, "MaxMind DB Reader", "enabled");
    php_info_print_table_row(2, "maxminddb extension version", PHP_MAXMINDDB_VERSION);
    php_info_print_table_row(2, "libmaxminddb library version", MMDB_lib_version());

    php_info_print_table_end();
}

zend_module_entry maxminddb_module_entry = {
    STANDARD_MODULE_HEADER,
    PHP_MAXMINDDB_EXTNAME,
    NULL,
    PHP_MINIT(maxminddb),
    NULL,
    NULL,
    NULL,
    PHP_MINFO(maxminddb),
    PHP_MAXMINDDB_VERSION,
    STANDARD_MODULE_PROPERTIES
};

#ifdef COMPILE_DL_MAXMINDDB
ZEND_GET_MODULE(maxminddb)
#endif
