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

class Google_Service_Sheets_BasicChartSeries extends Google_Model
{
  protected $seriesType = 'Google_Service_Sheets_ChartData';
  protected $seriesDataType = '';
  public $targetAxis;
  public $type;

  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setSeries(Google_Service_Sheets_ChartData $series)
  {
    $this->series = $series;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getSeries()
  {
    return $this->series;
  }
  public function setTargetAxis($targetAxis)
  {
    $this->targetAxis = $targetAxis;
  }
  public function getTargetAxis()
  {
    return $this->targetAxis;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
