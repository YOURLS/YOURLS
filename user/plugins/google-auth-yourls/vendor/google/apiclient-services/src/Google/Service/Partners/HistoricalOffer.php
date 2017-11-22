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

class Google_Service_Partners_HistoricalOffer extends Google_Model
{
  public $adwordsUrl;
  public $clientEmail;
  public $clientId;
  public $clientName;
  public $creationTime;
  public $expirationTime;
  public $lastModifiedTime;
  public $offerCode;
  public $offerCountryCode;
  public $offerType;
  public $senderName;
  public $status;

  public function setAdwordsUrl($adwordsUrl)
  {
    $this->adwordsUrl = $adwordsUrl;
  }
  public function getAdwordsUrl()
  {
    return $this->adwordsUrl;
  }
  public function setClientEmail($clientEmail)
  {
    $this->clientEmail = $clientEmail;
  }
  public function getClientEmail()
  {
    return $this->clientEmail;
  }
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setClientName($clientName)
  {
    $this->clientName = $clientName;
  }
  public function getClientName()
  {
    return $this->clientName;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setOfferCode($offerCode)
  {
    $this->offerCode = $offerCode;
  }
  public function getOfferCode()
  {
    return $this->offerCode;
  }
  public function setOfferCountryCode($offerCountryCode)
  {
    $this->offerCountryCode = $offerCountryCode;
  }
  public function getOfferCountryCode()
  {
    return $this->offerCountryCode;
  }
  public function setOfferType($offerType)
  {
    $this->offerType = $offerType;
  }
  public function getOfferType()
  {
    return $this->offerType;
  }
  public function setSenderName($senderName)
  {
    $this->senderName = $senderName;
  }
  public function getSenderName()
  {
    return $this->senderName;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
