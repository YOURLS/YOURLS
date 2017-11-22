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

class Google_Service_Dataflow_ConcatPosition extends Google_Model
{
  public $index;
  protected $positionType = 'Google_Service_Dataflow_Position';
  protected $positionDataType = '';

  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_Dataflow_Position
   */
  public function setPosition(Google_Service_Dataflow_Position $position)
  {
    $this->position = $position;
  }
  /**
   * @return Google_Service_Dataflow_Position
   */
  public function getPosition()
  {
    return $this->position;
  }
}
