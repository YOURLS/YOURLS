<?php

/**
 * YOURLS Options
 *
 * Note to plugin authors: you most likely SHOULD NOT use directly methods and properties of this class. Use instead
 * function wrappers (eg don't use $ydb->option, or $ydb->get(), use yourls_*_options() functions instead).
 *
 * Note to devs: this class internally uses function wrappers eg yourls_*_options() instead of direct methods, to
 * comply to any filter set in the function wrappers (eg $this->update() uses yourls_get_option()).
 * Maybe in the future this will look as a dumb idea?
 * The alternative would be to move return filters from function wrappers to here, but I think this will make things
 * less readable for users.
 *
 * @since 1.7.3
 */

namespace YOURLS\Database;

use YOURLS\Database\YDB;


class Options {

    /** @var \YOURLS\Database\YDB */
    protected $ydb;

    protected $option = array();

    public function __construct(YDB $ydb) {
        $this->ydb = $ydb;
    }

    /**
     * Read all options from DB at once
     *
     * @since  1.7.3
     * @return bool
     */
    public function get_all_options() {
        // Get option values from DB
        $table = YOURLS_DB_TABLE_OPTIONS;
        $sql = "SELECT option_name, option_value FROM $table WHERE 1=1";
        $options = (array) $this->ydb->fetchPairs($sql);

        if(empty($options)) {
            return false;
        }

        foreach($options as $name => $value) {
            $this->option[$name] = yourls_maybe_unserialize($value);
        }

        $this->option = yourls_apply_filter('get_all_options', $this->option);

        return true;
    }

    /**
     * Get option value from DB (or from cache if available). Return value or $default if not found
     *
     * @since  1.7.3
     * @param  string $name     Option name
     * @param  string $default  Optional value to return if option doesn't exist
     * @return mixed            Value set for the option
     */
    public function get($name, $default) {
        // Check if option value is cached already
        if(array_key_exists($name, $this->option)) {
            return $this->option[$name];
        }

        // Get option value from DB
        $table = YOURLS_DB_TABLE_OPTIONS;
        $sql = "SELECT option_value FROM $table WHERE option_name = :option_name LIMIT 1";
        $bind = array('option_name' => $name);

        // Use fechOne() to get array('option_value'=>$value), or false if not found.
        // This way, we can effectively store false as an option value, and not confuse with false as the default return value
        $value = $this->ydb->fetchOne($sql, $bind);
        if($value !== false) {
            $value = yourls_maybe_unserialize( $value['option_value'] );
        } else {
            $value = $default;
        }

        // Cache option value to save a DB query if needed later
        $this->option[$name] = $value;

        return $value;
    }

    /**
     * Update (add if doesn't exist) an option to DB
     *
     * @since  1.7.3
     * @param  string $name      Option name. Expected to not be SQL-escaped.
     * @param  mixed  $newvalue  Option value.
     * @return bool              False if value was not updated, true otherwise.
     */
    public function update($name, $newvalue) {
        $name = trim($name);
        if (empty($name)) {
            return false;
        }

        // Use clone to break object refs -- see commit 09b989d375bac65e692277f61a84fede2fb04ae3
        if (is_object($newvalue)) {
            $newvalue = clone $newvalue;
        }

        $oldvalue = yourls_get_option($name);

        // If the new and old values are the same, no need to update.
        if ($newvalue === $oldvalue) {
            return false;
        }

        // If this is a new option, just add it
        if (false === $oldvalue) {
            return $this->add($name, $newvalue);
        }

        $_newvalue = yourls_maybe_serialize($newvalue);
        $table = YOURLS_DB_TABLE_OPTIONS;
        $sql  = "UPDATE $table SET option_value = :value WHERE option_name = :name";
        $bind = array('name' => $name, 'value' => $_newvalue);
        $do   = $this->ydb->fetchAffected($sql, $bind);

        if($do !== 1) {
            // Something went wrong :(
            return false;
        }

        // Cache option value to save a DB query if needed later
        $this->option[$name] = $newvalue;
    	yourls_do_action( 'update_option', $name, $oldvalue, $newvalue );
        return true;
    }

    /**
     * Add an option to the DB
     *
     * @since  1.7.3
     * @param  string $name   Name of option to add. Expected to not be SQL-escaped.
     * @param  mixed  $value  Optional option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
     * @return bool           False if option was not added (eg already exists), true otherwise.
     */
    public function add($name, $value) {
        $name = trim($name);
        if (empty($name)) {
            return false;
        }

        // Use clone to break object refs -- see commit 09b989d375bac65e692277f61a84fede2fb04ae3
        if (is_object($value)) {
            $value = clone $value;
        }

        // Make sure the option doesn't already exist
        if (false !== yourls_get_option($name)) {
            return false;
        }

        $table = YOURLS_DB_TABLE_OPTIONS;
        $_value = yourls_maybe_serialize($value);
        $sql  = "INSERT INTO $table (option_name, option_value) VALUES (:name, :value)";
        $bind = array('name' => $name, 'value' => $_value);
        $do   = $this->ydb->fetchAffected($sql, $bind);

        if($do !== 1) {
            // Something went wrong :(
            return false;
        }

        // Cache option value to save a DB query if needed later
        $this->option[$name] = $value;
        yourls_do_action('add_option', $name, $_value);

        return true;
    }

    /**
     * Delete option from DB
     *
     * @since  1.7.3
     * @param  string $name  Option name to delete. Expected to not be SQL-escaped.
     * @return bool          False if option was not deleted (eg not found), true otherwise.
     */
    public function delete($name) {
        $table = YOURLS_DB_TABLE_OPTIONS;
        $sql = "DELETE FROM $table WHERE option_name = :name";
        $bind = array('name' => $name);
        $do   = $this->ydb->fetchAffected($sql, $bind);

        if($do !== 1) {
            // Something went wrong :(
            return false;
        }

        yourls_do_action('delete_option', $name);
        unset($this->option[$name]);
        return true;
    }

}
