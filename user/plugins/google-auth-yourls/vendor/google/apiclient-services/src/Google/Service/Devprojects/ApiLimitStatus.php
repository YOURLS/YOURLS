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

class Google_Service_Devprojects_ApiLimitStatus extends Google_Model
{
  public $actualEnd;
  public $addedTimeMillis;
  public $apiToken;
  public $begin;
  public $displayEnd;
  public $inGracePeriod;
  public $kind;
  protected $limitType = 'Google_Service_Devprojects_TypedValue';
  protected $limitDataType = '';
  protected $maxType = 'Google_Service_Devprojects_TypedValue';
  protected $maxDataType = '';
  public $type;
  protected $usageType = 'Google_Service_Devprojects_TypedValue';
  protected $usageDataType = '';
  public $visibleEnd;

  public function setActualEnd($actualEnd)
  {
    $this->actualEnd = $actualEnd;
  }
  public function getActualEnd()
  {
    return $this->actualEnd;
  }
  public function setAddedTimeMillis($addedTimeMillis)
  {
    $this->addedTimeMillis = $addedTimeMillis;
  }
  public function getAddedTimeMillis()
  {
    return $this->addedTimeMillis;
  }
  public function setApiToken($apiToken)
  {
    $this->apiToken = $apiToken;
  }
  public function getApiToken()
  {
    return $this->apiToken;
  }
  public function setBegin($begin)
  {
    $this->begin = $begin;
  }
  public function getBegin()
  {
    return $this->begin;
  }
  public function setDisplayEnd($displayEnd)
  {
    $this->displayEnd = $displayEnd;
  }
  public function getDisplayEnd()
  {
    return $this->displayEnd;
  }
  public function setInGracePeriod($inGracePeriod)
  {
    $this->inGracePeriod = $inGracePeriod;
  }
  public function getInGracePeriod()
  {
    return $this->inGracePeriod;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLimit(Google_Service_Devprojects_TypedValue $limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setMax(Google_Service_Devprojects_TypedValue $max)
  {
    $this->max = $max;
  }
  public function getMax()
  {
    return $this->max;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUsage(Google_Service_Devprojects_TypedValue $usage)
  {
    $this->usage = $usage;
  }
  public function getUsage()
  {
    return $this->usage;
  }
  public function setVisibleEnd($visibleEnd)
  {
    $this->visibleEnd = $visibleEnd;
  }
  public function getVisibleEnd()
  {
    return $this->visibleEnd;
  }
}
