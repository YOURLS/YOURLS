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

class Google_Service_Storagetransfer_UpdateTransferJobRequest extends Google_Model
{
  public $projectId;
  protected $transferJobType = 'Google_Service_Storagetransfer_TransferJob';
  protected $transferJobDataType = '';
  public $updateTransferJobFieldMask;

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_Storagetransfer_TransferJob
   */
  public function setTransferJob(Google_Service_Storagetransfer_TransferJob $transferJob)
  {
    $this->transferJob = $transferJob;
  }
  /**
   * @return Google_Service_Storagetransfer_TransferJob
   */
  public function getTransferJob()
  {
    return $this->transferJob;
  }
  public function setUpdateTransferJobFieldMask($updateTransferJobFieldMask)
  {
    $this->updateTransferJobFieldMask = $updateTransferJobFieldMask;
  }
  public function getUpdateTransferJobFieldMask()
  {
    return $this->updateTransferJobFieldMask;
  }
}
