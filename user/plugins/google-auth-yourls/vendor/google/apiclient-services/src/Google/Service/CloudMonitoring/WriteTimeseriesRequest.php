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

class Google_Service_CloudMonitoring_WriteTimeseriesRequest extends Google_Collection
{
  protected $collection_key = 'timeseries';
  public $commonLabels;
  protected $timeseriesType = 'Google_Service_CloudMonitoring_TimeseriesPoint';
  protected $timeseriesDataType = 'array';

  public function setCommonLabels($commonLabels)
  {
    $this->commonLabels = $commonLabels;
  }
  public function getCommonLabels()
  {
    return $this->commonLabels;
  }
  /**
   * @param Google_Service_CloudMonitoring_TimeseriesPoint
   */
  public function setTimeseries($timeseries)
  {
    $this->timeseries = $timeseries;
  }
  /**
   * @return Google_Service_CloudMonitoring_TimeseriesPoint
   */
  public function getTimeseries()
  {
    return $this->timeseries;
  }
}
