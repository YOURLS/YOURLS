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

class Google_Service_Devprojects_ApisListConsumedResponse extends Google_Collection
{
  protected $collection_key = 'apiDefinition';
  protected $apiDefinitionType = 'Google_Service_Devprojects_ApiData';
  protected $apiDefinitionDataType = 'array';
  public $kind;

  public function setApiDefinition($apiDefinition)
  {
    $this->apiDefinition = $apiDefinition;
  }
  public function getApiDefinition()
  {
    return $this->apiDefinition;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
