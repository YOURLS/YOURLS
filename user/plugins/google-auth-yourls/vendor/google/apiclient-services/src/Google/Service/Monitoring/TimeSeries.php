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

class Google_Service_Monitoring_TimeSeries extends Google_Collection
{
  protected $collection_key = 'points';
  protected $metricType = 'Google_Service_Monitoring_Metric';
  protected $metricDataType = '';
  public $metricKind;
  protected $pointsType = 'Google_Service_Monitoring_Point';
  protected $pointsDataType = 'array';
  protected $resourceType = 'Google_Service_Monitoring_MonitoredResource';
  protected $resourceDataType = '';
  public $valueType;

  /**
   * @param Google_Service_Monitoring_Metric
   */
  public function setMetric(Google_Service_Monitoring_Metric $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return Google_Service_Monitoring_Metric
   */
  public function getMetric()
  {
    return $this->metric;
  }
  public function setMetricKind($metricKind)
  {
    $this->metricKind = $metricKind;
  }
  public function getMetricKind()
  {
    return $this->metricKind;
  }
  /**
   * @param Google_Service_Monitoring_Point
   */
  public function setPoints($points)
  {
    $this->points = $points;
  }
  /**
   * @return Google_Service_Monitoring_Point
   */
  public function getPoints()
  {
    return $this->points;
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
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
  }
}
