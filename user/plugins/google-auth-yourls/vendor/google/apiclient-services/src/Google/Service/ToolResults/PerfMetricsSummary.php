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

class Google_Service_ToolResults_PerfMetricsSummary extends Google_Collection
{
  protected $collection_key = 'perfMetrics';
  protected $appStartTimeType = 'Google_Service_ToolResults_AppStartTime';
  protected $appStartTimeDataType = '';
  public $executionId;
  protected $graphicsStatsType = 'Google_Service_ToolResults_GraphicsStats';
  protected $graphicsStatsDataType = '';
  public $historyId;
  protected $perfEnvironmentType = 'Google_Service_ToolResults_PerfEnvironment';
  protected $perfEnvironmentDataType = '';
  public $perfMetrics;
  public $projectId;
  public $stepId;

  /**
   * @param Google_Service_ToolResults_AppStartTime
   */
  public function setAppStartTime(Google_Service_ToolResults_AppStartTime $appStartTime)
  {
    $this->appStartTime = $appStartTime;
  }
  /**
   * @return Google_Service_ToolResults_AppStartTime
   */
  public function getAppStartTime()
  {
    return $this->appStartTime;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
  }
  /**
   * @param Google_Service_ToolResults_GraphicsStats
   */
  public function setGraphicsStats(Google_Service_ToolResults_GraphicsStats $graphicsStats)
  {
    $this->graphicsStats = $graphicsStats;
  }
  /**
   * @return Google_Service_ToolResults_GraphicsStats
   */
  public function getGraphicsStats()
  {
    return $this->graphicsStats;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  /**
   * @param Google_Service_ToolResults_PerfEnvironment
   */
  public function setPerfEnvironment(Google_Service_ToolResults_PerfEnvironment $perfEnvironment)
  {
    $this->perfEnvironment = $perfEnvironment;
  }
  /**
   * @return Google_Service_ToolResults_PerfEnvironment
   */
  public function getPerfEnvironment()
  {
    return $this->perfEnvironment;
  }
  public function setPerfMetrics($perfMetrics)
  {
    $this->perfMetrics = $perfMetrics;
  }
  public function getPerfMetrics()
  {
    return $this->perfMetrics;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
}
