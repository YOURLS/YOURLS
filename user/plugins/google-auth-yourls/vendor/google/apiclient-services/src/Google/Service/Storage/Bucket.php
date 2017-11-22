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

class Google_Service_Storage_Bucket extends Google_Collection
{
  protected $collection_key = 'defaultObjectAcl';
  protected $aclType = 'Google_Service_Storage_BucketAccessControl';
  protected $aclDataType = 'array';
  protected $billingType = 'Google_Service_Storage_BucketBilling';
  protected $billingDataType = '';
  protected $corsType = 'Google_Service_Storage_BucketCors';
  protected $corsDataType = 'array';
  protected $defaultObjectAclType = 'Google_Service_Storage_ObjectAccessControl';
  protected $defaultObjectAclDataType = 'array';
  protected $encryptionType = 'Google_Service_Storage_BucketEncryption';
  protected $encryptionDataType = '';
  public $etag;
  public $id;
  public $kind;
  public $labels;
  protected $lifecycleType = 'Google_Service_Storage_BucketLifecycle';
  protected $lifecycleDataType = '';
  public $location;
  protected $loggingType = 'Google_Service_Storage_BucketLogging';
  protected $loggingDataType = '';
  public $metageneration;
  public $name;
  protected $ownerType = 'Google_Service_Storage_BucketOwner';
  protected $ownerDataType = '';
  public $projectNumber;
  public $selfLink;
  public $storageClass;
  public $timeCreated;
  public $updated;
  protected $versioningType = 'Google_Service_Storage_BucketVersioning';
  protected $versioningDataType = '';
  protected $websiteType = 'Google_Service_Storage_BucketWebsite';
  protected $websiteDataType = '';

  /**
   * @param Google_Service_Storage_BucketAccessControl
   */
  public function setAcl($acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return Google_Service_Storage_BucketAccessControl
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param Google_Service_Storage_BucketBilling
   */
  public function setBilling(Google_Service_Storage_BucketBilling $billing)
  {
    $this->billing = $billing;
  }
  /**
   * @return Google_Service_Storage_BucketBilling
   */
  public function getBilling()
  {
    return $this->billing;
  }
  /**
   * @param Google_Service_Storage_BucketCors
   */
  public function setCors($cors)
  {
    $this->cors = $cors;
  }
  /**
   * @return Google_Service_Storage_BucketCors
   */
  public function getCors()
  {
    return $this->cors;
  }
  /**
   * @param Google_Service_Storage_ObjectAccessControl
   */
  public function setDefaultObjectAcl($defaultObjectAcl)
  {
    $this->defaultObjectAcl = $defaultObjectAcl;
  }
  /**
   * @return Google_Service_Storage_ObjectAccessControl
   */
  public function getDefaultObjectAcl()
  {
    return $this->defaultObjectAcl;
  }
  /**
   * @param Google_Service_Storage_BucketEncryption
   */
  public function setEncryption(Google_Service_Storage_BucketEncryption $encryption)
  {
    $this->encryption = $encryption;
  }
  /**
   * @return Google_Service_Storage_BucketEncryption
   */
  public function getEncryption()
  {
    return $this->encryption;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Storage_BucketLifecycle
   */
  public function setLifecycle(Google_Service_Storage_BucketLifecycle $lifecycle)
  {
    $this->lifecycle = $lifecycle;
  }
  /**
   * @return Google_Service_Storage_BucketLifecycle
   */
  public function getLifecycle()
  {
    return $this->lifecycle;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Storage_BucketLogging
   */
  public function setLogging(Google_Service_Storage_BucketLogging $logging)
  {
    $this->logging = $logging;
  }
  /**
   * @return Google_Service_Storage_BucketLogging
   */
  public function getLogging()
  {
    return $this->logging;
  }
  public function setMetageneration($metageneration)
  {
    $this->metageneration = $metageneration;
  }
  public function getMetageneration()
  {
    return $this->metageneration;
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
   * @param Google_Service_Storage_BucketOwner
   */
  public function setOwner(Google_Service_Storage_BucketOwner $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return Google_Service_Storage_BucketOwner
   */
  public function getOwner()
  {
    return $this->owner;
  }
  public function setProjectNumber($projectNumber)
  {
    $this->projectNumber = $projectNumber;
  }
  public function getProjectNumber()
  {
    return $this->projectNumber;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStorageClass($storageClass)
  {
    $this->storageClass = $storageClass;
  }
  public function getStorageClass()
  {
    return $this->storageClass;
  }
  public function setTimeCreated($timeCreated)
  {
    $this->timeCreated = $timeCreated;
  }
  public function getTimeCreated()
  {
    return $this->timeCreated;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param Google_Service_Storage_BucketVersioning
   */
  public function setVersioning(Google_Service_Storage_BucketVersioning $versioning)
  {
    $this->versioning = $versioning;
  }
  /**
   * @return Google_Service_Storage_BucketVersioning
   */
  public function getVersioning()
  {
    return $this->versioning;
  }
  /**
   * @param Google_Service_Storage_BucketWebsite
   */
  public function setWebsite(Google_Service_Storage_BucketWebsite $website)
  {
    $this->website = $website;
  }
  /**
   * @return Google_Service_Storage_BucketWebsite
   */
  public function getWebsite()
  {
    return $this->website;
  }
}
