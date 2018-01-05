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

class Google_Service_Dataflow_ComputationTopology extends Google_Collection
{
  protected $collection_key = 'stateFamilies';
  public $computationId;
  protected $inputsType = 'Google_Service_Dataflow_StreamLocation';
  protected $inputsDataType = 'array';
  protected $keyRangesType = 'Google_Service_Dataflow_KeyRangeLocation';
  protected $keyRangesDataType = 'array';
  protected $outputsType = 'Google_Service_Dataflow_StreamLocation';
  protected $outputsDataType = 'array';
  protected $stateFamiliesType = 'Google_Service_Dataflow_StateFamilyConfig';
  protected $stateFamiliesDataType = 'array';
  public $systemStageName;

  public function setComputationId($computationId)
  {
    $this->computationId = $computationId;
  }
  public function getComputationId()
  {
    return $this->computationId;
  }
  /**
   * @param Google_Service_Dataflow_StreamLocation
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return Google_Service_Dataflow_StreamLocation
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  /**
   * @param Google_Service_Dataflow_KeyRangeLocation
   */
  public function setKeyRanges($keyRanges)
  {
    $this->keyRanges = $keyRanges;
  }
  /**
   * @return Google_Service_Dataflow_KeyRangeLocation
   */
  public function getKeyRanges()
  {
    return $this->keyRanges;
  }
  /**
   * @param Google_Service_Dataflow_StreamLocation
   */
  public function setOutputs($outputs)
  {
    $this->outputs = $outputs;
  }
  /**
   * @return Google_Service_Dataflow_StreamLocation
   */
  public function getOutputs()
  {
    return $this->outputs;
  }
  /**
   * @param Google_Service_Dataflow_StateFamilyConfig
   */
  public function setStateFamilies($stateFamilies)
  {
    $this->stateFamilies = $stateFamilies;
  }
  /**
   * @return Google_Service_Dataflow_StateFamilyConfig
   */
  public function getStateFamilies()
  {
    return $this->stateFamilies;
  }
  public function setSystemStageName($systemStageName)
  {
    $this->systemStageName = $systemStageName;
  }
  public function getSystemStageName()
  {
    return $this->systemStageName;
  }
}
