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

class Google_Service_Sheets_CandlestickData extends Google_Model
{
  protected $closeSeriesType = 'Google_Service_Sheets_CandlestickSeries';
  protected $closeSeriesDataType = '';
  protected $highSeriesType = 'Google_Service_Sheets_CandlestickSeries';
  protected $highSeriesDataType = '';
  protected $lowSeriesType = 'Google_Service_Sheets_CandlestickSeries';
  protected $lowSeriesDataType = '';
  protected $openSeriesType = 'Google_Service_Sheets_CandlestickSeries';
  protected $openSeriesDataType = '';

  /**
   * @param Google_Service_Sheets_CandlestickSeries
   */
  public function setCloseSeries(Google_Service_Sheets_CandlestickSeries $closeSeries)
  {
    $this->closeSeries = $closeSeries;
  }
  /**
   * @return Google_Service_Sheets_CandlestickSeries
   */
  public function getCloseSeries()
  {
    return $this->closeSeries;
  }
  /**
   * @param Google_Service_Sheets_CandlestickSeries
   */
  public function setHighSeries(Google_Service_Sheets_CandlestickSeries $highSeries)
  {
    $this->highSeries = $highSeries;
  }
  /**
   * @return Google_Service_Sheets_CandlestickSeries
   */
  public function getHighSeries()
  {
    return $this->highSeries;
  }
  /**
   * @param Google_Service_Sheets_CandlestickSeries
   */
  public function setLowSeries(Google_Service_Sheets_CandlestickSeries $lowSeries)
  {
    $this->lowSeries = $lowSeries;
  }
  /**
   * @return Google_Service_Sheets_CandlestickSeries
   */
  public function getLowSeries()
  {
    return $this->lowSeries;
  }
  /**
   * @param Google_Service_Sheets_CandlestickSeries
   */
  public function setOpenSeries(Google_Service_Sheets_CandlestickSeries $openSeries)
  {
    $this->openSeries = $openSeries;
  }
  /**
   * @return Google_Service_Sheets_CandlestickSeries
   */
  public function getOpenSeries()
  {
    return $this->openSeries;
  }
}
