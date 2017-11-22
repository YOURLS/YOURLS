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

class Google_Service_Analytics_CustomDataSource extends Google_Collection
{
  protected $collection_key = 'schema';
  public $accountId;
  protected $childLinkType = 'Google_Service_Analytics_CustomDataSourceChildLink';
  protected $childLinkDataType = '';
  public $created;
  public $description;
  public $id;
  public $importBehavior;
  public $kind;
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_CustomDataSourceParentLink';
  protected $parentLinkDataType = '';
  public $profilesLinked;
  public $schema;
  public $selfLink;
  public $type;
  public $updated;
  public $uploadType;
  public $webPropertyId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_Analytics_CustomDataSourceChildLink
   */
  public function setChildLink(Google_Service_Analytics_CustomDataSourceChildLink $childLink)
  {
    $this->childLink = $childLink;
  }
  /**
   * @return Google_Service_Analytics_CustomDataSourceChildLink
   */
  public function getChildLink()
  {
    return $this->childLink;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImportBehavior($importBehavior)
  {
    $this->importBehavior = $importBehavior;
  }
  public function getImportBehavior()
  {
    return $this->importBehavior;
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
  /**
   * @param Google_Service_Analytics_CustomDataSourceParentLink
   */
  public function setParentLink(Google_Service_Analytics_CustomDataSourceParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return Google_Service_Analytics_CustomDataSourceParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  public function setProfilesLinked($profilesLinked)
  {
    $this->profilesLinked = $profilesLinked;
  }
  public function getProfilesLinked()
  {
    return $this->profilesLinked;
  }
  public function setSchema($schema)
  {
    $this->schema = $schema;
  }
  public function getSchema()
  {
    return $this->schema;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setUploadType($uploadType)
  {
    $this->uploadType = $uploadType;
  }
  public function getUploadType()
  {
    return $this->uploadType;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}
