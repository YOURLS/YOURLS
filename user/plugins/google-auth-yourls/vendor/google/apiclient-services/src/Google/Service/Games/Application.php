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

class Google_Service_Games_Application extends Google_Collection
{
  protected $collection_key = 'instances';
  protected $internal_gapi_mappings = array(
        "achievementCount" => "achievement_count",
        "leaderboardCount" => "leaderboard_count",
  );
  public $achievementCount;
  protected $assetsType = 'Google_Service_Games_ImageAsset';
  protected $assetsDataType = 'array';
  public $author;
  protected $categoryType = 'Google_Service_Games_ApplicationCategory';
  protected $categoryDataType = '';
  public $description;
  public $enabledFeatures;
  public $id;
  protected $instancesType = 'Google_Service_Games_Instance';
  protected $instancesDataType = 'array';
  public $kind;
  public $lastUpdatedTimestamp;
  public $leaderboardCount;
  public $name;
  public $themeColor;

  public function setAchievementCount($achievementCount)
  {
    $this->achievementCount = $achievementCount;
  }
  public function getAchievementCount()
  {
    return $this->achievementCount;
  }
  /**
   * @param Google_Service_Games_ImageAsset
   */
  public function setAssets($assets)
  {
    $this->assets = $assets;
  }
  /**
   * @return Google_Service_Games_ImageAsset
   */
  public function getAssets()
  {
    return $this->assets;
  }
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param Google_Service_Games_ApplicationCategory
   */
  public function setCategory(Google_Service_Games_ApplicationCategory $category)
  {
    $this->category = $category;
  }
  /**
   * @return Google_Service_Games_ApplicationCategory
   */
  public function getCategory()
  {
    return $this->category;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Games_Instance
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return Google_Service_Games_Instance
   */
  public function getInstances()
  {
    return $this->instances;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
  {
    $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
  }
  public function getLastUpdatedTimestamp()
  {
    return $this->lastUpdatedTimestamp;
  }
  public function setLeaderboardCount($leaderboardCount)
  {
    $this->leaderboardCount = $leaderboardCount;
  }
  public function getLeaderboardCount()
  {
    return $this->leaderboardCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setThemeColor($themeColor)
  {
    $this->themeColor = $themeColor;
  }
  public function getThemeColor()
  {
    return $this->themeColor;
  }
}
