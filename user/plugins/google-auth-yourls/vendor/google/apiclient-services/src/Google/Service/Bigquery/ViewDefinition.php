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

class Google_Service_Bigquery_ViewDefinition extends Google_Collection
{
  protected $collection_key = 'userDefinedFunctionResources';
  public $query;
  public $useLegacySql;
  protected $userDefinedFunctionResourcesType = 'Google_Service_Bigquery_UserDefinedFunctionResource';
  protected $userDefinedFunctionResourcesDataType = 'array';

  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setUseLegacySql($useLegacySql)
  {
    $this->useLegacySql = $useLegacySql;
  }
  public function getUseLegacySql()
  {
    return $this->useLegacySql;
  }
  /**
   * @param Google_Service_Bigquery_UserDefinedFunctionResource
   */
  public function setUserDefinedFunctionResources($userDefinedFunctionResources)
  {
    $this->userDefinedFunctionResources = $userDefinedFunctionResources;
  }
  /**
   * @return Google_Service_Bigquery_UserDefinedFunctionResource
   */
  public function getUserDefinedFunctionResources()
  {
    return $this->userDefinedFunctionResources;
  }
}
