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

class Google_Service_ServiceControl_AllocateQuotaRequest extends Google_Model
{
  protected $allocateOperationType = 'Google_Service_ServiceControl_QuotaOperation';
  protected $allocateOperationDataType = '';
  public $serviceConfigId;

  /**
   * @param Google_Service_ServiceControl_QuotaOperation
   */
  public function setAllocateOperation(Google_Service_ServiceControl_QuotaOperation $allocateOperation)
  {
    $this->allocateOperation = $allocateOperation;
  }
  /**
   * @return Google_Service_ServiceControl_QuotaOperation
   */
  public function getAllocateOperation()
  {
    return $this->allocateOperation;
  }
  public function setServiceConfigId($serviceConfigId)
  {
    $this->serviceConfigId = $serviceConfigId;
  }
  public function getServiceConfigId()
  {
    return $this->serviceConfigId;
  }
}
