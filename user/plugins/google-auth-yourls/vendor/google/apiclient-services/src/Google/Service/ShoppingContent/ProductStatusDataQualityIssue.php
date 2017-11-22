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

class Google_Service_ShoppingContent_ProductStatusDataQualityIssue extends Google_Model
{
  public $detail;
  public $fetchStatus;
  public $id;
  public $location;
  public $severity;
  public $timestamp;
  public $valueOnLandingPage;
  public $valueProvided;

  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
  }
  public function setFetchStatus($fetchStatus)
  {
    $this->fetchStatus = $fetchStatus;
  }
  public function getFetchStatus()
  {
    return $this->fetchStatus;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setValueOnLandingPage($valueOnLandingPage)
  {
    $this->valueOnLandingPage = $valueOnLandingPage;
  }
  public function getValueOnLandingPage()
  {
    return $this->valueOnLandingPage;
  }
  public function setValueProvided($valueProvided)
  {
    $this->valueProvided = $valueProvided;
  }
  public function getValueProvided()
  {
    return $this->valueProvided;
  }
}
