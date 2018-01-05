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

class Google_Service_Dataflow_SourceOperationResponse extends Google_Model
{
  protected $getMetadataType = 'Google_Service_Dataflow_SourceGetMetadataResponse';
  protected $getMetadataDataType = '';
  protected $splitType = 'Google_Service_Dataflow_SourceSplitResponse';
  protected $splitDataType = '';

  /**
   * @param Google_Service_Dataflow_SourceGetMetadataResponse
   */
  public function setGetMetadata(Google_Service_Dataflow_SourceGetMetadataResponse $getMetadata)
  {
    $this->getMetadata = $getMetadata;
  }
  /**
   * @return Google_Service_Dataflow_SourceGetMetadataResponse
   */
  public function getGetMetadata()
  {
    return $this->getMetadata;
  }
  /**
   * @param Google_Service_Dataflow_SourceSplitResponse
   */
  public function setSplit(Google_Service_Dataflow_SourceSplitResponse $split)
  {
    $this->split = $split;
  }
  /**
   * @return Google_Service_Dataflow_SourceSplitResponse
   */
  public function getSplit()
  {
    return $this->split;
  }
}
