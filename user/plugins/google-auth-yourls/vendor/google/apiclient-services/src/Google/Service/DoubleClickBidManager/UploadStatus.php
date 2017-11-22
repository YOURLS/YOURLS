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

class Google_Service_DoubleClickBidManager_UploadStatus extends Google_Collection
{
  protected $collection_key = 'rowStatus';
  public $errors;
  protected $rowStatusType = 'Google_Service_DoubleClickBidManager_RowStatus';
  protected $rowStatusDataType = 'array';

  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_RowStatus
   */
  public function setRowStatus($rowStatus)
  {
    $this->rowStatus = $rowStatus;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_RowStatus
   */
  public function getRowStatus()
  {
    return $this->rowStatus;
  }
}
