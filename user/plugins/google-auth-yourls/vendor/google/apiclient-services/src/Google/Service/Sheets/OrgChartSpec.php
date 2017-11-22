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

class Google_Service_Sheets_OrgChartSpec extends Google_Model
{
  protected $labelsType = 'Google_Service_Sheets_ChartData';
  protected $labelsDataType = '';
  protected $nodeColorType = 'Google_Service_Sheets_Color';
  protected $nodeColorDataType = '';
  public $nodeSize;
  protected $parentLabelsType = 'Google_Service_Sheets_ChartData';
  protected $parentLabelsDataType = '';
  protected $selectedNodeColorType = 'Google_Service_Sheets_Color';
  protected $selectedNodeColorDataType = '';
  protected $tooltipsType = 'Google_Service_Sheets_ChartData';
  protected $tooltipsDataType = '';

  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setLabels(Google_Service_Sheets_ChartData $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setNodeColor(Google_Service_Sheets_Color $nodeColor)
  {
    $this->nodeColor = $nodeColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getNodeColor()
  {
    return $this->nodeColor;
  }
  public function setNodeSize($nodeSize)
  {
    $this->nodeSize = $nodeSize;
  }
  public function getNodeSize()
  {
    return $this->nodeSize;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setParentLabels(Google_Service_Sheets_ChartData $parentLabels)
  {
    $this->parentLabels = $parentLabels;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getParentLabels()
  {
    return $this->parentLabels;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setSelectedNodeColor(Google_Service_Sheets_Color $selectedNodeColor)
  {
    $this->selectedNodeColor = $selectedNodeColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getSelectedNodeColor()
  {
    return $this->selectedNodeColor;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setTooltips(Google_Service_Sheets_ChartData $tooltips)
  {
    $this->tooltips = $tooltips;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getTooltips()
  {
    return $this->tooltips;
  }
}
