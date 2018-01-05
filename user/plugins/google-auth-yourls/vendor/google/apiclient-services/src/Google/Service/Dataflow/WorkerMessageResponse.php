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

class Google_Service_Dataflow_WorkerMessageResponse extends Google_Model
{
  protected $workerHealthReportResponseType = 'Google_Service_Dataflow_WorkerHealthReportResponse';
  protected $workerHealthReportResponseDataType = '';
  protected $workerMetricsResponseType = 'Google_Service_Dataflow_ResourceUtilizationReportResponse';
  protected $workerMetricsResponseDataType = '';
  protected $workerShutdownNoticeResponseType = 'Google_Service_Dataflow_WorkerShutdownNoticeResponse';
  protected $workerShutdownNoticeResponseDataType = '';

  /**
   * @param Google_Service_Dataflow_WorkerHealthReportResponse
   */
  public function setWorkerHealthReportResponse(Google_Service_Dataflow_WorkerHealthReportResponse $workerHealthReportResponse)
  {
    $this->workerHealthReportResponse = $workerHealthReportResponse;
  }
  /**
   * @return Google_Service_Dataflow_WorkerHealthReportResponse
   */
  public function getWorkerHealthReportResponse()
  {
    return $this->workerHealthReportResponse;
  }
  /**
   * @param Google_Service_Dataflow_ResourceUtilizationReportResponse
   */
  public function setWorkerMetricsResponse(Google_Service_Dataflow_ResourceUtilizationReportResponse $workerMetricsResponse)
  {
    $this->workerMetricsResponse = $workerMetricsResponse;
  }
  /**
   * @return Google_Service_Dataflow_ResourceUtilizationReportResponse
   */
  public function getWorkerMetricsResponse()
  {
    return $this->workerMetricsResponse;
  }
  /**
   * @param Google_Service_Dataflow_WorkerShutdownNoticeResponse
   */
  public function setWorkerShutdownNoticeResponse(Google_Service_Dataflow_WorkerShutdownNoticeResponse $workerShutdownNoticeResponse)
  {
    $this->workerShutdownNoticeResponse = $workerShutdownNoticeResponse;
  }
  /**
   * @return Google_Service_Dataflow_WorkerShutdownNoticeResponse
   */
  public function getWorkerShutdownNoticeResponse()
  {
    return $this->workerShutdownNoticeResponse;
  }
}
