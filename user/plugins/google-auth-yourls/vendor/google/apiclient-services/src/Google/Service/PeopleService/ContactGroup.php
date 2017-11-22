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

class Google_Service_PeopleService_ContactGroup extends Google_Collection
{
  protected $collection_key = 'memberResourceNames';
  public $etag;
  public $formattedName;
  public $groupType;
  public $memberCount;
  public $memberResourceNames;
  protected $metadataType = 'Google_Service_PeopleService_ContactGroupMetadata';
  protected $metadataDataType = '';
  public $name;
  public $resourceName;

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setFormattedName($formattedName)
  {
    $this->formattedName = $formattedName;
  }
  public function getFormattedName()
  {
    return $this->formattedName;
  }
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  public function getGroupType()
  {
    return $this->groupType;
  }
  public function setMemberCount($memberCount)
  {
    $this->memberCount = $memberCount;
  }
  public function getMemberCount()
  {
    return $this->memberCount;
  }
  public function setMemberResourceNames($memberResourceNames)
  {
    $this->memberResourceNames = $memberResourceNames;
  }
  public function getMemberResourceNames()
  {
    return $this->memberResourceNames;
  }
  /**
   * @param Google_Service_PeopleService_ContactGroupMetadata
   */
  public function setMetadata(Google_Service_PeopleService_ContactGroupMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_PeopleService_ContactGroupMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
}
