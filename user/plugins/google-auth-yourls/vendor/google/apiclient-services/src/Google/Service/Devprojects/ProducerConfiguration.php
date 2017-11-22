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

class Google_Service_Devprojects_ProducerConfiguration extends Google_Model
{
  public $consumerName;
  public $consumptionStatus;
  public $kind;
  protected $quotaConstraintsType = 'Google_Service_Devprojects_QuotaConstraints';
  protected $quotaConstraintsDataType = '';

  public function setConsumerName($consumerName)
  {
    $this->consumerName = $consumerName;
  }
  public function getConsumerName()
  {
    return $this->consumerName;
  }
  public function setConsumptionStatus($consumptionStatus)
  {
    $this->consumptionStatus = $consumptionStatus;
  }
  public function getConsumptionStatus()
  {
    return $this->consumptionStatus;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setQuotaConstraints(Google_Service_Devprojects_QuotaConstraints $quotaConstraints)
  {
    $this->quotaConstraints = $quotaConstraints;
  }
  public function getQuotaConstraints()
  {
    return $this->quotaConstraints;
  }
}
