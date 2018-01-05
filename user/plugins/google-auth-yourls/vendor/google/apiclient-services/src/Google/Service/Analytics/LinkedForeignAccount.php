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

class Google_Service_Analytics_LinkedForeignAccount extends Google_Model
{
  public $accountId;
  public $eligibleForSearch;
  public $id;
  public $internalWebPropertyId;
  public $kind;
  public $linkedAccountId;
  public $remarketingAudienceId;
  public $status;
  public $type;
  public $webPropertyId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setEligibleForSearch($eligibleForSearch)
  {
    $this->eligibleForSearch = $eligibleForSearch;
  }
  public function getEligibleForSearch()
  {
    return $this->eligibleForSearch;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLinkedAccountId($linkedAccountId)
  {
    $this->linkedAccountId = $linkedAccountId;
  }
  public function getLinkedAccountId()
  {
    return $this->linkedAccountId;
  }
  public function setRemarketingAudienceId($remarketingAudienceId)
  {
    $this->remarketingAudienceId = $remarketingAudienceId;
  }
  public function getRemarketingAudienceId()
  {
    return $this->remarketingAudienceId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}
