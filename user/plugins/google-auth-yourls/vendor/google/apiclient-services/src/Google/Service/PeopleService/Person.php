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

class Google_Service_PeopleService_Person extends Google_Collection
{
  protected $collection_key = 'userDefined';
  protected $addressesType = 'Google_Service_PeopleService_Address';
  protected $addressesDataType = 'array';
  public $ageRange;
  protected $ageRangesType = 'Google_Service_PeopleService_AgeRangeType';
  protected $ageRangesDataType = 'array';
  protected $biographiesType = 'Google_Service_PeopleService_Biography';
  protected $biographiesDataType = 'array';
  protected $birthdaysType = 'Google_Service_PeopleService_Birthday';
  protected $birthdaysDataType = 'array';
  protected $braggingRightsType = 'Google_Service_PeopleService_BraggingRights';
  protected $braggingRightsDataType = 'array';
  protected $coverPhotosType = 'Google_Service_PeopleService_CoverPhoto';
  protected $coverPhotosDataType = 'array';
  protected $emailAddressesType = 'Google_Service_PeopleService_EmailAddress';
  protected $emailAddressesDataType = 'array';
  public $etag;
  protected $eventsType = 'Google_Service_PeopleService_Event';
  protected $eventsDataType = 'array';
  protected $gendersType = 'Google_Service_PeopleService_Gender';
  protected $gendersDataType = 'array';
  protected $imClientsType = 'Google_Service_PeopleService_ImClient';
  protected $imClientsDataType = 'array';
  protected $interestsType = 'Google_Service_PeopleService_Interest';
  protected $interestsDataType = 'array';
  protected $localesType = 'Google_Service_PeopleService_Locale';
  protected $localesDataType = 'array';
  protected $membershipsType = 'Google_Service_PeopleService_Membership';
  protected $membershipsDataType = 'array';
  protected $metadataType = 'Google_Service_PeopleService_PersonMetadata';
  protected $metadataDataType = '';
  protected $namesType = 'Google_Service_PeopleService_Name';
  protected $namesDataType = 'array';
  protected $nicknamesType = 'Google_Service_PeopleService_Nickname';
  protected $nicknamesDataType = 'array';
  protected $occupationsType = 'Google_Service_PeopleService_Occupation';
  protected $occupationsDataType = 'array';
  protected $organizationsType = 'Google_Service_PeopleService_Organization';
  protected $organizationsDataType = 'array';
  protected $phoneNumbersType = 'Google_Service_PeopleService_PhoneNumber';
  protected $phoneNumbersDataType = 'array';
  protected $photosType = 'Google_Service_PeopleService_Photo';
  protected $photosDataType = 'array';
  protected $relationsType = 'Google_Service_PeopleService_Relation';
  protected $relationsDataType = 'array';
  protected $relationshipInterestsType = 'Google_Service_PeopleService_RelationshipInterest';
  protected $relationshipInterestsDataType = 'array';
  protected $relationshipStatusesType = 'Google_Service_PeopleService_RelationshipStatus';
  protected $relationshipStatusesDataType = 'array';
  protected $residencesType = 'Google_Service_PeopleService_Residence';
  protected $residencesDataType = 'array';
  public $resourceName;
  protected $skillsType = 'Google_Service_PeopleService_Skill';
  protected $skillsDataType = 'array';
  protected $taglinesType = 'Google_Service_PeopleService_Tagline';
  protected $taglinesDataType = 'array';
  protected $urlsType = 'Google_Service_PeopleService_Url';
  protected $urlsDataType = 'array';
  protected $userDefinedType = 'Google_Service_PeopleService_UserDefined';
  protected $userDefinedDataType = 'array';

