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

class Google_Service_ServiceManagement_GenerateConfigReportResponse extends Google_Collection
{
  protected $collection_key = 'diagnostics';
  protected $changeReportsType = 'Google_Service_ServiceManagement_ChangeReport';
  protected $changeReportsDataType = 'array';
  protected $diagnosticsType = 'Google_Service_ServiceManagement_Diagnostic';
  protected $diagnosticsDataType = 'array';
  public $id;
  public $serviceName;

  /**
   * @param Google_Service_ServiceManagement_ChangeReport
   */
  public function setChangeReports($changeReports)
  {
    $this->changeReports = $changeReports;
  }
  /**
   * @return Google_Service_ServiceManagement_ChangeReport
   */
  public function getChangeReports()
  {
    return $this->changeReports;
  }
  /**
   * @param Google_Service_ServiceManagement_Diagnostic
   */
  public function setDiagnostics($diagnostics)
  {
    $this->diagnostics = $diagnostics;
  }
  /**
   * @return Google_Service_ServiceManagement_Diagnostic
   */
  public function getDiagnostics()
  {
    return $this->diagnostics;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
}
