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

class Google_Service_Reportcard_Target extends Google_Model
{
  public $documentationUrl;
  public $kind;
  public $location;
  public $monitoringUrl;
  public $note;
  public $reportUrl;
  public $type;

  public function setDocumentationUrl($documentationUrl)
  {
    $this->documentationUrl = $documentationUrl;
  }
  public function getDocumentationUrl()
  {
    return $this->documentationUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setMonitoringUrl($monitoringUrl)
  {
    $this->monitoringUrl = $monitoringUrl;
  }
  public function getMonitoringUrl()
  {
    return $this->monitoringUrl;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  public function setReportUrl($reportUrl)
  {
    $this->reportUrl = $reportUrl;
  }
  public function getReportUrl()
  {
    return $this->reportUrl;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
