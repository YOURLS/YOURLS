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

class Google_Service_Slides_CreateSlideRequest extends Google_Collection
{
  protected $collection_key = 'placeholderIdMappings';
  public $insertionIndex;
  public $objectId;
  protected $placeholderIdMappingsType = 'Google_Service_Slides_LayoutPlaceholderIdMapping';
  protected $placeholderIdMappingsDataType = 'array';
  protected $slideLayoutReferenceType = 'Google_Service_Slides_LayoutReference';
  protected $slideLayoutReferenceDataType = '';

  public function setInsertionIndex($insertionIndex)
  {
    $this->insertionIndex = $insertionIndex;
  }
  public function getInsertionIndex()
  {
    return $this->insertionIndex;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Google_Service_Slides_LayoutPlaceholderIdMapping
   */
  public function setPlaceholderIdMappings($placeholderIdMappings)
  {
    $this->placeholderIdMappings = $placeholderIdMappings;
  }
  /**
   * @return Google_Service_Slides_LayoutPlaceholderIdMapping
   */
  public function getPlaceholderIdMappings()
  {
    return $this->placeholderIdMappings;
  }
  /**
   * @param Google_Service_Slides_LayoutReference
   */
  public function setSlideLayoutReference(Google_Service_Slides_LayoutReference $slideLayoutReference)
  {
    $this->slideLayoutReference = $slideLayoutReference;
  }
  /**
   * @return Google_Service_Slides_LayoutReference
   */
  public function getSlideLayoutReference()
  {
    return $this->slideLayoutReference;
  }
}
