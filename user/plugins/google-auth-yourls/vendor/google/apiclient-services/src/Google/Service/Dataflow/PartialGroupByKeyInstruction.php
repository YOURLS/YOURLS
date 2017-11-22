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

class Google_Service_Dataflow_PartialGroupByKeyInstruction extends Google_Collection
{
  protected $collection_key = 'sideInputs';
  protected $inputType = 'Google_Service_Dataflow_InstructionInput';
  protected $inputDataType = '';
  public $inputElementCodec;
  public $originalCombineValuesInputStoreName;
  public $originalCombineValuesStepName;
  protected $sideInputsType = 'Google_Service_Dataflow_SideInputInfo';
  protected $sideInputsDataType = 'array';
  public $valueCombiningFn;

  /**
   * @param Google_Service_Dataflow_InstructionInput
   */
  public function setInput(Google_Service_Dataflow_InstructionInput $input)
  {
    $this->input = $input;
  }
  /**
   * @return Google_Service_Dataflow_InstructionInput
   */
  public function getInput()
  {
    return $this->input;
  }
  public function setInputElementCodec($inputElementCodec)
  {
    $this->inputElementCodec = $inputElementCodec;
  }
  public function getInputElementCodec()
  {
    return $this->inputElementCodec;
  }
  public function setOriginalCombineValuesInputStoreName($originalCombineValuesInputStoreName)
  {
    $this->originalCombineValuesInputStoreName = $originalCombineValuesInputStoreName;
  }
  public function getOriginalCombineValuesInputStoreName()
  {
    return $this->originalCombineValuesInputStoreName;
  }
  public function setOriginalCombineValuesStepName($originalCombineValuesStepName)
  {
    $this->originalCombineValuesStepName = $originalCombineValuesStepName;
  }
  public function getOriginalCombineValuesStepName()
  {
    return $this->originalCombineValuesStepName;
  }
  /**
   * @param Google_Service_Dataflow_SideInputInfo
   */
  public function setSideInputs($sideInputs)
  {
    $this->sideInputs = $sideInputs;
  }
  /**
   * @return Google_Service_Dataflow_SideInputInfo
   */
  public function getSideInputs()
  {
    return $this->sideInputs;
  }
  public function setValueCombiningFn($valueCombiningFn)
  {
    $this->valueCombiningFn = $valueCombiningFn;
  }
  public function getValueCombiningFn()
  {
    return $this->valueCombiningFn;
  }
}
