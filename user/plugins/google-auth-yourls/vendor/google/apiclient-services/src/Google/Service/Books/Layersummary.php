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

class Google_Service_Books_Layersummary extends Google_Collection
{
  protected $collection_key = 'annotationTypes';
  public $annotationCount;
  public $annotationTypes;
  public $annotationsDataLink;
  public $annotationsLink;
  public $contentVersion;
  public $dataCount;
  public $id;
  public $kind;
  public $layerId;
  public $selfLink;
  public $updated;
  public $volumeAnnotationsVersion;
  public $volumeId;

  public function setAnnotationCount($annotationCount)
  {
    $this->annotationCount = $annotationCount;
  }
  public function getAnnotationCount()
  {
    return $this->annotationCount;
  }
  public function setAnnotationTypes($annotationTypes)
  {
    $this->annotationTypes = $annotationTypes;
  }
  public function getAnnotationTypes()
  {
    return $this->annotationTypes;
  }
  public function setAnnotationsDataLink($annotationsDataLink)
  {
    $this->annotationsDataLink = $annotationsDataLink;
  }
  public function getAnnotationsDataLink()
  {
    return $this->annotationsDataLink;
  }
  public function setAnnotationsLink($annotationsLink)
  {
    $this->annotationsLink = $annotationsLink;
  }
  public function getAnnotationsLink()
  {
    return $this->annotationsLink;
  }
  public function setContentVersion($contentVersion)
  {
    $this->contentVersion = $contentVersion;
  }
  public function getContentVersion()
  {
    return $this->contentVersion;
  }
  public function setDataCount($dataCount)
  {
    $this->dataCount = $dataCount;
  }
  public function getDataCount()
  {
    return $this->dataCount;
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
  public function setLayerId($layerId)
  {
    $this->layerId = $layerId;
  }
  public function getLayerId()
  {
    return $this->layerId;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setVolumeAnnotationsVersion($volumeAnnotationsVersion)
  {
    $this->volumeAnnotationsVersion = $volumeAnnotationsVersion;
  }
  public function getVolumeAnnotationsVersion()
  {
    return $this->volumeAnnotationsVersion;
  }
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}
