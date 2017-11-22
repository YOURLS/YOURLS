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

class Google_Service_Dfareporting_CreativeRotation extends Google_Collection
{
  protected $collection_key = 'creativeAssignments';
  protected $creativeAssignmentsType = 'Google_Service_Dfareporting_CreativeAssignment';
  protected $creativeAssignmentsDataType = 'array';
  public $creativeOptimizationConfigurationId;
  public $type;
  public $weightCalculationStrategy;

  /**
   * @param Google_Service_Dfareporting_CreativeAssignment
   */
  public function setCreativeAssignments($creativeAssignments)
  {
    $this->creativeAssignments = $creativeAssignments;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeAssignment
   */
  public function getCreativeAssignments()
  {
    return $this->creativeAssignments;
  }
  public function setCreativeOptimizationConfigurationId($creativeOptimizationConfigurationId)
  {
    $this->creativeOptimizationConfigurationId = $creativeOptimizationConfigurationId;
  }
  public function getCreativeOptimizationConfigurationId()
  {
    return $this->creativeOptimizationConfigurationId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWeightCalculationStrategy($weightCalculationStrategy)
  {
    $this->weightCalculationStrategy = $weightCalculationStrategy;
  }
  public function getWeightCalculationStrategy()
  {
    return $this->weightCalculationStrategy;
  }
}
