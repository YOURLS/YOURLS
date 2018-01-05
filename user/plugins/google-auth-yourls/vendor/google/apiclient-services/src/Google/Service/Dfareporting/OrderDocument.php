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

class Google_Service_Dfareporting_OrderDocument extends Google_Collection
{
  protected $collection_key = 'lastSentRecipients';
  public $accountId;
  public $advertiserId;
  public $amendedOrderDocumentId;
  public $approvedByUserProfileIds;
  public $cancelled;
  protected $createdInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $createdInfoDataType = '';
  public $effectiveDate;
  public $id;
  public $kind;
  public $lastSentRecipients;
  public $lastSentTime;
  public $orderId;
  public $projectId;
  public $signed;
  public $subaccountId;
  public $title;
  public $type;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAmendedOrderDocumentId($amendedOrderDocumentId)
  {
    $this->amendedOrderDocumentId = $amendedOrderDocumentId;
  }
  public function getAmendedOrderDocumentId()
  {
    return $this->amendedOrderDocumentId;
  }
  public function setApprovedByUserProfileIds($approvedByUserProfileIds)
  {
    $this->approvedByUserProfileIds = $approvedByUserProfileIds;
  }
  public function getApprovedByUserProfileIds()
  {
    return $this->approvedByUserProfileIds;
  }
  public function setCancelled($cancelled)
  {
    $this->cancelled = $cancelled;
  }
  public function getCancelled()
  {
    return $this->cancelled;
  }
  /**
   * @param Google_Service_Dfareporting_LastModifiedInfo
   */
  public function setCreatedInfo(Google_Service_Dfareporting_LastModifiedInfo $createdInfo)
  {
    $this->createdInfo = $createdInfo;
  }
  /**
   * @return Google_Service_Dfareporting_LastModifiedInfo
   */
  public function getCreatedInfo()
  {
    return $this->createdInfo;
  }
  public function setEffectiveDate($effectiveDate)
  {
    $this->effectiveDate = $effectiveDate;
  }
  public function getEffectiveDate()
  {
    return $this->effectiveDate;
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
  public function setLastSentRecipients($lastSentRecipients)
  {
    $this->lastSentRecipients = $lastSentRecipients;
  }
  public function getLastSentRecipients()
  {
    return $this->lastSentRecipients;
  }
  public function setLastSentTime($lastSentTime)
  {
    $this->lastSentTime = $lastSentTime;
  }
  public function getLastSentTime()
  {
    return $this->lastSentTime;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setSigned($signed)
  {
    $this->signed = $signed;
  }
  public function getSigned()
  {
    return $this->signed;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
