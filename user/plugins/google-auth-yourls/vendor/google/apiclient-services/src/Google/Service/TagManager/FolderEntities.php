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

class Google_Service_TagManager_FolderEntities extends Google_Collection
{
  protected $collection_key = 'variable';
  public $nextPageToken;
  protected $tagType = 'Google_Service_TagManager_Tag';
  protected $tagDataType = 'array';
  protected $triggerType = 'Google_Service_TagManager_Trigger';
  protected $triggerDataType = 'array';
  protected $variableType = 'Google_Service_TagManager_Variable';
  protected $variableDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
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
}
