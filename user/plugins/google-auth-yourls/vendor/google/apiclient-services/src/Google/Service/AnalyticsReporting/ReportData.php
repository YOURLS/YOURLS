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

class Google_Service_AnalyticsReporting_ReportData extends Google_Collection
{
  protected $collection_key = 'totals';
  public $dataLastRefreshed;
  public $isDataGolden;
  protected $maximumsType = 'Google_Service_AnalyticsReporting_DateRangeValues';
  protected $maximumsDataType = 'array';
  protected $minimumsType = 'Google_Service_AnalyticsReporting_DateRangeValues';
  protected $minimumsDataType = 'array';
  public $rowCount;
  protected $rowsType = 'Google_Service_AnalyticsReporting_ReportRow';
  protected $rowsDataType = 'array';
  public $samplesReadCounts;
  public $samplingSpaceSizes;
  protected $totalsType = 'Google_Service_AnalyticsReporting_DateRangeValues';
  protected $totalsDataType = 'array';

  public function setDataLastRefreshed($dataLastRefreshed)
  {
    $this->dataLastRefreshed = $dataLastRefreshed;
  }
  public function getDataLastRefreshed()
  {
    return $this->dataLastRefreshed;
  }
  public function setIsDataGolden($isDataGolden)
  {
    $this->isDataGolden = $isDataGolden;
  }
  public function getIsDataGolden()
  {
    return $this->isDataGolden;
  }
  /**
   * @param Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function setMaximums($maximums)
  {
    $this->maximums = $maximums;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function getMaximums()
  {
    return $this->maximums;
  }
  /**
   * @param Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function setMinimums($minimums)
  {
    $this->minimums = $minimums;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function getMinimums()
  {
    return $this->minimums;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param Google_Service_AnalyticsReporting_ReportRow
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Google_Service_AnalyticsReporting_ReportRow
   */
  public function getRows()
  {
    return $this->rows;
  }
  public function setSamplesReadCounts($samplesReadCounts)
  {
    $this->samplesReadCounts = $samplesReadCounts;
  }
  public function getSamplesReadCounts()
  {
    return $this->samplesReadCounts;
  }
  public function setSamplingSpaceSizes($samplingSpaceSizes)
  {
    $this->samplingSpaceSizes = $samplingSpaceSizes;
  }
  public function getSamplingSpaceSizes()
  {
    return $this->samplingSpaceSizes;
  }
  /**
   * @param Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function setTotals($totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function getTotals()
  {
    return $this->totals;
  }
}
