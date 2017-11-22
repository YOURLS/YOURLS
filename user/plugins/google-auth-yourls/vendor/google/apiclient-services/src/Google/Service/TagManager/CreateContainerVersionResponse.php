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

class Google_Service_TagManager_CreateContainerVersionResponse extends Google_Model
{
  public $compilerError;
  protected $containerVersionType = 'Google_Service_TagManager_ContainerVersion';
  protected $containerVersionDataType = '';
  public $newWorkspacePath;
  protected $syncStatusType = 'Google_Service_TagManager_SyncStatus';
  protected $syncStatusDataType = '';

  public function setCompilerError($compilerError)
  {
    $this->compilerError = $compilerError;
  }
  public function getCompilerError()
  {
    return $this->compilerError;
  }
  /**
   * @param Google_Service_TagManager_ContainerVersion
   */
  public function setContainerVersion(Google_Service_TagManager_ContainerVersion $containerVersion)
  {
    $this->containerVersion = $containerVersion;
  }
  /**
   * @return Google_Service_TagManager_ContainerVersion
   */
  public function getContainerVersion()
  {
    return $this->containerVersion;
  }
  public function setNewWorkspacePath($newWorkspacePath)
  {
    $this->newWorkspacePath = $newWorkspacePath;
  }
  public function getNewWorkspacePath()
  {
    return $this->newWorkspacePath;
  }
  /**
   * @param Google_Service_TagManager_SyncStatus
   */
  public function setSyncStatus(Google_Service_TagManager_SyncStatus $syncStatus)
  {
    $this->syncStatus = $syncStatus;
  }
  /**
   * @return Google_Service_TagManager_SyncStatus
   */
  public function getSyncStatus()
  {
    return $this->syncStatus;
  }
}
