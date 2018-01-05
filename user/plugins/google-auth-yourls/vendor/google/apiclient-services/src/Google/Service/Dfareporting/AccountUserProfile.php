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

class Google_Service_Dfareporting_AccountUserProfile extends Google_Model
{
  public $accountId;
  public $active;
  protected $advertiserFilterType = 'Google_Service_Dfareporting_ObjectFilter';
  protected $advertiserFilterDataType = '';
  protected $campaignFilterType = 'Google_Service_Dfareporting_ObjectFilter';
  protected $campaignFilterDataType = '';
  public $comments;
  public $email;
  public $id;
  public $kind;
  public $locale;
  public $name;
  protected $siteFilterType = 'Google_Service_Dfareporting_ObjectFilter';
  protected $siteFilterDataType = '';
  public $subaccountId;
  public $traffickerType;
  public $userAccessType;
  protected $userRoleFilterType = 'Google_Service_Dfareporting_ObjectFilter';
  protected $userRoleFilterDataType = '';
  public $userRoleId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param Google_Service_Dfareporting_ObjectFilter
   */
  public function setAdvertiserFilter(Google_Service_Dfareporting_ObjectFilter $advertiserFilter)
  {
    $this->advertiserFilter = $advertiserFilter;
  }
  /**
   * @return Google_Service_Dfareporting_ObjectFilter
   */
  public function getAdvertiserFilter()
  {
    return $this->advertiserFilter;
  }
  /**
   * @param Google_Service_Dfareporting_ObjectFilter
   */
  public function setCampaignFilter(Google_Service_Dfareporting_ObjectFilter $campaignFilter)
  {
    $this->campaignFilter = $campaignFilter;
  }
  /**
   * @return Google_Service_Dfareporting_ObjectFilter
   */
  public function getCampaignFilter()
  {
    return $this->campaignFilter;
  }
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  public function getComments()
  {
    return $this->comments;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
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
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Dfareporting_ObjectFilter
   */
  public function setSiteFilter(Google_Service_Dfareporting_ObjectFilter $siteFilter)
  {
    $this->siteFilter = $siteFilter;
  }
  /**
   * @return Google_Service_Dfareporting_ObjectFilter
   */
  public function getSiteFilter()
  {
    return $this->siteFilter;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTraffickerType($traffickerType)
  {
    $this->traffickerType = $traffickerType;
  }
  public function getTraffickerType()
  {
    return $this->traffickerType;
  }
  public function setUserAccessType($userAccessType)
  {
    $this->userAccessType = $userAccessType;
  }
  public function getUserAccessType()
  {
    return $this->userAccessType;
  }
  /**
   * @param Google_Service_Dfareporting_ObjectFilter
   */
  public function setUserRoleFilter(Google_Service_Dfareporting_ObjectFilter $userRoleFilter)
  {
    $this->userRoleFilter = $userRoleFilter;
  }
  /**
   * @return Google_Service_Dfareporting_ObjectFilter
   */
  public function getUserRoleFilter()
  {
    return $this->userRoleFilter;
  }
  public function setUserRoleId($userRoleId)
  {
    $this->userRoleId = $userRoleId;
  }
  public function getUserRoleId()
  {
    return $this->userRoleId;
  }
}
