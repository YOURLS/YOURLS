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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1AnnotateVideoRequest extends Google_Collection
{
  protected $collection_key = 'features';
  public $features;
  public $inputContent;
  public $inputUri;
  public $locationId;
  public $outputUri;
  protected $videoContextType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoContext';
  protected $videoContextDataType = '';

  public function setFeatures($features)
  {
    $this->features = $features;
  }
  public function getFeatures()
  {
    return $this->features;
  }
  public function setInputContent($inputContent)
  {
    $this->inputContent = $inputContent;
  }
  public function getInputContent()
  {
    return $this->inputContent;
  }
  public function setInputUri($inputUri)
  {
    $this->inputUri = $inputUri;
  }
  public function getInputUri()
  {
    return $this->inputUri;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setOutputUri($outputUri)
  {
    $this->outputUri = $outputUri;
  }
  public function getOutputUri()
  {
    return $this->outputUri;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoContext
   */
  public function setVideoContext(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoContext $videoContext)
  {
    $this->videoContext = $videoContext;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoContext
   */
  public function getVideoContext()
  {
    return $this->videoContext;
  }
}
