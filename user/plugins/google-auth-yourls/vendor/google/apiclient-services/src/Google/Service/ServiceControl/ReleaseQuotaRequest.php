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

class Google_Service_ServiceControl_ReleaseQuotaRequest extends Google_Model
{
  protected $releaseOperationType = 'Google_Service_ServiceControl_QuotaOperation';
  protected $releaseOperationDataType = '';
  public $serviceConfigId;

  /**
   * @param Google_Service_ServiceControl_QuotaOperation
   */
  public function setReleaseOperation(Google_Service_ServiceControl_QuotaOperation $releaseOperation)
  {
    $this->releaseOperation = $releaseOperation;
  }
  /**
   * @return Google_Service_ServiceControl_QuotaOperation
   */
  public function getReleaseOperation()
  {
    return $this->releaseOperation;
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
