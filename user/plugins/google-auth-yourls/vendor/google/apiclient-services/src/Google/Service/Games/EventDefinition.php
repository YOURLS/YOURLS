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

class Google_Service_Games_EventDefinition extends Google_Collection
{
  protected $collection_key = 'childEvents';
  protected $childEventsType = 'Google_Service_Games_EventChild';
  protected $childEventsDataType = 'array';
  public $description;
  public $displayName;
  public $id;
  public $imageUrl;
  public $isDefaultImageUrl;
  public $kind;
  public $visibility;

  /**
   * @param Google_Service_Games_EventChild
   */
  public function setChildEvents($childEvents)
  {
    $this->childEvents = $childEvents;
  }
  /**
   * @return Google_Service_Games_EventChild
   */
  public function getChildEvents()
  {
    return $this->childEvents;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setIsDefaultImageUrl($isDefaultImageUrl)
  {
    $this->isDefaultImageUrl = $isDefaultImageUrl;
  }
  public function getIsDefaultImageUrl()
  {
    return $this->isDefaultImageUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
