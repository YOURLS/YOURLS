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

class Google_Service_Sheets_HistogramChartSpec extends Google_Collection
{
  protected $collection_key = 'series';
  public $bucketSize;
  public $legendPosition;
  public $outlierPercentile;
  protected $seriesType = 'Google_Service_Sheets_HistogramSeries';
  protected $seriesDataType = 'array';
  public $showItemDividers;

  public function setBucketSize($bucketSize)
  {
    $this->bucketSize = $bucketSize;
  }
  public function getBucketSize()
  {
    return $this->bucketSize;
  }
  public function setLegendPosition($legendPosition)
  {
    $this->legendPosition = $legendPosition;
  }
  public function getLegendPosition()
  {
    return $this->legendPosition;
  }
  public function setOutlierPercentile($outlierPercentile)
  {
    $this->outlierPercentile = $outlierPercentile;
  }
  public function getOutlierPercentile()
  {
    return $this->outlierPercentile;
  }
  /**
   * @param Google_Service_Sheets_HistogramSeries
   */
  public function setSeries($series)
  {
    $this->series = $series;
  }
  /**
   * @return Google_Service_Sheets_HistogramSeries
   */
  public function getSeries()
  {
    return $this->series;
  }
  public function setShowItemDividers($showItemDividers)
  {
    $this->showItemDividers = $showItemDividers;
  }
  public function getShowItemDividers()
  {
    return $this->showItemDividers;
  }
}
