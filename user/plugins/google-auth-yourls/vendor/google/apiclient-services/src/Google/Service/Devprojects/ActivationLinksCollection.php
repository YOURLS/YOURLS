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

class Google_Service_Devprojects_ActivationLinksCollection extends Google_Collection
{
  protected $collection_key = 'link';
  public $apiToken;
  public $kind;
  protected $linkType = 'Google_Service_Devprojects_ActivationLink';
  protected $linkDataType = 'array';
  public $serviceType;

  public function setApiToken($apiToken)
  {
    $this->apiToken = $apiToken;
  }
  public function getApiToken()
  {
    return $this->apiToken;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setServiceType($serviceType)
  {
    $this->serviceType = $serviceType;
  }
  public function getServiceType()
  {
    return $this->serviceType;
  }
}
