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

class Google_Service_Cloudbilling_ProjectBillingInfo extends Google_Model
{
  public $billingAccountName;
  public $billingEnabled;
  public $name;
  public $projectId;

  public function setBillingAccountName($billingAccountName)
  {
    $this->billingAccountName = $billingAccountName;
  }
  public function getBillingAccountName()
  {
    return $this->billingAccountName;
  }
  public function setBillingEnabled($billingEnabled)
  {
    $this->billingEnabled = $billingEnabled;
  }
  public function getBillingEnabled()
  {
    return $this->billingEnabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
}
