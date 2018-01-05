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

class Google_Service_Sheets_UpdateChartSpecRequest extends Google_Model
{
  public $chartId;
  protected $specType = 'Google_Service_Sheets_ChartSpec';
  protected $specDataType = '';

  public function setChartId($chartId)
  {
    $this->chartId = $chartId;
  }
  public function getChartId()
  {
    return $this->chartId;
  }
  /**
   * @param Google_Service_Sheets_ChartSpec
   */
  public function setSpec(Google_Service_Sheets_ChartSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return Google_Service_Sheets_ChartSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
}
