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

class Google_Service_PlusDomains_Person extends Google_Collection
{
  protected $collection_key = 'urls';
  public $aboutMe;
  public $birthday;
  public $braggingRights;
  public $circledByCount;
  protected $coverType = 'Google_Service_PlusDomains_PersonCover';
  protected $coverDataType = '';
  public $currentLocation;
  public $displayName;
  public $domain;
  protected $emailsType = 'Google_Service_PlusDomains_PersonEmails';
  protected $emailsDataType = 'array';
  public $etag;
  public $gender;
  public $id;
  protected $imageType = 'Google_Service_PlusDomains_PersonImage';
  protected $imageDataType = '';
  public $isPlusUser;
  public $kind;
  protected $nameType = 'Google_Service_PlusDomains_PersonName';
  protected $nameDataType = '';
  public $nickname;
  public $objectType;
  public $occupation;
  protected $organizationsType = 'Google_Service_PlusDomains_PersonOrganizations';
  protected $organizationsDataType = 'array';
  protected $placesLivedType = 'Google_Service_PlusDomains_PersonPlacesLived';
  protected $placesLivedDataType = 'array';
  public $plusOneCount;
  public $relationshipStatus;
  public $skills;
  public $tagline;
  public $url;
  protected $urlsType = 'Google_Service_PlusDomains_PersonUrls';
  protected $urlsDataType = 'array';
  public $verified;

  public function setAboutMe($aboutMe)
  {
    $this->aboutMe = $aboutMe;
  }
  public function getAboutMe()
  {
    return $this->aboutMe;
  }
  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
  }
  public function getBirthday()
  {
    return $this->birthday;
  }
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  public function setCircledByCount($circledByCount)
  {
    $this->circledByCount = $circledByCount;
  }
  public function getCircledByCount()
  {
    return $this->circledByCount;
  }
  /**
   * @param Google_Service_PlusDomains_PersonCover
   */
  public function setCover(Google_Service_PlusDomains_PersonCover $cover)
  {
    $this->cover = $cover;
  }
  /**
   * @return Google_Service_PlusDomains_PersonCover
   */
  public function getCover()
  {
    return $this->cover;
  }
  public function setCurrentLocation($currentLocation)
  {
    $this->currentLocation = $currentLocation;
  }
  public function getCurrentLocation()
  {
    return $this->currentLocation;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param Google_Service_PlusDomains_PersonEmails
   */
  public function setEmails($emails)
  {
    $this->emails = $emails;
  }
  /**
   * @return Google_Service_PlusDomains_PersonEmails
   */
  public function getEmails()
  {
    return $this->emails;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function getGender()
  {
    return $this->gender;
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
   * @param Google_Service_PlusDomains_PersonImage
   */
  public function setImage(Google_Service_PlusDomains_PersonImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_PlusDomains_PersonImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setIsPlusUser($isPlusUser)
  {
    $this->isPlusUser = $isPlusUser;
  }
  public function getIsPlusUser()
  {
    return $this->isPlusUser;
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
   * @param Google_Service_PlusDomains_PersonName
   */
  public function setName(Google_Service_PlusDomains_PersonName $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_PlusDomains_PersonName
   */
  public function getName()
  {
    return $this->name;
  }
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  public function getNickname()
  {
    return $this->nickname;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  public function setOccupation($occupation)
  {
    $this->occupation = $occupation;
  }
  public function getOccupation()
  {
    return $this->occupation;
  }
  /**
   * @param Google_Service_PlusDomains_PersonOrganizations
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return Google_Service_PlusDomains_PersonOrganizations
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
  /**
   * @param Google_Service_PlusDomains_PersonPlacesLived
   */
  public function setPlacesLived($placesLived)
  {
    $this->placesLived = $placesLived;
  }
  /**
   * @return Google_Service_PlusDomains_PersonPlacesLived
   */
  public function getPlacesLived()
  {
    return $this->placesLived;
  }
  public function setPlusOneCount($plusOneCount)
  {
    $this->plusOneCount = $plusOneCount;
  }
  public function getPlusOneCount()
  {
    return $this->plusOneCount;
  }
  public function setRelationshipStatus($relationshipStatus)
  {
    $this->relationshipStatus = $relationshipStatus;
  }
  public function getRelationshipStatus()
  {
    return $this->relationshipStatus;
  }
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  public function getSkills()
  {
    return $this->skills;
  }
  public function setTagline($tagline)
  {
    $this->tagline = $tagline;
  }
  public function getTagline()
  {
    return $this->tagline;
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
   * @param Google_Service_PlusDomains_PersonUrls
   */
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return Google_Service_PlusDomains_PersonUrls
   */
  public function getUrls()
  {
    return $this->urls;
  }
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  public function getVerified()
  {
    return $this->verified;
  }
}
