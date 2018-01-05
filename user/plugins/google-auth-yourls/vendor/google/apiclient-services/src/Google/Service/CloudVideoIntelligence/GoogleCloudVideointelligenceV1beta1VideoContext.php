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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoContext extends Google_Collection
{
  protected $collection_key = 'segments';
  public $labelDetectionMode;
  public $labelDetectionModel;
  public $safeSearchDetectionModel;
  protected $segmentsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoSegment';
  protected $segmentsDataType = 'array';
  public $shotChangeDetectionModel;
  public $stationaryCamera;

  public function setLabelDetectionMode($labelDetectionMode)
  {
    $this->labelDetectionMode = $labelDetectionMode;
  }
  public function getLabelDetectionMode()
  {
    return $this->labelDetectionMode;
  }
  public function setLabelDetectionModel($labelDetectionModel)
  {
    $this->labelDetectionModel = $labelDetectionModel;
  }
  public function getLabelDetectionModel()
  {
    return $this->labelDetectionModel;
  }
  public function setSafeSearchDetectionModel($safeSearchDetectionModel)
  {
    $this->safeSearchDetectionModel = $safeSearchDetectionModel;
  }
  public function getSafeSearchDetectionModel()
  {
    return $this->safeSearchDetectionModel;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoSegment
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1beta1VideoSegment
   */
  public function getSegments()
  {
    return $this->segments;
  }
  public function setShotChangeDetectionModel($shotChangeDetectionModel)
  {
    $this->shotChangeDetectionModel = $shotChangeDetectionModel;
  }
  public function getShotChangeDetectionModel()
  {
    return $this->shotChangeDetectionModel;
  }
  public function setStationaryCamera($stationaryCamera)
  {
    $this->stationaryCamera = $stationaryCamera;
  }
  public function getStationaryCamera()
  {
    return $this->stationaryCamera;
  }
}
