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

class Google_Service_Dataflow_StreamLocation extends Google_Model
{
  protected $customSourceLocationType = 'Google_Service_Dataflow_CustomSourceLocation';
  protected $customSourceLocationDataType = '';
  protected $pubsubLocationType = 'Google_Service_Dataflow_PubsubLocation';
  protected $pubsubLocationDataType = '';
  protected $sideInputLocationType = 'Google_Service_Dataflow_StreamingSideInputLocation';
  protected $sideInputLocationDataType = '';
  protected $streamingStageLocationType = 'Google_Service_Dataflow_StreamingStageLocation';
  protected $streamingStageLocationDataType = '';

  /**
   * @param Google_Service_Dataflow_CustomSourceLocation
   */
  public function setCustomSourceLocation(Google_Service_Dataflow_CustomSourceLocation $customSourceLocation)
  {
    $this->customSourceLocation = $customSourceLocation;
  }
  /**
   * @return Google_Service_Dataflow_CustomSourceLocation
   */
  public function getCustomSourceLocation()
  {
    return $this->customSourceLocation;
  }
  /**
   * @param Google_Service_Dataflow_PubsubLocation
   */
  public function setPubsubLocation(Google_Service_Dataflow_PubsubLocation $pubsubLocation)
  {
    $this->pubsubLocation = $pubsubLocation;
  }
  /**
   * @return Google_Service_Dataflow_PubsubLocation
   */
  public function getPubsubLocation()
  {
    return $this->pubsubLocation;
  }
  /**
   * @param Google_Service_Dataflow_StreamingSideInputLocation
   */
  public function setSideInputLocation(Google_Service_Dataflow_StreamingSideInputLocation $sideInputLocation)
  {
    $this->sideInputLocation = $sideInputLocation;
  }
  /**
   * @return Google_Service_Dataflow_StreamingSideInputLocation
   */
  public function getSideInputLocation()
  {
    return $this->sideInputLocation;
  }
  /**
   * @param Google_Service_Dataflow_StreamingStageLocation
   */
  public function setStreamingStageLocation(Google_Service_Dataflow_StreamingStageLocation $streamingStageLocation)
  {
    $this->streamingStageLocation = $streamingStageLocation;
  }
  /**
   * @return Google_Service_Dataflow_StreamingStageLocation
   */
  public function getStreamingStageLocation()
  {
    return $this->streamingStageLocation;
  }
}
