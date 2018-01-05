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

class Google_Service_People_PersonResponse extends Google_Model
{
  public $httpStatusCode;
  protected $personType = 'Google_Service_People_Person';
  protected $personDataType = '';
  public $requestedResourceName;

  public function setHttpStatusCode($httpStatusCode)
  {
    $this->httpStatusCode = $httpStatusCode;
  }
  public function getHttpStatusCode()
  {
    return $this->httpStatusCode;
  }
  public function setPerson(Google_Service_People_Person $person)
  {
    $this->person = $person;
  }
  public function getPerson()
  {
    return $this->person;
  }
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
}
