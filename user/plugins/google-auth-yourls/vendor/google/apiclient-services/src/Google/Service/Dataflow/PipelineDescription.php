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

class Google_Service_Dataflow_PipelineDescription extends Google_Collection
{
  protected $collection_key = 'originalPipelineTransform';
  protected $displayDataType = 'Google_Service_Dataflow_DisplayData';
  protected $displayDataDataType = 'array';
  protected $executionPipelineStageType = 'Google_Service_Dataflow_ExecutionStageSummary';
  protected $executionPipelineStageDataType = 'array';
  protected $originalPipelineTransformType = 'Google_Service_Dataflow_TransformSummary';
  protected $originalPipelineTransformDataType = 'array';

  /**
   * @param Google_Service_Dataflow_DisplayData
   */
  public function setDisplayData($displayData)
  {
    $this->displayData = $displayData;
  }
  /**
   * @return Google_Service_Dataflow_DisplayData
   */
  public function getDisplayData()
  {
    return $this->displayData;
  }
  /**
   * @param Google_Service_Dataflow_ExecutionStageSummary
   */
  public function setExecutionPipelineStage($executionPipelineStage)
  {
    $this->executionPipelineStage = $executionPipelineStage;
  }
  /**
   * @return Google_Service_Dataflow_ExecutionStageSummary
   */
  public function getExecutionPipelineStage()
  {
    return $this->executionPipelineStage;
  }
  /**
   * @param Google_Service_Dataflow_TransformSummary
   */
  public function setOriginalPipelineTransform($originalPipelineTransform)
  {
    $this->originalPipelineTransform = $originalPipelineTransform;
  }
  /**
   * @return Google_Service_Dataflow_TransformSummary
   */
  public function getOriginalPipelineTransform()
  {
    return $this->originalPipelineTransform;
  }
}
