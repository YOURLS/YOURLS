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

class Google_Service_CloudFunctions_EventTrigger extends Google_Model
{
  public $eventType;
  protected $failurePolicyType = 'Google_Service_CloudFunctions_FailurePolicy';
  protected $failurePolicyDataType = '';
  public $resource;
  public $service;

  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param Google_Service_CloudFunctions_FailurePolicy
   */
  public function setFailurePolicy(Google_Service_CloudFunctions_FailurePolicy $failurePolicy)
  {
    $this->failurePolicy = $failurePolicy;
  }
  /**
   * @return Google_Service_CloudFunctions_FailurePolicy
   */
  public function getFailurePolicy()
  {
    return $this->failurePolicy;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
}
