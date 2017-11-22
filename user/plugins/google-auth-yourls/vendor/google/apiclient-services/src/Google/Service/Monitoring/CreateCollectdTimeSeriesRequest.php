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

class Google_Service_Monitoring_CreateCollectdTimeSeriesRequest extends Google_Collection
{
  protected $collection_key = 'collectdPayloads';
  protected $collectdPayloadsType = 'Google_Service_Monitoring_CollectdPayload';
  protected $collectdPayloadsDataType = 'array';
  public $collectdVersion;
  protected $resourceType = 'Google_Service_Monitoring_MonitoredResource';
  protected $resourceDataType = '';

  /**
   * @param Google_Service_Monitoring_CollectdPayload
   */
  public function setCollectdPayloads($collectdPayloads)
  {
    $this->collectdPayloads = $collectdPayloads;
  }
  /**
   * @return Google_Service_Monitoring_CollectdPayload
   */
  public function getCollectdPayloads()
  {
    return $this->collectdPayloads;
  }
  public function setCollectdVersion($collectdVersion)
  {
    $this->collectdVersion = $collectdVersion;
  }
  public function getCollectdVersion()
  {
    return $this->collectdVersion;
  }
  /**
   * @param Google_Service_Monitoring_MonitoredResource
   */
  public function setResource(Google_Service_Monitoring_MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_Monitoring_MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
}
