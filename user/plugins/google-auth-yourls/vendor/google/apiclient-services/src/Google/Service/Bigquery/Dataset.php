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

class Google_Service_Bigquery_Dataset extends Google_Collection
{
  protected $collection_key = 'access';
  protected $accessType = 'Google_Service_Bigquery_DatasetAccess';
  protected $accessDataType = 'array';
  public $creationTime;
  protected $datasetReferenceType = 'Google_Service_Bigquery_DatasetReference';
  protected $datasetReferenceDataType = '';
  public $defaultTableExpirationMs;
  public $description;
  public $etag;
  public $friendlyName;
  public $id;
  public $kind;
  public $labels;
  public $lastModifiedTime;
  public $location;
  public $selfLink;

  /**
   * @param Google_Service_Bigquery_DatasetAccess
   */
  public function setAccess($access)
  {
    $this->access = $access;
  }
  /**
   * @return Google_Service_Bigquery_DatasetAccess
   */
  public function getAccess()
  {
    return $this->access;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param Google_Service_Bigquery_DatasetReference
   */
  public function setDatasetReference(Google_Service_Bigquery_DatasetReference $datasetReference)
  {
    $this->datasetReference = $datasetReference;
  }
  /**
   * @return Google_Service_Bigquery_DatasetReference
   */
  public function getDatasetReference()
  {
    return $this->datasetReference;
  }
  public function setDefaultTableExpirationMs($defaultTableExpirationMs)
  {
    $this->defaultTableExpirationMs = $defaultTableExpirationMs;
  }
  public function getDefaultTableExpirationMs()
  {
    return $this->defaultTableExpirationMs;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
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
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}
