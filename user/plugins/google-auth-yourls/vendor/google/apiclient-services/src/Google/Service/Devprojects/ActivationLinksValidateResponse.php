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

class Google_Service_Devprojects_ActivationLinksValidateResponse extends Google_Collection
{
  protected $collection_key = 'tokenParameter';
  public $apiToken;
  public $componentType;
  public $kind;
  protected $tokenParameterType = 'Google_Service_Devprojects_TypedKeyValuePair';
  protected $tokenParameterDataType = 'array';

  public function setApiToken($apiToken)
  {
    $this->apiToken = $apiToken;
  }
  public function getApiToken()
  {
    return $this->apiToken;
  }
  public function setComponentType($componentType)
  {
    $this->componentType = $componentType;
  }
  public function getComponentType()
  {
    return $this->componentType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setTokenParameter($tokenParameter)
  {
    $this->tokenParameter = $tokenParameter;
  }
  public function getTokenParameter()
  {
    return $this->tokenParameter;
  }
}
