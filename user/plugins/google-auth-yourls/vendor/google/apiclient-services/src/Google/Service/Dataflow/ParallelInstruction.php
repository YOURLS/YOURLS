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

class Google_Service_Dataflow_ParallelInstruction extends Google_Collection
{
  protected $collection_key = 'outputs';
  protected $flattenType = 'Google_Service_Dataflow_FlattenInstruction';
  protected $flattenDataType = '';
  public $name;
  public $originalName;
  protected $outputsType = 'Google_Service_Dataflow_InstructionOutput';
  protected $outputsDataType = 'array';
  protected $parDoType = 'Google_Service_Dataflow_ParDoInstruction';
  protected $parDoDataType = '';
  protected $partialGroupByKeyType = 'Google_Service_Dataflow_PartialGroupByKeyInstruction';
  protected $partialGroupByKeyDataType = '';
  protected $readType = 'Google_Service_Dataflow_ReadInstruction';
  protected $readDataType = '';
  public $systemName;
  protected $writeType = 'Google_Service_Dataflow_WriteInstruction';
  protected $writeDataType = '';

  /**
   * @param Google_Service_Dataflow_FlattenInstruction
   */
  public function setFlatten(Google_Service_Dataflow_FlattenInstruction $flatten)
  {
    $this->flatten = $flatten;
  }
  /**
   * @return Google_Service_Dataflow_FlattenInstruction
   */
  public function getFlatten()
  {
    return $this->flatten;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  public function getOriginalName()
  {
    return $this->originalName;
  }
  /**
   * @param Google_Service_Dataflow_InstructionOutput
   */
  public function setOutputs($outputs)
  {
    $this->outputs = $outputs;
  }
  /**
   * @return Google_Service_Dataflow_InstructionOutput
   */
  public function getOutputs()
  {
    return $this->outputs;
  }
  /**
   * @param Google_Service_Dataflow_ParDoInstruction
   */
  public function setParDo(Google_Service_Dataflow_ParDoInstruction $parDo)
  {
    $this->parDo = $parDo;
  }
  /**
   * @return Google_Service_Dataflow_ParDoInstruction
   */
  public function getParDo()
  {
    return $this->parDo;
  }
  /**
   * @param Google_Service_Dataflow_PartialGroupByKeyInstruction
   */
  public function setPartialGroupByKey(Google_Service_Dataflow_PartialGroupByKeyInstruction $partialGroupByKey)
  {
    $this->partialGroupByKey = $partialGroupByKey;
  }
  /**
   * @return Google_Service_Dataflow_PartialGroupByKeyInstruction
   */
  public function getPartialGroupByKey()
  {
    return $this->partialGroupByKey;
  }
  /**
   * @param Google_Service_Dataflow_ReadInstruction
   */
  public function setRead(Google_Service_Dataflow_ReadInstruction $read)
  {
    $this->read = $read;
  }
  /**
   * @return Google_Service_Dataflow_ReadInstruction
   */
  public function getRead()
  {
    return $this->read;
  }
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  public function getSystemName()
  {
    return $this->systemName;
  }
  /**
   * @param Google_Service_Dataflow_WriteInstruction
   */
  public function setWrite(Google_Service_Dataflow_WriteInstruction $write)
  {
    $this->write = $write;
  }
  /**
   * @return Google_Service_Dataflow_WriteInstruction
   */
  public function getWrite()
  {
    return $this->write;
  }
}
