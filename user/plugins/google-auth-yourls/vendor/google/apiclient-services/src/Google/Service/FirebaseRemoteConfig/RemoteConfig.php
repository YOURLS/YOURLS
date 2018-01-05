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

class Google_Service_FirebaseRemoteConfig_RemoteConfig extends Google_Collection
{
  protected $collection_key = 'conditions';
  protected $conditionsType = 'Google_Service_FirebaseRemoteConfig_RemoteConfigCondition';
  protected $conditionsDataType = 'array';
  protected $parametersType = 'Google_Service_FirebaseRemoteConfig_RemoteConfigParameter';
  protected $parametersDataType = 'map';

  /**
   * @param Google_Service_FirebaseRemoteConfig_RemoteConfigCondition
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfigCondition
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param Google_Service_FirebaseRemoteConfig_RemoteConfigParameter
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_FirebaseRemoteConfig_RemoteConfigParameter
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}
