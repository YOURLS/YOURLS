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

class Google_Service_Gmail_VacationSettings extends Google_Model
{
  public $enableAutoReply;
  public $endTime;
  public $responseBodyHtml;
  public $responseBodyPlainText;
  public $responseSubject;
  public $restrictToContacts;
  public $restrictToDomain;
  public $startTime;

  public function setEnableAutoReply($enableAutoReply)
  {
    $this->enableAutoReply = $enableAutoReply;
  }
  public function getEnableAutoReply()
  {
    return $this->enableAutoReply;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setResponseBodyHtml($responseBodyHtml)
  {
    $this->responseBodyHtml = $responseBodyHtml;
  }
  public function getResponseBodyHtml()
  {
    return $this->responseBodyHtml;
  }
  public function setResponseBodyPlainText($responseBodyPlainText)
  {
    $this->responseBodyPlainText = $responseBodyPlainText;
  }
  public function getResponseBodyPlainText()
  {
    return $this->responseBodyPlainText;
  }
  public function setResponseSubject($responseSubject)
  {
    $this->responseSubject = $responseSubject;
  }
  public function getResponseSubject()
  {
    return $this->responseSubject;
  }
  public function setRestrictToContacts($restrictToContacts)
  {
    $this->restrictToContacts = $restrictToContacts;
  }
  public function getRestrictToContacts()
  {
    return $this->restrictToContacts;
  }
  public function setRestrictToDomain($restrictToDomain)
  {
    $this->restrictToDomain = $restrictToDomain;
  }
  public function getRestrictToDomain()
  {
    return $this->restrictToDomain;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}
