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

class Google_Service_Mirror_Contact extends Google_Collection
{
  protected $collection_key = 'sharingFeatures';
  protected $acceptCommandsType = 'Google_Service_Mirror_Command';
  protected $acceptCommandsDataType = 'array';
  public $acceptTypes;
  public $displayName;
  public $id;
  public $imageUrls;
  public $kind;
  public $phoneNumber;
  public $priority;
  public $sharingFeatures;
  public $source;
  public $speakableName;
  public $type;

  /**
   * @param Google_Service_Mirror_Command
   */
  public function setAcceptCommands($acceptCommands)
  {
    $this->acceptCommands = $acceptCommands;
  }
  /**
   * @return Google_Service_Mirror_Command
   */
  public function getAcceptCommands()
  {
    return $this->acceptCommands;
  }
  public function setAcceptTypes($acceptTypes)
  {
    $this->acceptTypes = $acceptTypes;
  }
  public function getAcceptTypes()
  {
    return $this->acceptTypes;
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
  public function setImageUrls($imageUrls)
  {
    $this->imageUrls = $imageUrls;
  }
  public function getImageUrls()
  {
    return $this->imageUrls;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setSharingFeatures($sharingFeatures)
  {
    $this->sharingFeatures = $sharingFeatures;
  }
  public function getSharingFeatures()
  {
    return $this->sharingFeatures;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setSpeakableName($speakableName)
  {
    $this->speakableName = $speakableName;
  }
  public function getSpeakableName()
  {
    return $this->speakableName;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
