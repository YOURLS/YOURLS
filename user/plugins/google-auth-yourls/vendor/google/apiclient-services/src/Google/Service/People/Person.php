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

class Google_Service_People_Person extends Google_Collection
{
  protected $collection_key = 'urls';
  protected $addressesType = 'Google_Service_People_Address';
  protected $addressesDataType = 'array';
  public $ageRange;
  protected $ageRangesType = 'Google_Service_People_AgeRangeType';
  protected $ageRangesDataType = 'array';
  protected $biographiesType = 'Google_Service_People_Biography';
  protected $biographiesDataType = 'array';
  protected $birthdaysType = 'Google_Service_People_Birthday';
  protected $birthdaysDataType = 'array';
  protected $braggingRightsType = 'Google_Service_People_BraggingRights';
  protected $braggingRightsDataType = 'array';
  protected $coverPhotosType = 'Google_Service_People_CoverPhoto';
  protected $coverPhotosDataType = 'array';
  protected $emailAddressesType = 'Google_Service_People_EmailAddress';
  protected $emailAddressesDataType = 'array';
  public $etag;
  protected $eventsType = 'Google_Service_People_Event';
  protected $eventsDataType = 'array';
  protected $gendersType = 'Google_Service_People_Gender';
  protected $gendersDataType = 'array';
  protected $imClientsType = 'Google_Service_People_ImClient';
  protected $imClientsDataType = 'array';
  protected $interestsType = 'Google_Service_People_Interest';
  protected $interestsDataType = 'array';
  protected $localesType = 'Google_Service_People_Locale';
  protected $localesDataType = 'array';
  protected $membershipsType = 'Google_Service_People_Membership';
  protected $membershipsDataType = 'array';
  protected $metadataType = 'Google_Service_People_PersonMetadata';
  protected $metadataDataType = '';
  protected $namesType = 'Google_Service_People_Name';
  protected $namesDataType = 'array';
  protected $nicknamesType = 'Google_Service_People_Nickname';
  protected $nicknamesDataType = 'array';
  protected $occupationsType = 'Google_Service_People_Occupation';
  protected $occupationsDataType = 'array';
  protected $organizationsType = 'Google_Service_People_Organization';
  protected $organizationsDataType = 'array';
  protected $phoneNumbersType = 'Google_Service_People_PhoneNumber';
  protected $phoneNumbersDataType = 'array';
  protected $photosType = 'Google_Service_People_Photo';
  protected $photosDataType = 'array';
  protected $relationsType = 'Google_Service_People_Relation';
  protected $relationsDataType = 'array';
  protected $relationshipInterestsType = 'Google_Service_People_RelationshipInterest';
  protected $relationshipInterestsDataType = 'array';
  protected $relationshipStatusesType = 'Google_Service_People_RelationshipStatus';
  protected $relationshipStatusesDataType = 'array';
  protected $residencesType = 'Google_Service_People_Residence';
  protected $residencesDataType = 'array';
  public $resourceName;
  protected $skillsType = 'Google_Service_People_Skill';
  protected $skillsDataType = 'array';
  protected $taglinesType = 'Google_Service_People_Tagline';
  protected $taglinesDataType = 'array';
  protected $urlsType = 'Google_Service_People_Url';
  protected $urlsDataType = 'array';

  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
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
  public function setAgeRanges($ageRanges)
  {
    $this->ageRanges = $ageRanges;
  }
  public function getAgeRanges()
  {
    return $this->ageRanges;
  }
  public function setBiographies($biographies)
  {
    $this->biographies = $biographies;
  }
  public function getBiographies()
  {
    return $this->biographies;
  }
  public function setBirthdays($birthdays)
  {
    $this->birthdays = $birthdays;
  }
  public function getBirthdays()
  {
    return $this->birthdays;
  }
  public function setBraggingRights($braggingRights)
  {
    $this->braggingRights = $braggingRights;
  }
  public function getBraggingRights()
  {
    return $this->braggingRights;
  }
  public function setCoverPhotos($coverPhotos)
  {
    $this->coverPhotos = $coverPhotos;
  }
  public function getCoverPhotos()
  {
    return $this->coverPhotos;
  }
  public function setEmailAddresses($emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
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
  public function setEvents($events)
  {
    $this->events = $events;
  }
  public function getEvents()
  {
    return $this->events;
  }
  public function setGenders($genders)
  {
    $this->genders = $genders;
  }
  public function getGenders()
  {
    return $this->genders;
  }
  public function setImClients($imClients)
  {
    $this->imClients = $imClients;
  }
  public function getImClients()
  {
    return $this->imClients;
  }
  public function setInterests($interests)
  {
    $this->interests = $interests;
  }
  public function getInterests()
  {
    return $this->interests;
  }
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  public function getLocales()
  {
    return $this->locales;
  }
  public function setMemberships($memberships)
  {
    $this->memberships = $memberships;
  }
  public function getMemberships()
  {
    return $this->memberships;
  }
  public function setMetadata(Google_Service_People_PersonMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNames($names)
  {
    $this->names = $names;
  }
  public function getNames()
  {
    return $this->names;
  }
  public function setNicknames($nicknames)
  {
    $this->nicknames = $nicknames;
  }
  public function getNicknames()
  {
    return $this->nicknames;
  }
  public function setOccupations($occupations)
  {
    $this->occupations = $occupations;
  }
  public function getOccupations()
  {
    return $this->occupations;
  }
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  public function getOrganizations()
  {
    return $this->organizations;
  }
  public function setPhoneNumbers($phoneNumbers)
  {
    $this->phoneNumbers = $phoneNumbers;
  }
  public function getPhoneNumbers()
  {
    return $this->phoneNumbers;
  }
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  public function getPhotos()
  {
    return $this->photos;
  }
  public function setRelations($relations)
  {
    $this->relations = $relations;
  }
  public function getRelations()
  {
    return $this->relations;
  }
  public function setRelationshipInterests($relationshipInterests)
  {
    $this->relationshipInterests = $relationshipInterests;
  }
  public function getRelationshipInterests()
  {
    return $this->relationshipInterests;
  }
  public function setRelationshipStatuses($relationshipStatuses)
  {
    $this->relationshipStatuses = $relationshipStatuses;
  }
  public function getRelationshipStatuses()
  {
    return $this->relationshipStatuses;
  }
  public function setResidences($residences)
  {
    $this->residences = $residences;
  }
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
  public function setSkills($skills)
  {
    $this->skills = $skills;
  }
  public function getSkills()
  {
    return $this->skills;
  }
  public function setTaglines($taglines)
  {
    $this->taglines = $taglines;
  }
  public function getTaglines()
  {
    return $this->taglines;
  }
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  public function getUrls()
  {
    return $this->urls;
  }
}
