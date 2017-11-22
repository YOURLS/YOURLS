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

class Google_Service_PlusDomains_ActivityActor extends Google_Model
{
  protected $clientSpecificActorInfoType = 'Google_Service_PlusDomains_ActivityActorClientSpecificActorInfo';
  protected $clientSpecificActorInfoDataType = '';
  public $displayName;
  public $id;
  protected $imageType = 'Google_Service_PlusDomains_ActivityActorImage';
  protected $imageDataType = '';
  protected $nameType = 'Google_Service_PlusDomains_ActivityActorName';
  protected $nameDataType = '';
  public $url;
  protected $verificationType = 'Google_Service_PlusDomains_ActivityActorVerification';
  protected $verificationDataType = '';

  /**
   * @param Google_Service_PlusDomains_ActivityActorClientSpecificActorInfo
   */
  public function setClientSpecificActorInfo(Google_Service_PlusDomains_ActivityActorClientSpecificActorInfo $clientSpecificActorInfo)
  {
    $this->clientSpecificActorInfo = $clientSpecificActorInfo;
  }
  /**
   * @return Google_Service_PlusDomains_ActivityActorClientSpecificActorInfo
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
   * @param Google_Service_PlusDomains_ActivityActorImage
   */
  public function setImage(Google_Service_PlusDomains_ActivityActorImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_PlusDomains_ActivityActorImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_PlusDomains_ActivityActorName
   */
  public function setName(Google_Service_PlusDomains_ActivityActorName $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_PlusDomains_ActivityActorName
   */
  public function getName()
  {
    return $this->name;
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
   * @param Google_Service_PlusDomains_ActivityActorVerification
   */
  public function setVerification(Google_Service_PlusDomains_ActivityActorVerification $verification)
  {
    $this->verification = $verification;
  }
  /**
   * @return Google_Service_PlusDomains_ActivityActorVerification
   */
  public function getVerification()
  {
    return $this->verification;
  }
}
