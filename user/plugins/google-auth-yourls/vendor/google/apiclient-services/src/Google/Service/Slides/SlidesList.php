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

class Google_Service_Slides_SlidesList extends Google_Model
{
  public $listId;
  protected $nestingLevelType = 'Google_Service_Slides_NestingLevel';
  protected $nestingLevelDataType = 'map';

  public function setListId($listId)
  {
    $this->listId = $listId;
  }
  public function getListId()
  {
    return $this->listId;
  }
  /**
   * @param Google_Service_Slides_NestingLevel
   */
  public function setNestingLevel($nestingLevel)
  {
    $this->nestingLevel = $nestingLevel;
  }
  /**
   * @return Google_Service_Slides_NestingLevel
   */
  public function getNestingLevel()
  {
    return $this->nestingLevel;
  }
}
