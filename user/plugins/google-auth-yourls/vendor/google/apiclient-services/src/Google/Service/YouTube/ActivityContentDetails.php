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

class Google_Service_YouTube_ActivityContentDetails extends Google_Model
{
  protected $bulletinType = 'Google_Service_YouTube_ActivityContentDetailsBulletin';
  protected $bulletinDataType = '';
  protected $channelItemType = 'Google_Service_YouTube_ActivityContentDetailsChannelItem';
  protected $channelItemDataType = '';
  protected $commentType = 'Google_Service_YouTube_ActivityContentDetailsComment';
  protected $commentDataType = '';
  protected $favoriteType = 'Google_Service_YouTube_ActivityContentDetailsFavorite';
  protected $favoriteDataType = '';
  protected $likeType = 'Google_Service_YouTube_ActivityContentDetailsLike';
  protected $likeDataType = '';
  protected $playlistItemType = 'Google_Service_YouTube_ActivityContentDetailsPlaylistItem';
  protected $playlistItemDataType = '';
  protected $promotedItemType = 'Google_Service_YouTube_ActivityContentDetailsPromotedItem';
  protected $promotedItemDataType = '';
  protected $recommendationType = 'Google_Service_YouTube_ActivityContentDetailsRecommendation';
  protected $recommendationDataType = '';
  protected $socialType = 'Google_Service_YouTube_ActivityContentDetailsSocial';
  protected $socialDataType = '';
  protected $subscriptionType = 'Google_Service_YouTube_ActivityContentDetailsSubscription';
  protected $subscriptionDataType = '';
  protected $uploadType = 'Google_Service_YouTube_ActivityContentDetailsUpload';
  protected $uploadDataType = '';

  /**
   * @param Google_Service_YouTube_ActivityContentDetailsBulletin
   */
  public function setBulletin(Google_Service_YouTube_ActivityContentDetailsBulletin $bulletin)
  {
    $this->bulletin = $bulletin;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsBulletin
   */
  public function getBulletin()
  {
    return $this->bulletin;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsChannelItem
   */
  public function setChannelItem(Google_Service_YouTube_ActivityContentDetailsChannelItem $channelItem)
  {
    $this->channelItem = $channelItem;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsChannelItem
   */
  public function getChannelItem()
  {
    return $this->channelItem;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsComment
   */
  public function setComment(Google_Service_YouTube_ActivityContentDetailsComment $comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsComment
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsFavorite
   */
  public function setFavorite(Google_Service_YouTube_ActivityContentDetailsFavorite $favorite)
  {
    $this->favorite = $favorite;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsFavorite
   */
  public function getFavorite()
  {
    return $this->favorite;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsLike
   */
  public function setLike(Google_Service_YouTube_ActivityContentDetailsLike $like)
  {
    $this->like = $like;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsLike
   */
  public function getLike()
  {
    return $this->like;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsPlaylistItem
   */
  public function setPlaylistItem(Google_Service_YouTube_ActivityContentDetailsPlaylistItem $playlistItem)
  {
    $this->playlistItem = $playlistItem;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsPlaylistItem
   */
  public function getPlaylistItem()
  {
    return $this->playlistItem;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsPromotedItem
   */
  public function setPromotedItem(Google_Service_YouTube_ActivityContentDetailsPromotedItem $promotedItem)
  {
    $this->promotedItem = $promotedItem;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsPromotedItem
   */
  public function getPromotedItem()
  {
    return $this->promotedItem;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsRecommendation
   */
  public function setRecommendation(Google_Service_YouTube_ActivityContentDetailsRecommendation $recommendation)
  {
    $this->recommendation = $recommendation;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsRecommendation
   */
  public function getRecommendation()
  {
    return $this->recommendation;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsSocial
   */
  public function setSocial(Google_Service_YouTube_ActivityContentDetailsSocial $social)
  {
    $this->social = $social;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsSocial
   */
  public function getSocial()
  {
    return $this->social;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsSubscription
   */
  public function setSubscription(Google_Service_YouTube_ActivityContentDetailsSubscription $subscription)
  {
    $this->subscription = $subscription;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsSubscription
   */
  public function getSubscription()
  {
    return $this->subscription;
  }
  /**
   * @param Google_Service_YouTube_ActivityContentDetailsUpload
   */
  public function setUpload(Google_Service_YouTube_ActivityContentDetailsUpload $upload)
  {
    $this->upload = $upload;
  }
  /**
   * @return Google_Service_YouTube_ActivityContentDetailsUpload
   */
  public function getUpload()
  {
    return $this->upload;
  }
}
