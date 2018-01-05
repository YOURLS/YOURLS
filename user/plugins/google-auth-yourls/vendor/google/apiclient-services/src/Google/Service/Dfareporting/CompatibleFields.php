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

class Google_Service_Dfareporting_CompatibleFields extends Google_Model
{
  protected $crossDimensionReachReportCompatibleFieldsType = 'Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields';
  protected $crossDimensionReachReportCompatibleFieldsDataType = '';
  protected $floodlightReportCompatibleFieldsType = 'Google_Service_Dfareporting_FloodlightReportCompatibleFields';
  protected $floodlightReportCompatibleFieldsDataType = '';
  public $kind;
  protected $pathToConversionReportCompatibleFieldsType = 'Google_Service_Dfareporting_PathToConversionReportCompatibleFields';
  protected $pathToConversionReportCompatibleFieldsDataType = '';
  protected $reachReportCompatibleFieldsType = 'Google_Service_Dfareporting_ReachReportCompatibleFields';
  protected $reachReportCompatibleFieldsDataType = '';
  protected $reportCompatibleFieldsType = 'Google_Service_Dfareporting_ReportCompatibleFields';
  protected $reportCompatibleFieldsDataType = '';

  /**
   * @param Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields
   */
  public function setCrossDimensionReachReportCompatibleFields(Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields $crossDimensionReachReportCompatibleFields)
  {
    $this->crossDimensionReachReportCompatibleFields = $crossDimensionReachReportCompatibleFields;
  }
  /**
   * @return Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields
   */
  public function getCrossDimensionReachReportCompatibleFields()
  {
    return $this->crossDimensionReachReportCompatibleFields;
  }
  /**
   * @param Google_Service_Dfareporting_FloodlightReportCompatibleFields
   */
  public function setFloodlightReportCompatibleFields(Google_Service_Dfareporting_FloodlightReportCompatibleFields $floodlightReportCompatibleFields)
  {
    $this->floodlightReportCompatibleFields = $floodlightReportCompatibleFields;
  }
  /**
   * @return Google_Service_Dfareporting_FloodlightReportCompatibleFields
   */
  public function getFloodlightReportCompatibleFields()
  {
    return $this->floodlightReportCompatibleFields;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Dfareporting_PathToConversionReportCompatibleFields
   */
  public function setPathToConversionReportCompatibleFields(Google_Service_Dfareporting_PathToConversionReportCompatibleFields $pathToConversionReportCompatibleFields)
  {
    $this->pathToConversionReportCompatibleFields = $pathToConversionReportCompatibleFields;
  }
  /**
   * @return Google_Service_Dfareporting_PathToConversionReportCompatibleFields
   */
  public function getPathToConversionReportCompatibleFields()
  {
    return $this->pathToConversionReportCompatibleFields;
  }
  /**
   * @param Google_Service_Dfareporting_ReachReportCompatibleFields
   */
  public function setReachReportCompatibleFields(Google_Service_Dfareporting_ReachReportCompatibleFields $reachReportCompatibleFields)
  {
    $this->reachReportCompatibleFields = $reachReportCompatibleFields;
  }
  /**
   * @return Google_Service_Dfareporting_ReachReportCompatibleFields
   */
  public function getReachReportCompatibleFields()
  {
    return $this->reachReportCompatibleFields;
  }
  /**
   * @param Google_Service_Dfareporting_ReportCompatibleFields
   */
  public function setReportCompatibleFields(Google_Service_Dfareporting_ReportCompatibleFields $reportCompatibleFields)
  {
    $this->reportCompatibleFields = $reportCompatibleFields;
  }
  /**
   * @return Google_Service_Dfareporting_ReportCompatibleFields
   */
  public function getReportCompatibleFields()
  {
    return $this->reportCompatibleFields;
  }
}
