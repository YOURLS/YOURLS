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

class Google_Service_Pagespeedonline_Result extends Google_Collection
{
  protected $collection_key = 'invalidRules';
  protected $formattedResultsType = 'Google_Service_Pagespeedonline_ResultFormattedResults';
  protected $formattedResultsDataType = '';
  public $id;
  public $invalidRules;
  public $kind;
  protected $pageStatsType = 'Google_Service_Pagespeedonline_ResultPageStats';
  protected $pageStatsDataType = '';
  public $responseCode;
  protected $ruleGroupsType = 'Google_Service_Pagespeedonline_ResultRuleGroupsElement';
  protected $ruleGroupsDataType = 'map';
  protected $screenshotType = 'Google_Service_Pagespeedonline_PagespeedApiImageV2';
  protected $screenshotDataType = '';
  public $title;
  protected $versionType = 'Google_Service_Pagespeedonline_ResultVersion';
  protected $versionDataType = '';

  /**
   * @param Google_Service_Pagespeedonline_ResultFormattedResults
   */
  public function setFormattedResults(Google_Service_Pagespeedonline_ResultFormattedResults $formattedResults)
  {
    $this->formattedResults = $formattedResults;
  }
  /**
   * @return Google_Service_Pagespeedonline_ResultFormattedResults
   */
  public function getFormattedResults()
  {
    return $this->formattedResults;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInvalidRules($invalidRules)
  {
    $this->invalidRules = $invalidRules;
  }
  public function getInvalidRules()
  {
    return $this->invalidRules;
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
   * @param Google_Service_Pagespeedonline_ResultPageStats
   */
  public function setPageStats(Google_Service_Pagespeedonline_ResultPageStats $pageStats)
  {
    $this->pageStats = $pageStats;
  }
  /**
   * @return Google_Service_Pagespeedonline_ResultPageStats
   */
  public function getPageStats()
  {
    return $this->pageStats;
  }
  public function setResponseCode($responseCode)
  {
    $this->responseCode = $responseCode;
  }
  public function getResponseCode()
  {
    return $this->responseCode;
  }
  /**
   * @param Google_Service_Pagespeedonline_ResultRuleGroupsElement
   */
  public function setRuleGroups($ruleGroups)
  {
    $this->ruleGroups = $ruleGroups;
  }
  /**
   * @return Google_Service_Pagespeedonline_ResultRuleGroupsElement
   */
  public function getRuleGroups()
  {
    return $this->ruleGroups;
  }
  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiImageV2
   */
  public function setScreenshot(Google_Service_Pagespeedonline_PagespeedApiImageV2 $screenshot)
  {
    $this->screenshot = $screenshot;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiImageV2
   */
  public function getScreenshot()
  {
    return $this->screenshot;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_Pagespeedonline_ResultVersion
   */
  public function setVersion(Google_Service_Pagespeedonline_ResultVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_Pagespeedonline_ResultVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}
