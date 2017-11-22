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

class Google_Service_ConsumerSurveys_SurveyCost extends Google_Model
{
  public $costPerResponseNanos;
  public $currencyCode;
  public $maxCostPerResponseNanos;
  public $nanos;

  public function setCostPerResponseNanos($costPerResponseNanos)
  {
    $this->costPerResponseNanos = $costPerResponseNanos;
  }
  public function getCostPerResponseNanos()
  {
    return $this->costPerResponseNanos;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setMaxCostPerResponseNanos($maxCostPerResponseNanos)
  {
    $this->maxCostPerResponseNanos = $maxCostPerResponseNanos;
  }
  public function getMaxCostPerResponseNanos()
  {
    return $this->maxCostPerResponseNanos;
  }
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  public function getNanos()
  {
    return $this->nanos;
  }
}
