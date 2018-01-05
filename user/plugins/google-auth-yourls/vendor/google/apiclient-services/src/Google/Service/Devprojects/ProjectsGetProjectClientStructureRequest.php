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

class Google_Service_Devprojects_ProjectsGetProjectClientStructureRequest extends Google_Model
{
  protected $clientType = 'Google_Service_Devprojects_Client';
  protected $clientDataType = '';
  public $projectId;
  public $whitelistId;

  public function setClient(Google_Service_Devprojects_Client $client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setWhitelistId($whitelistId)
  {
    $this->whitelistId = $whitelistId;
  }
  public function getWhitelistId()
  {
    return $this->whitelistId;
  }
}