  /**
   * @param Google_Service_PeopleService_Address
   */
  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  /**
   * @return Google_Service_PeopleService_Address
   */
  public function getAddresses()
  {
    return $this->addresses;
  }
  public function setAgeRange($ageRange)
  {
    $this->ageRange = $ageRange;
  }
  public function getAgeRange()
  {
    return $this->ageRange;
  }
  /**
   * @param Google_Service_PeopleService_AgeRangeType
   */
  public function setAgeRanges($ageRanges)
  {
    $this->ageRanges = $ageRanges;
  }
  /**
   * @return Google_Service_PeopleService_AgeRangeType
   */
  public function getAgeRanges()
  {
    return $this->ageRanges;
  }
  /**
   * @param Google_Service_PeopleService_Biography
   */
  public function setBiographies($biographies)
  {
    $this->biographies = $biographies;
  }
  /**
   * @return Google_Service_PeopleService_Biography
   */
  public function getBiographies()
  {
    return $this->biographies;
  }
  /**
   * @param Google_Service_PeopleService_Birthday
   */
  public function setBirthdays($birthdays)
  {
    $this->birthdays = $birthdays;
  }
  /**
   * @return Google_Service_PeopleService_Birthday
   */
  public function getBirthdays()
  {
    return $this->birthdays;
  }
  /**
   * @param Google_Service_PeopleService_BraggingRights
   */
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  /**
   * @return Google_Service_PeopleService_BraggingRights
   */
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  /**
   * @param Google_Service_PeopleService_CoverPhoto
   */
  public function setCoverPhotos($coverPhotos)
  {
    $this->coverPhotos = $coverPhotos;
  }
  /**
   * @return Google_Service_PeopleService_CoverPhoto
   */
  public function getCoverPhotos()
  {
    return $this->coverPhotos;
  }
  /**
   * @param Google_Service_PeopleService_EmailAddress
   */
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  /**
   * @return Google_Service_PeopleService_EmailAddress
   */
  public function getEmailAddresses()
  {
    return $this->emailAddresses;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_PeopleService_Event
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return Google_Service_PeopleService_Event
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param Google_Service_PeopleService_Gender
   */
  public function setGenders($genders)
  {
    $this->genders = $genders;
  }
  /**
   * @return Google_Service_PeopleService_Gender
   */
  public function getGenders()
  {
    return $this->genders;
  }
  /**
   * @param Google_Service_PeopleService_ImClient
   */
  public function setImClients($imClients)
  {
    $this->imClients = $imClients;
  }
  /**
   * @return Google_Service_PeopleService_ImClient
   */
  public function getImClients()
  {
    return $this->imClients;
  }
  /**
   * @param Google_Service_PeopleService_Interest
   */
  public function setInterests($interests)
  {
    $this->interests = $interests;
  }
  /**
   * @return Google_Service_PeopleService_Interest
   */
  public function getInterests()
  {
    return $this->interests;
  }
  /**
   * @param Google_Service_PeopleService_Locale
   */
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  /**
   * @return Google_Service_PeopleService_Locale
   */
  public function getLocales()
  {
    return $this->locales;
  }
  /**
   * @param Google_Service_PeopleService_Membership
   */
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  /**
   * @return Google_Service_PeopleService_Membership
   */
  public function getMemberships()
  {
    return $this->memberships;
  }
  /**
   * @param Google_Service_PeopleService_PersonMetadata
   */
  public function setMetadata(Google_Service_PeopleService_PersonMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_PeopleService_PersonMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_PeopleService_Name
   */
  public function setNames($names)
  {
    $this->names = $names;
  }
  /**
   * @return Google_Service_PeopleService_Name
   */
  public function getNames()
  {
    return $this->names;
  }
  /**
   * @param Google_Service_PeopleService_Nickname
   */
  public function setNicknames($nicknames)
  {
    $this->nicknames = $nicknames;
  }
  /**
   * @return Google_Service_PeopleService_Nickname
   */
  public function getNicknames()
  {
    return $this->nicknames;
  }
  /**
   * @param Google_Service_PeopleService_Occupation
   */
  public function setOccupations($occupations)
  {
    $this->occupations = $occupations;
  }
  /**
   * @return Google_Service_PeopleService_Occupation
   */
  public function getOccupations()
  {
    return $this->occupations;
  }
  /**
   * @param Google_Service_PeopleService_Organization
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return Google_Service_PeopleService_Organization
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
  /**
   * @param Google_Service_PeopleService_PhoneNumber
   */
  public function setPhoneNumbers($phoneNumbers)
  {
    $this->phoneNumbers = $phoneNumbers;
  }
  /**
   * @return Google_Service_PeopleService_PhoneNumber
   */
  public function getPhoneNumbers()
  {
    return $this->phoneNumbers;
  }
  /**
   * @param Google_Service_PeopleService_Photo
   */
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  /**
   * @return Google_Service_PeopleService_Photo
   */
  public function getPhotos()
  {
    return $this->photos;
  }
  /**
   * @param Google_Service_PeopleService_Relation
   */
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  /**
   * @return Google_Service_PeopleService_Relation
   */
  public function getRelations()
  {
    return $this->relations;
  }
  /**
   * @param Google_Service_PeopleService_RelationshipInterest
   */
  public function setRelationshipInterests($relationshipInterests)
  {
    $this->relationshipInterests = $relationshipInterests;
  }
  /**
   * @return Google_Service_PeopleService_RelationshipInterest
   */
  public function getRelationshipInterests()
  {
    return $this->relationshipInterests;
  }
  /**
   * @param Google_Service_PeopleService_RelationshipStatus
   */
  public function setRelationshipStatuses($relationshipStatuses)
  {
    $this->relationshipStatuses = $relationshipStatuses;
  }
  /**
   * @return Google_Service_PeopleService_RelationshipStatus
   */
  public function getRelationshipStatuses()
  {
    return $this->relationshipStatuses;
  }
  /**
   * @param Google_Service_PeopleService_Residence
   */
  public function setResidences($residences)
  {
    $this->residences = $residences;
  }
  /**
   * @return Google_Service_PeopleService_Residence
   */
  public function getResidences()
  {
    return $this->residences;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param Google_Service_PeopleService_Skill
   */
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  /**
   * @return Google_Service_PeopleService_Skill
   */
  public function getSkills()
  {
    return $this->skills;
  }
  /**
   * @param Google_Service_PeopleService_Tagline
   */
  public function setTaglines($taglines)
  {
    $this->taglines = $taglines;
  }
  /**
   * @return Google_Service_PeopleService_Tagline
   */
  public function getTaglines()
  {
    return $this->taglines;
  }
  /**
   * @param Google_Service_PeopleService_Url
   */
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return Google_Service_PeopleService_Url
   */
  public function getUrls()
  {
    return $this->urls;
  }
  /**
   * @param Google_Service_PeopleService_UserDefined
   */
  public function setUserDefined($userDefined)
  {
    $this->userDefined = $userDefined;
  }
  /**
   * @return Google_Service_PeopleService_UserDefined
   */
  public function getUserDefined()
  {
    return $this->userDefined;
  }
}
