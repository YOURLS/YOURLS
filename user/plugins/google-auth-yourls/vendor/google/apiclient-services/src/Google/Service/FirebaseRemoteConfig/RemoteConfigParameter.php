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

class Google_Service_FirebaseRemoteConfig_RemoteConfigParameter extends Google_Model
{
  protected $conditionalValuesType = 'Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue';
  protected $conditionalValuesDataType = 'map';
  protected $defaultValueType = 'Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue';
  protected $defaultValueDataType = '';
  public $description;

  /**
   * @param Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue
   */
  public function setConditionalValues($conditionalValues)
  {
    $this->conditionalValues = $conditionalValues;
  }
  /**
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue
   */
  public function getConditionalValues()
  {
    return $this->conditionalValues;
  }
  /**
   * @param Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue
   */
  public function setDefaultValue(Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfigParameterValue
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
}
