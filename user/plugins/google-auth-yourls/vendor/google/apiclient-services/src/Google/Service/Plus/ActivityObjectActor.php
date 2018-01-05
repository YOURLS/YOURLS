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

class Google_Service_Plus_ActivityObjectActor extends Google_Model
{
  protected $clientSpecificActorInfoType = 'Google_Service_Plus_ActivityObjectActorClientSpecificActorInfo';
  protected $clientSpecificActorInfoDataType = '';
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_Plus_ActivityObjectActorImage';
  protected $imageDataType = '';
  public $url;
  protected $verificationType = 'Google_Service_Plus_ActivityObjectActorVerification';
  protected $verificationDataType = '';

  /**
   * @param Google_Service_Plus_ActivityObjectActorClientSpecificActorInfo
   */
  public function setClientSpecificActorInfo(Google_Service_Plus_ActivityObjectActorClientSpecificActorInfo $clientSpecificActorInfo)
  {
    $this->clientSpecificActorInfo = $clientSpecificActorInfo;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectActorClientSpecificActorInfo
   */
  public function getClientSpecificActorInfo()
  {
    return $this->clientSpecificActorInfo;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param Google_Service_Plus_ActivityObjectActorImage
   */
  public function setImage(Google_Service_Plus_ActivityObjectActorImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectActorImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectActorVerification
   */
  public function setVerification(Google_Service_Plus_ActivityObjectActorVerification $verification)
  {
    $this->verification = $verification;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectActorVerification
   */
  public function getVerification()
  {
    return $this->verification;
  }
}
