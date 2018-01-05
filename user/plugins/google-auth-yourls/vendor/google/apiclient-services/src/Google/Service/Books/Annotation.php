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

class Google_Service_Books_Annotation extends Google_Collection
{
  protected $collection_key = 'pageIds';
  public $afterSelectedText;
  public $beforeSelectedText;
  protected $clientVersionRangesType = 'Google_Service_Books_AnnotationClientVersionRanges';
  protected $clientVersionRangesDataType = '';
  public $created;
  protected $currentVersionRangesType = 'Google_Service_Books_AnnotationCurrentVersionRanges';
  protected $currentVersionRangesDataType = '';
  public $data;
  public $deleted;
  public $highlightStyle;
  public $id;
  public $kind;
  public $layerId;
  protected $layerSummaryType = 'Google_Service_Books_AnnotationLayerSummary';
  protected $layerSummaryDataType = '';
  public $pageIds;
  public $selectedText;
  public $selfLink;
  public $updated;
  public $volumeId;

  public function setAfterSelectedText($afterSelectedText)
  {
    $this->afterSelectedText = $afterSelectedText;
  }
  public function getAfterSelectedText()
  {
    return $this->afterSelectedText;
  }
  public function setBeforeSelectedText($beforeSelectedText)
  {
    $this->beforeSelectedText = $beforeSelectedText;
  }
  public function getBeforeSelectedText()
  {
    return $this->beforeSelectedText;
  }
  /**
   * @param Google_Service_Books_AnnotationClientVersionRanges
   */
  public function setClientVersionRanges(Google_Service_Books_AnnotationClientVersionRanges $clientVersionRanges)
  {
    $this->clientVersionRanges = $clientVersionRanges;
  }
  /**
   * @return Google_Service_Books_AnnotationClientVersionRanges
   */
  public function getClientVersionRanges()
  {
    return $this->clientVersionRanges;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param Google_Service_Books_AnnotationCurrentVersionRanges
   */
  public function setCurrentVersionRanges(Google_Service_Books_AnnotationCurrentVersionRanges $currentVersionRanges)
  {
    $this->currentVersionRanges = $currentVersionRanges;
  }
  /**
   * @return Google_Service_Books_AnnotationCurrentVersionRanges
   */
  public function getCurrentVersionRanges()
  {
    return $this->currentVersionRanges;
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
  public function setHighlightStyle($highlightStyle)
  {
    $this->highlightStyle = $highlightStyle;
  }
  public function getHighlightStyle()
  {
    return $this->highlightStyle;
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
  /**
   * @param Google_Service_Books_AnnotationLayerSummary
   */
  public function setLayerSummary(Google_Service_Books_AnnotationLayerSummary $layerSummary)
  {
    $this->layerSummary = $layerSummary;
  }
  /**
   * @return Google_Service_Books_AnnotationLayerSummary
   */
  public function getLayerSummary()
  {
    return $this->layerSummary;
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
