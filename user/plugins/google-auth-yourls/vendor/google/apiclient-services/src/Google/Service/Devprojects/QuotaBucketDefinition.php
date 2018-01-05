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

class Google_Service_Devprojects_QuotaBucketDefinition extends Google_Model
{
  protected $billableDailyLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $billableDailyLimitDataType = '';
  protected $dailyLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $dailyLimitDataType = '';
  protected $idType = 'Google_Service_Devprojects_BucketId';
  protected $idDataType = '';
  public $kind;
  public $name;
  public $variableTermQuotaDescription;
  public $visible;
  protected $visitorRateLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $visitorRateLimitDataType = '';

  public function setBillableDailyLimit(Google_Service_Devprojects_ApiLimitDefinition $billableDailyLimit)
  {
    $this->billableDailyLimit = $billableDailyLimit;
  }
  public function getBillableDailyLimit()
  {
    return $this->billableDailyLimit;
  }
  public function setDailyLimit(Google_Service_Devprojects_ApiLimitDefinition $dailyLimit)
  {
    $this->dailyLimit = $dailyLimit;
  }
  public function getDailyLimit()
  {
    return $this->dailyLimit;
  }
  public function setId(Google_Service_Devprojects_BucketId $id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setVariableTermQuotaDescription($variableTermQuotaDescription)
  {
    $this->variableTermQuotaDescription = $variableTermQuotaDescription;
  }
  public function getVariableTermQuotaDescription()
  {
    return $this->variableTermQuotaDescription;
  }
  public function setVisible($visible)
  {
    $this->visible = $visible;
  }
  public function getVisible()
  {
    return $this->visible;
  }
  public function setVisitorRateLimit(Google_Service_Devprojects_ApiLimitDefinition $visitorRateLimit)
  {
    $this->visitorRateLimit = $visitorRateLimit;
  }
  public function getVisitorRateLimit()
  {
    return $this->visitorRateLimit;
  }
}
