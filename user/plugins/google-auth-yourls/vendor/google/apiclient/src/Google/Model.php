<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * This class defines attributes, valid values, and usage which is generated
 * from a given json schema.
 * http://tools.ietf.org/html/draft-zyp-json-schema-03#section-5
 *
 */
class Google_Model implements ArrayAccess
{
  /**
   * If you need to specify a NULL JSON value, use Google_Model::NULL_VALUE
   * instead - it will be replaced when converting to JSON with a real null.
   */
  const NULL_VALUE = "{}gapi-php-null";
  protected $internal_gapi_mappings = array();
  protected $modelData = array();
  protected $processed = array();

  /**
   * Polymorphic - accepts a variable number of arguments dependent
   * on the type of the model subclass.
   */
  final public function __construct()
  {
    if (func_num_args() == 1 && is_array(func_get_arg(0))) {
      // Initialize the model with the array's contents.
      $array = func_get_arg(0);
      $this->mapTypes($array);
    }
    $this->gapiInit();
  }

  /**
   * Getter that handles passthrough access to the data array, and lazy object creation.
   * @param string $key Property name.
   * @return mixed The value if any, or null.
   */
  public function __get($key)
  {
    $keyType = $this->keyType($key);
    $keyDataType = $this->dataType($key);
    if ($keyType && !isset($this->processed[$key])) {
      if (isset($this->modelData[$key])) {
        $val = $this->modelData[$key];
      } elseif ($keyDataType == 'array' || $keyDataType == 'map') {
        $val = array();
      } else {
        $val = null;
      }

      if ($this->isAssociativeArray($val)) {
        if ($keyDataType && 'map' == $keyDataType) {
          foreach ($val as $arrayKey => $arrayItem) {
              $this->modelData[$key][$arrayKey] =
                new $keyType($arrayItem);
          }
        } else {
          $this->modelData[$key] = new $keyType($val);
        }
      } else if (is_array($val)) {
        $arrayObject = array();
        foreach ($val as $arrayIndex => $arrayItem) {
          $arrayObject[$arrayIndex] = new $keyType($arrayItem);
        }
        $this->modelData[$key] = $arrayObject;
      }
      $this->processed[$key] = true;
    }

    return isset($this->modelData[$key]) ? $this->modelData[$key] : null;
  }

  /**
   * Initialize this object's properties from an array.
   *
   * @param array $array Used to seed this object's properties.
   * @return void
   */
  protected function mapTypes($array)
  {
    // Hard initialise simple types, lazy load more complex ones.
    foreach ($array as $key => $val) {
      if ($keyType = $this->keyType($key)) {
        $dataType = $this->dataType($key);
        if ($dataType == 'array' || $dataType == 'map') {
          $this->$key = array();
          foreach ($val as $itemKey => $itemVal) {
            if ($itemVal instanceof $keyType) {
              $this->{$key}[$itemKey] = $itemVal;
            } else {
              $this->{$key}[$itemKey] = new $keyType($itemVal);
            }
          }
        } elseif ($val instanceof $keyType) {
          $this->$key = $val;
        } else {
          $this->$key = new $keyType($val);
        }
        unset($array[$key]);
      } elseif (property_exists($this, $key)) {
          $this->$key = $val;
          unset($array[$key]);
      } elseif (property_exists($this, $camelKey = $this->camelCase($key))) {
          // This checks if property exists as camelCase, leaving it in array as snake_case
          // in case of backwards compatibility issues.
          $this->$camelKey = $val;
      }
    }
    $this->modelData = $array;
  }

  /**
   * Blank initialiser to be used in subclasses to do  post-construction initialisation - this
   * avoids the need for subclasses to have to implement the variadics handling in their
   * constructors.
   */
  protected function gapiInit()
  {
    return;
  }

