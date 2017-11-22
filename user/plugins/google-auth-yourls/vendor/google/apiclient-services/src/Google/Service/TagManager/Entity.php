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

class Google_Service_TagManager_Entity extends Google_Model
{
  public $changeStatus;
  protected $folderType = 'Google_Service_TagManager_Folder';
  protected $folderDataType = '';
  protected $tagType = 'Google_Service_TagManager_Tag';
  protected $tagDataType = '';
  protected $triggerType = 'Google_Service_TagManager_Trigger';
  protected $triggerDataType = '';
  protected $variableType = 'Google_Service_TagManager_Variable';
  protected $variableDataType = '';

  public function setChangeStatus($changeStatus)
  {
    $this->changeStatus = $changeStatus;
  }
  public function getChangeStatus()
  {
    return $this->changeStatus;
  }
  /**
   * @param Google_Service_TagManager_Folder
   */
  public function setFolder(Google_Service_TagManager_Folder $folder)
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
  /**
   * @param Google_Service_TagManager_Tag
   */
  public function setTag(Google_Service_TagManager_Tag $tag)
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
  /**
   * @param Google_Service_TagManager_Trigger
   */
  public function setTrigger(Google_Service_TagManager_Trigger $trigger)
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
  public function setVariable(Google_Service_TagManager_Variable $variable)
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
}
