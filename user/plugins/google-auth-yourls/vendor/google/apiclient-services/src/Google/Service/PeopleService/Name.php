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

class Google_Service_PeopleService_Name extends Google_Model
{
  public $displayName;
  public $displayNameLastFirst;
  public $familyName;
  public $givenName;
  public $honorificPrefix;
  public $honorificSuffix;
  protected $metadataType = 'Google_Service_PeopleService_FieldMetadata';
  protected $metadataDataType = '';
  public $middleName;
  public $phoneticFamilyName;
  public $phoneticFullName;
  public $phoneticGivenName;
  public $phoneticHonorificPrefix;
  public $phoneticHonorificSuffix;
  public $phoneticMiddleName;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDisplayNameLastFirst($displayNameLastFirst)
  {
    $this->displayNameLastFirst = $displayNameLastFirst;
  }
  public function getDisplayNameLastFirst()
  {
    return $this->displayNameLastFirst;
  }
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  public function getFamilyName()
  {
    return $this->familyName;
  }
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  public function getGivenName()
  {
    return $this->givenName;
  }
  public function setHonorificPrefix($honorificPrefix)
  {
    $this->honorificPrefix = $honorificPrefix;
  }
  public function getHonorificPrefix()
  {
    return $this->honorificPrefix;
  }
  public function setHonorificSuffix($honorificSuffix)
  {
    $this->honorificSuffix = $honorificSuffix;
  }
  public function getHonorificSuffix()
  {
    return $this->honorificSuffix;
  }
  /**
   * @param Google_Service_PeopleService_FieldMetadata
   */
  public function setMetadata(Google_Service_PeopleService_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_PeopleService_FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setMiddleName($middleName)
  {
    $this->middleName = $middleName;
  }
  public function getMiddleName()
  {
    return $this->middleName;
  }
  public function setPhoneticFamilyName($phoneticFamilyName)
  {
    $this->phoneticFamilyName = $phoneticFamilyName;
  }
  public function getPhoneticFamilyName()
  {
    return $this->phoneticFamilyName;
  }
  public function setPhoneticFullName($phoneticFullName)
  {
    $this->phoneticFullName = $phoneticFullName;
  }
  public function getPhoneticFullName()
  {
    return $this->phoneticFullName;
  }
  public function setPhoneticGivenName($phoneticGivenName)
  {
    $this->phoneticGivenName = $phoneticGivenName;
  }
  public function getPhoneticGivenName()
  {
    return $this->phoneticGivenName;
  }
  public function setPhoneticHonorificPrefix($phoneticHonorificPrefix)
  {
    $this->phoneticHonorificPrefix = $phoneticHonorificPrefix;
  }
  public function getPhoneticHonorificPrefix()
  {
    return $this->phoneticHonorificPrefix;
  }
  public function setPhoneticHonorificSuffix($phoneticHonorificSuffix)
  {
    $this->phoneticHonorificSuffix = $phoneticHonorificSuffix;
  }
  public function getPhoneticHonorificSuffix()
  {
    return $this->phoneticHonorificSuffix;
  }
  public function setPhoneticMiddleName($phoneticMiddleName)
  {
    $this->phoneticMiddleName = $phoneticMiddleName;
  }
  public function getPhoneticMiddleName()
  {
    return $this->phoneticMiddleName;
  }
}