  /**
   * Create a simplified object suitable for straightforward
   * conversion to JSON. This is relatively expensive
   * due to the usage of reflection, but shouldn't be called
   * a whole lot, and is the most straightforward way to filter.
   */
  public function toSimpleObject()
  {
    $object = new stdClass();

    // Process all other data.
    foreach ($this->modelData as $key => $val) {
      $result = $this->getSimpleValue($val);
      if ($result !== null) {
        $object->$key = $this->nullPlaceholderCheck($result);
      }
    }

    // Process all public properties.
    $reflect = new ReflectionObject($this);
    $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
    foreach ($props as $member) {
      $name = $member->getName();
      $result = $this->getSimpleValue($this->$name);
      if ($result !== null) {
        $name = $this->getMappedName($name);
        $object->$name = $this->nullPlaceholderCheck($result);
      }
    }

    return $object;
  }

  /**
   * Handle different types of values, primarily
   * other objects and map and array data types.
   */
  private function getSimpleValue($value)
  {
    if ($value instanceof Google_Model) {
      return $value->toSimpleObject();
    } else if (is_array($value)) {
      $return = array();
      foreach ($value as $key => $a_value) {
        $a_value = $this->getSimpleValue($a_value);
        if ($a_value !== null) {
          $key = $this->getMappedName($key);
          $return[$key] = $this->nullPlaceholderCheck($a_value);
        }
      }
      return $return;
    }
    return $value;
  }

  /**
   * Check whether the value is the null placeholder and return true null.
   */
  private function nullPlaceholderCheck($value)
  {
    if ($value === self::NULL_VALUE) {
      return null;
    }
    return $value;
  }

  /**
   * If there is an internal name mapping, use that.
   */
  private function getMappedName($key)
  {
    if (isset($this->internal_gapi_mappings, $this->internal_gapi_mappings[$key])) {
      $key = $this->internal_gapi_mappings[$key];
    }
    return $key;
  }

  /**
   * Returns true only if the array is associative.
   * @param array $array
   * @return bool True if the array is associative.
   */
  protected function isAssociativeArray($array)
  {
    if (!is_array($array)) {
      return false;
    }
    $keys = array_keys($array);
    foreach ($keys as $key) {
      if (is_string($key)) {
        return true;
      }
    }
    return false;
  }

  /**
   * Verify if $obj is an array.
   * @throws Google_Exception Thrown if $obj isn't an array.
   * @param array $obj Items that should be validated.
   * @param string $method Method expecting an array as an argument.
   */
  public function assertIsArray($obj, $method)
  {
    if ($obj && !is_array($obj)) {
      throw new Google_Exception(
          "Incorrect parameter type passed to $method(). Expected an array."
      );
    }
  }

  public function offsetExists($offset)
  {
    return isset($this->$offset) || isset($this->modelData[$offset]);
  }

  public function offsetGet($offset)
  {
    return isset($this->$offset) ?
        $this->$offset :
        $this->__get($offset);
  }

  public function offsetSet($offset, $value)
  {
    if (property_exists($this, $offset)) {
      $this->$offset = $value;
    } else {
      $this->modelData[$offset] = $value;
      $this->processed[$offset] = true;
    }
  }

  public function offsetUnset($offset)
  {
    unset($this->modelData[$offset]);
  }

  protected function keyType($key)
  {
    $keyType = $key . "Type";

    // ensure keyType is a valid class
    if (property_exists($this, $keyType) && class_exists($this->$keyType)) {
      return $this->$keyType;
    }
  }

  protected function dataType($key)
  {
    $dataType = $key . "DataType";

    if (property_exists($this, $dataType)) {
      return $this->$dataType;
    }
  }

  public function __isset($key)
  {
    return isset($this->modelData[$key]);
  }

  public function __unset($key)
  {
    unset($this->modelData[$key]);
  }

  /**
   * Convert a string to camelCase
   * @param  string $value
   * @return string
   */
  private function camelCase($value)
  {
    $value = ucwords(str_replace(array('-', '_'), ' ', $value));
    $value = str_replace(' ', '', $value);
    $value[0] = strtolower($value[0]);
    return $value;
  }
}
