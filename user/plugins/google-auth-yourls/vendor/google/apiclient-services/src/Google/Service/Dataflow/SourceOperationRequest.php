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

class Google_Service_Dataflow_SourceOperationRequest extends Google_Model
{
  protected $getMetadataType = 'Google_Service_Dataflow_SourceGetMetadataRequest';
  protected $getMetadataDataType = '';
  public $name;
  public $originalName;
  protected $splitType = 'Google_Service_Dataflow_SourceSplitRequest';
  protected $splitDataType = '';
  public $stageName;
  public $systemName;

  /**
   * @param Google_Service_Dataflow_SourceGetMetadataRequest
   */
  public function setGetMetadata(Google_Service_Dataflow_SourceGetMetadataRequest $getMetadata)
  {
    $this->getMetadata = $getMetadata;
  }
  /**
   * @return Google_Service_Dataflow_SourceGetMetadataRequest
   */
  public function getGetMetadata()
  {
    return $this->getMetadata;
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
   * @param Google_Service_Dataflow_SourceSplitRequest
   */
  public function setSplit(Google_Service_Dataflow_SourceSplitRequest $split)
  {
    $this->split = $split;
  }
  /**
   * @return Google_Service_Dataflow_SourceSplitRequest
   */
  public function getSplit()
  {
    return $this->split;
  }
  public function setStageName($stageName)
  {
    $this->stageName = $stageName;
  }
  public function getStageName()
  {
    return $this->stageName;
  }
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  public function getSystemName()
  {
    return $this->systemName;
  }
}
