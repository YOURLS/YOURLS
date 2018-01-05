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

class Google_Service_Analytics_ProfileFilterLink extends Google_Model
{
  protected $filterRefType = 'Google_Service_Analytics_FilterRef';
  protected $filterRefDataType = '';
  public $id;
  public $kind;
  protected $profileRefType = 'Google_Service_Analytics_ProfileRef';
  protected $profileRefDataType = '';
  public $rank;
  public $selfLink;

  /**
   * @param Google_Service_Analytics_FilterRef
   */
  public function setFilterRef(Google_Service_Analytics_FilterRef $filterRef)
  {
    $this->filterRef = $filterRef;
  }
  /**
   * @return Google_Service_Analytics_FilterRef
   */
  public function getFilterRef()
  {
    return $this->filterRef;
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
   * @param Google_Service_Analytics_ProfileRef
   */
  public function setProfileRef(Google_Service_Analytics_ProfileRef $profileRef)
  {
    $this->profileRef = $profileRef;
  }
  /**
   * @return Google_Service_Analytics_ProfileRef
   */
  public function getProfileRef()
  {
    return $this->profileRef;
  }
  public function setRank($rank)
  {
    $this->rank = $rank;
  }
  public function getRank()
  {
    return $this->rank;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}
