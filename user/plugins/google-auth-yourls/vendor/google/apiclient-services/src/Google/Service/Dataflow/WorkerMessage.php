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

class Google_Service_Dataflow_WorkerMessage extends Google_Model
{
  public $labels;
  public $time;
  protected $workerHealthReportType = 'Google_Service_Dataflow_WorkerHealthReport';
  protected $workerHealthReportDataType = '';
  protected $workerMessageCodeType = 'Google_Service_Dataflow_WorkerMessageCode';
  protected $workerMessageCodeDataType = '';
  protected $workerMetricsType = 'Google_Service_Dataflow_ResourceUtilizationReport';
  protected $workerMetricsDataType = '';
  protected $workerShutdownNoticeType = 'Google_Service_Dataflow_WorkerShutdownNotice';
  protected $workerShutdownNoticeDataType = '';

  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param Google_Service_Dataflow_WorkerHealthReport
   */
  public function setWorkerHealthReport(Google_Service_Dataflow_WorkerHealthReport $workerHealthReport)
  {
    $this->workerHealthReport = $workerHealthReport;
  }
  /**
   * @return Google_Service_Dataflow_WorkerHealthReport
   */
  public function getWorkerHealthReport()
  {
    return $this->workerHealthReport;
  }
  /**
   * @param Google_Service_Dataflow_WorkerMessageCode
   */
  public function setWorkerMessageCode(Google_Service_Dataflow_WorkerMessageCode $workerMessageCode)
  {
    $this->workerMessageCode = $workerMessageCode;
  }
  /**
   * @return Google_Service_Dataflow_WorkerMessageCode
   */
  public function getWorkerMessageCode()
  {
    return $this->workerMessageCode;
  }
  /**
   * @param Google_Service_Dataflow_ResourceUtilizationReport
   */
  public function setWorkerMetrics(Google_Service_Dataflow_ResourceUtilizationReport $workerMetrics)
  {
    $this->workerMetrics = $workerMetrics;
  }
  /**
   * @return Google_Service_Dataflow_ResourceUtilizationReport
   */
  public function getWorkerMetrics()
  {
    return $this->workerMetrics;
  }
  /**
   * @param Google_Service_Dataflow_WorkerShutdownNotice
   */
  public function setWorkerShutdownNotice(Google_Service_Dataflow_WorkerShutdownNotice $workerShutdownNotice)
  {
    $this->workerShutdownNotice = $workerShutdownNotice;
  }
  /**
   * @return Google_Service_Dataflow_WorkerShutdownNotice
   */
  public function getWorkerShutdownNotice()
  {
    return $this->workerShutdownNotice;
  }
}
