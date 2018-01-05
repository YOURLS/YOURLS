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

class Google_Service_Games_Quest extends Google_Collection
{
  protected $collection_key = 'milestones';
  public $acceptedTimestampMillis;
  public $applicationId;
  public $bannerUrl;
  public $description;
  public $endTimestampMillis;
  public $iconUrl;
  public $id;
  public $isDefaultBannerUrl;
  public $isDefaultIconUrl;
  public $kind;
  public $lastUpdatedTimestampMillis;
  protected $milestonesType = 'Google_Service_Games_QuestMilestone';
  protected $milestonesDataType = 'array';
  public $name;
  public $notifyTimestampMillis;
  public $startTimestampMillis;
  public $state;

  public function setAcceptedTimestampMillis($acceptedTimestampMillis)
  {
    $this->acceptedTimestampMillis = $acceptedTimestampMillis;
  }
  public function getAcceptedTimestampMillis()
  {
    return $this->acceptedTimestampMillis;
  }
  public function setApplicationId($applicationId)
  {
    $this->applicationId = $applicationId;
  }
  public function getApplicationId()
  {
    return $this->applicationId;
  }
  public function setBannerUrl($bannerUrl)
  {
    $this->bannerUrl = $bannerUrl;
  }
  public function getBannerUrl()
  {
    return $this->bannerUrl;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEndTimestampMillis($endTimestampMillis)
  {
    $this->endTimestampMillis = $endTimestampMillis;
  }
  public function getEndTimestampMillis()
  {
    return $this->endTimestampMillis;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsDefaultBannerUrl($isDefaultBannerUrl)
  {
    $this->isDefaultBannerUrl = $isDefaultBannerUrl;
  }
  public function getIsDefaultBannerUrl()
  {
    return $this->isDefaultBannerUrl;
  }
  public function setIsDefaultIconUrl($isDefaultIconUrl)
  {
    $this->isDefaultIconUrl = $isDefaultIconUrl;
  }
  public function getIsDefaultIconUrl()
  {
    return $this->isDefaultIconUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastUpdatedTimestampMillis($lastUpdatedTimestampMillis)
  {
    $this->lastUpdatedTimestampMillis = $lastUpdatedTimestampMillis;
  }
  public function getLastUpdatedTimestampMillis()
  {
    return $this->lastUpdatedTimestampMillis;
  }
  /**
   * @param Google_Service_Games_QuestMilestone
   */
  public function setMilestones($milestones)
  {
    $this->milestones = $milestones;
  }
  /**
   * @return Google_Service_Games_QuestMilestone
   */
  public function getMilestones()
  {
    return $this->milestones;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotifyTimestampMillis($notifyTimestampMillis)
  {
    $this->notifyTimestampMillis = $notifyTimestampMillis;
  }
  public function getNotifyTimestampMillis()
  {
    return $this->notifyTimestampMillis;
  }
  public function setStartTimestampMillis($startTimestampMillis)
  {
    $this->startTimestampMillis = $startTimestampMillis;
  }
  public function getStartTimestampMillis()
  {
    return $this->startTimestampMillis;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
