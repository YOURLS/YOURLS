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

class Google_Service_Books_Volumeannotation extends Google_Collection
{
  protected $collection_key = 'pageIds';
  public $annotationDataId;
  public $annotationDataLink;
  public $annotationType;
  protected $contentRangesType = 'Google_Service_Books_VolumeannotationContentRanges';
  protected $contentRangesDataType = '';
  public $data;
  public $deleted;
  public $id;
  public $kind;
  public $layerId;
  public $pageIds;
  public $selectedText;
  public $selfLink;
  public $updated;
  public $volumeId;

  public function setAnnotationDataId($annotationDataId)
  {
    $this->annotationDataId = $annotationDataId;
  }
  public function getAnnotationDataId()
  {
    return $this->annotationDataId;
  }
  public function setAnnotationDataLink($annotationDataLink)
  {
    $this->annotationDataLink = $annotationDataLink;
  }
  public function getAnnotationDataLink()
  {
    return $this->annotationDataLink;
  }
  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param Google_Service_Books_VolumeannotationContentRanges
   */
  public function setContentRanges(Google_Service_Books_VolumeannotationContentRanges $contentRanges)
  {
    $this->contentRanges = $contentRanges;
  }
  /**
   * @return Google_Service_Books_VolumeannotationContentRanges
   */
  public function getContentRanges()
  {
    return $this->contentRanges;
  }
  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
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
  public function setPageIds($pageIds)
  {
    $this->pageIds = $pageIds;
  }
  public function getPageIds()
  {
    return $this->pageIds;
  }
  public function setSelectedText($selectedText)
  {
    $this->selectedText = $selectedText;
  }
  public function getSelectedText()
  {
    return $this->selectedText;
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
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}
