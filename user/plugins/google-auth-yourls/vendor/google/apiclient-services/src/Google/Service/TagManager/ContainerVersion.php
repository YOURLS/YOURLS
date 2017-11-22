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

class Google_Service_TagManager_ContainerVersion extends Google_Collection
{
  protected $collection_key = 'zone';
  public $accountId;
  protected $builtInVariableType = 'Google_Service_TagManager_BuiltInVariable';
  protected $builtInVariableDataType = 'array';
  protected $containerType = 'Google_Service_TagManager_Container';
  protected $containerDataType = '';
  public $containerId;
  public $containerVersionId;
  public $deleted;
  public $description;
  public $fingerprint;
  protected $folderType = 'Google_Service_TagManager_Folder';
  protected $folderDataType = 'array';
  public $name;
  public $path;
  protected $tagType = 'Google_Service_TagManager_Tag';
  protected $tagDataType = 'array';
  public $tagManagerUrl;
  protected $triggerType = 'Google_Service_TagManager_Trigger';
  protected $triggerDataType = 'array';
  protected $variableType = 'Google_Service_TagManager_Variable';
  protected $variableDataType = 'array';
  protected $zoneType = 'Google_Service_TagManager_Zone';
  protected $zoneDataType = 'array';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_TagManager_BuiltInVariable
   */
  public function setBuiltInVariable($builtInVariable)
  {
    $this->builtInVariable = $builtInVariable;
  }
  /**
   * @return Google_Service_TagManager_BuiltInVariable
   */
  public function getBuiltInVariable()
  {
    return $this->builtInVariable;
  }
  /**
   * @param Google_Service_TagManager_Container
   */
  public function setContainer(Google_Service_TagManager_Container $container)
  {
    $this->container = $container;
  }
  /**
   * @return Google_Service_TagManager_Container
   */
  public function getContainer()
  {
    return $this->container;
  }
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  public function getContainerId()
  {
    return $this->containerId;
  }
  public function setContainerVersionId($containerVersionId)
  {
    $this->containerVersionId = $containerVersionId;
  }
  public function getContainerVersionId()
  {
    return $this->containerVersionId;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Google_Service_TagManager_Folder
   */
  public function setFolder($folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return Google_Service_TagManager_Folder
   */
  public function getFolder()
  {
    return $this->folder;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Google_Service_TagManager_Tag
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return Google_Service_TagManager_Tag
   */
  public function getTag()
  {
    return $this->tag;
  }
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param Google_Service_TagManager_Trigger
   */
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return Google_Service_TagManager_Trigger
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
  /**
   * @param Google_Service_TagManager_Variable
   */
  public function setVariable($variable)
  {
    $this->variable = $variable;
  }
  /**
   * @return Google_Service_TagManager_Variable
   */
  public function getVariable()
  {
    return $this->variable;
  }
  /**
   * @param Google_Service_TagManager_Zone
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return Google_Service_TagManager_Zone
   */
  public function getZone()
  {
    return $this->zone;
  }
}
