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

class Google_Service_Reports_UsageReportParameters extends Google_Collection
{
  protected $collection_key = 'msgValue';
  public $boolValue;
  public $datetimeValue;
  public $intValue;
  public $msgValue;
  public $name;
  public $stringValue;

  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  public function setDatetimeValue($datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  public function getIntValue()
  {
    return $this->intValue;
  }
  public function setMsgValue($msgValue)
  {
    $this->msgValue = $msgValue;
  }
  public function getMsgValue()
  {
    return $this->msgValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
}
