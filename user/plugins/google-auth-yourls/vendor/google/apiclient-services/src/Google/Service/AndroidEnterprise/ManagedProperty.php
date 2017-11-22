<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_AndroidEnterprise_ManagedProperty extends Google_Collection
{
  protected $collection_key = 'valueStringArray';
  public $key;
  public $valueBool;
  protected $valueBundleType = 'Google_Service_AndroidEnterprise_ManagedPropertyBundle';
  protected $valueBundleDataType = '';
  protected $valueBundleArrayType = 'Google_Service_AndroidEnterprise_ManagedPropertyBundle';
  protected $valueBundleArrayDataType = 'array';
  public $valueInteger;
  public $valueString;
  public $valueStringArray;

  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  public function setValueBool($valueBool)
  {
    $this->valueBool = $valueBool;
  }
  public function getValueBool()
  {
    return $this->valueBool;
  }
  /**
   * @param Google_Service_AndroidEnterprise_ManagedPropertyBundle
   */
  public function setValueBundle(Google_Service_AndroidEnterprise_ManagedPropertyBundle $valueBundle)
  {
    $this->valueBundle = $valueBundle;
  }
  /**
   * @return Google_Service_AndroidEnterprise_ManagedPropertyBundle
   */
  public function getValueBundle()
  {
    return $this->valueBundle;
  }
  /**
   * @param Google_Service_AndroidEnterprise_ManagedPropertyBundle
   */
  public function setValueBundleArray($valueBundleArray)
  {
    $this->valueBundleArray = $valueBundleArray;
  }
  /**
   * @return Google_Service_AndroidEnterprise_ManagedPropertyBundle
   */
  public function getValueBundleArray()
  {
    return $this->valueBundleArray;
  }
  public function setValueInteger($valueInteger)
  {
    $this->valueInteger = $valueInteger;
  }
  public function getValueInteger()
  {
    return $this->valueInteger;
  }
  public function setValueString($valueString)
  {
    $this->valueString = $valueString;
  }
  public function getValueString()
  {
    return $this->valueString;
  }
  public function setValueStringArray($valueStringArray)
  {
    $this->valueStringArray = $valueStringArray;
  }
  public function getValueStringArray()
  {
    return $this->valueStringArray;
  }
}
