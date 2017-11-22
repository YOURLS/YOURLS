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

class Google_Service_GamesConfiguration_LeaderboardConfiguration extends Google_Model
{
  protected $draftType = 'Google_Service_GamesConfiguration_LeaderboardConfigurationDetail';
  protected $draftDataType = '';
  public $id;
  public $kind;
  protected $publishedType = 'Google_Service_GamesConfiguration_LeaderboardConfigurationDetail';
  protected $publishedDataType = '';
  public $scoreMax;
  public $scoreMin;
  public $scoreOrder;
  public $token;

  /**
   * @param Google_Service_GamesConfiguration_LeaderboardConfigurationDetail
   */
  public function setDraft(Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $draft)
  {
    $this->draft = $draft;
  }
  /**
   * @return Google_Service_GamesConfiguration_LeaderboardConfigurationDetail
   */
  public function getDraft()
  {
    return $this->draft;
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
  /**
   * @param Google_Service_GamesConfiguration_LeaderboardConfigurationDetail
   */
  public function setPublished(Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $published)
  {
    $this->published = $published;
  }
  /**
   * @return Google_Service_GamesConfiguration_LeaderboardConfigurationDetail
   */
  public function getPublished()
  {
    return $this->published;
  }
  public function setScoreMax($scoreMax)
  {
    $this->scoreMax = $scoreMax;
  }
  public function getScoreMax()
  {
    return $this->scoreMax;
  }
  public function setScoreMin($scoreMin)
  {
    $this->scoreMin = $scoreMin;
  }
  public function getScoreMin()
  {
    return $this->scoreMin;
  }
  public function setScoreOrder($scoreOrder)
  {
    $this->scoreOrder = $scoreOrder;
  }
  public function getScoreOrder()
  {
    return $this->scoreOrder;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
}
