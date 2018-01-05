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

class Google_Service_ShoppingContent_Account extends Google_Collection
{
  protected $collection_key = 'youtubeChannelLinks';
  public $adultContent;
  protected $adwordsLinksType = 'Google_Service_ShoppingContent_AccountAdwordsLink';
  protected $adwordsLinksDataType = 'array';
  public $id;
  public $kind;
  public $name;
  public $reviewsUrl;
  public $sellerId;
  protected $usersType = 'Google_Service_ShoppingContent_AccountUser';
  protected $usersDataType = 'array';
  public $websiteUrl;
  protected $youtubeChannelLinksType = 'Google_Service_ShoppingContent_AccountYouTubeChannelLink';
  protected $youtubeChannelLinksDataType = 'array';

  public function setAdultContent($adultContent)
  {
    $this->adultContent = $adultContent;
  }
  public function getAdultContent()
  {
    return $this->adultContent;
  }
  /**
   * @param Google_Service_ShoppingContent_AccountAdwordsLink
   */
  public function setAdwordsLinks($adwordsLinks)
  {
    $this->adwordsLinks = $adwordsLinks;
  }
  /**
   * @return Google_Service_ShoppingContent_AccountAdwordsLink
   */
  public function getAdwordsLinks()
  {
    return $this->adwordsLinks;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReviewsUrl($reviewsUrl)
  {
    $this->reviewsUrl = $reviewsUrl;
  }
  public function getReviewsUrl()
  {
    return $this->reviewsUrl;
  }
  public function setSellerId($sellerId)
  {
    $this->sellerId = $sellerId;
  }
  public function getSellerId()
  {
    return $this->sellerId;
  }
  /**
   * @param Google_Service_ShoppingContent_AccountUser
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return Google_Service_ShoppingContent_AccountUser
   */
  public function getUsers()
  {
    return $this->users;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
  /**
   * @param Google_Service_ShoppingContent_AccountYouTubeChannelLink
   */
  public function setYoutubeChannelLinks($youtubeChannelLinks)
  {
    $this->youtubeChannelLinks = $youtubeChannelLinks;
  }
  /**
   * @return Google_Service_ShoppingContent_AccountYouTubeChannelLink
   */
  public function getYoutubeChannelLinks()
  {
    return $this->youtubeChannelLinks;
  }
}
