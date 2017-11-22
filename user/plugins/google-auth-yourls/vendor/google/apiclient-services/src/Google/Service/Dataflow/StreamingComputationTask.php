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

class Google_Service_Dataflow_StreamingComputationTask extends Google_Collection
{
  protected $collection_key = 'dataDisks';
  protected $computationRangesType = 'Google_Service_Dataflow_StreamingComputationRanges';
  protected $computationRangesDataType = 'array';
  protected $dataDisksType = 'Google_Service_Dataflow_MountedDataDisk';
  protected $dataDisksDataType = 'array';
  public $taskType;

  /**
   * @param Google_Service_Dataflow_StreamingComputationRanges
   */
  public function setComputationRanges($computationRanges)
  {
    $this->computationRanges = $computationRanges;
  }
  /**
   * @return Google_Service_Dataflow_StreamingComputationRanges
   */
  public function getComputationRanges()
  {
    return $this->computationRanges;
  }
  /**
   * @param Google_Service_Dataflow_MountedDataDisk
   */
  public function setDataDisks($dataDisks)
  {
    $this->dataDisks = $dataDisks;
  }
  /**
   * @return Google_Service_Dataflow_MountedDataDisk
   */
  public function getDataDisks()
  {
    return $this->dataDisks;
  }
  public function setTaskType($taskType)
  {
    $this->taskType = $taskType;
  }
  public function getTaskType()
  {
    return $this->taskType;
  }
}
