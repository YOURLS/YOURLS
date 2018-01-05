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

class Google_Service_Dfareporting_CreativeCustomEvent extends Google_Model
{
  public $advertiserCustomEventId;
  public $advertiserCustomEventName;
  public $advertiserCustomEventType;
  public $artworkLabel;
  public $artworkType;
  protected $exitClickThroughUrlType = 'Google_Service_Dfareporting_CreativeClickThroughUrl';
  protected $exitClickThroughUrlDataType = '';
  public $id;
  protected $popupWindowPropertiesType = 'Google_Service_Dfareporting_PopupWindowProperties';
  protected $popupWindowPropertiesDataType = '';
  public $targetType;
  public $videoReportingId;

  public function setAdvertiserCustomEventId($advertiserCustomEventId)
  {
    $this->advertiserCustomEventId = $advertiserCustomEventId;
  }
  public function getAdvertiserCustomEventId()
  {
    return $this->advertiserCustomEventId;
  }
  public function setAdvertiserCustomEventName($advertiserCustomEventName)
  {
    $this->advertiserCustomEventName = $advertiserCustomEventName;
  }
  public function getAdvertiserCustomEventName()
  {
    return $this->advertiserCustomEventName;
  }
  public function setAdvertiserCustomEventType($advertiserCustomEventType)
  {
    $this->advertiserCustomEventType = $advertiserCustomEventType;
  }
  public function getAdvertiserCustomEventType()
  {
    return $this->advertiserCustomEventType;
  }
  public function setArtworkLabel($artworkLabel)
  {
    $this->artworkLabel = $artworkLabel;
  }
  public function getArtworkLabel()
  {
    return $this->artworkLabel;
  }
  public function setArtworkType($artworkType)
  {
    $this->artworkType = $artworkType;
  }
  public function getArtworkType()
  {
    return $this->artworkType;
  }
  /**
   * @param Google_Service_Dfareporting_CreativeClickThroughUrl
   */
  public function setExitClickThroughUrl(Google_Service_Dfareporting_CreativeClickThroughUrl $exitClickThroughUrl)
  {
    $this->exitClickThroughUrl = $exitClickThroughUrl;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeClickThroughUrl
   */
  public function getExitClickThroughUrl()
  {
    return $this->exitClickThroughUrl;
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
   * @param Google_Service_Dfareporting_PopupWindowProperties
   */
  public function setPopupWindowProperties(Google_Service_Dfareporting_PopupWindowProperties $popupWindowProperties)
  {
    $this->popupWindowProperties = $popupWindowProperties;
  }
  /**
   * @return Google_Service_Dfareporting_PopupWindowProperties
   */
  public function getPopupWindowProperties()
  {
    return $this->popupWindowProperties;
  }
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  public function getTargetType()
  {
    return $this->targetType;
  }
  public function setVideoReportingId($videoReportingId)
  {
    $this->videoReportingId = $videoReportingId;
  }
  public function getVideoReportingId()
  {
    return $this->videoReportingId;
  }
}
