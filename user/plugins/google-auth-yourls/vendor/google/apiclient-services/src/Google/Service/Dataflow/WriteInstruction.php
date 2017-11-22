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

class Google_Service_Dataflow_WriteInstruction extends Google_Model
{
  protected $inputType = 'Google_Service_Dataflow_InstructionInput';
  protected $inputDataType = '';
  protected $sinkType = 'Google_Service_Dataflow_Sink';
  protected $sinkDataType = '';

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
  /**
   * @param Google_Service_Dataflow_Sink
   */
  public function setSink(Google_Service_Dataflow_Sink $sink)
  {
    $this->sink = $sink;
  }
  /**
   * @return Google_Service_Dataflow_Sink
   */
  public function getSink()
  {
    return $this->sink;
  }
}
