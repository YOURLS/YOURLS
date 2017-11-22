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

class Google_Service_DataTransfer_DataTransfer extends Google_Collection
{
  protected $collection_key = 'applicationDataTransfers';
  protected $applicationDataTransfersType = 'Google_Service_DataTransfer_ApplicationDataTransfer';
  protected $applicationDataTransfersDataType = 'array';
  public $etag;
  public $id;
  public $kind;
  public $newOwnerUserId;
  public $oldOwnerUserId;
  public $overallTransferStatusCode;
  public $requestTime;

  /**
   * @param Google_Service_DataTransfer_ApplicationDataTransfer
   */
  public function setApplicationDataTransfers($applicationDataTransfers)
  {
    $this->applicationDataTransfers = $applicationDataTransfers;
  }
  /**
   * @return Google_Service_DataTransfer_ApplicationDataTransfer
   */
  public function getApplicationDataTransfers()
  {
    return $this->applicationDataTransfers;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
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
  public function setNewOwnerUserId($newOwnerUserId)
  {
    $this->newOwnerUserId = $newOwnerUserId;
  }
  public function getNewOwnerUserId()
  {
    return $this->newOwnerUserId;
  }
  public function setOldOwnerUserId($oldOwnerUserId)
  {
    $this->oldOwnerUserId = $oldOwnerUserId;
  }
  public function getOldOwnerUserId()
  {
    return $this->oldOwnerUserId;
  }
  public function setOverallTransferStatusCode($overallTransferStatusCode)
  {
    $this->overallTransferStatusCode = $overallTransferStatusCode;
  }
  public function getOverallTransferStatusCode()
  {
    return $this->overallTransferStatusCode;
  }
  public function setRequestTime($requestTime)
  {
    $this->requestTime = $requestTime;
  }
  public function getRequestTime()
  {
    return $this->requestTime;
  }
}
