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

class Google_Service_Dialogflow_IntentTrainingPhrase extends Google_Collection
{
  protected $collection_key = 'parts';
  public $name;
  protected $partsType = 'Google_Service_Dialogflow_IntentTrainingPhrasePart';
  protected $partsDataType = 'array';
  public $timesAddedCount;
  public $type;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Dialogflow_IntentTrainingPhrasePart
   */
  public function setParts($parts)
  {
    $this->parts = $parts;
  }
  /**
   * @return Google_Service_Dialogflow_IntentTrainingPhrasePart
   */
  public function getParts()
  {
    return $this->parts;
  }
  public function setTimesAddedCount($timesAddedCount)
  {
    $this->timesAddedCount = $timesAddedCount;
  }
  public function getTimesAddedCount()
  {
    return $this->timesAddedCount;
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
