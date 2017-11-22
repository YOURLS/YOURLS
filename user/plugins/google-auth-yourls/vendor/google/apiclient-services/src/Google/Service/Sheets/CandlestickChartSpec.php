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

class Google_Service_Sheets_CandlestickChartSpec extends Google_Collection
{
  protected $collection_key = 'data';
  protected $dataType = 'Google_Service_Sheets_CandlestickData';
  protected $dataDataType = 'array';
  protected $domainType = 'Google_Service_Sheets_CandlestickDomain';
  protected $domainDataType = '';

  /**
   * @param Google_Service_Sheets_CandlestickData
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Sheets_CandlestickData
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param Google_Service_Sheets_CandlestickDomain
   */
  public function setDomain(Google_Service_Sheets_CandlestickDomain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return Google_Service_Sheets_CandlestickDomain
   */
  public function getDomain()
  {
    return $this->domain;
  }
}
