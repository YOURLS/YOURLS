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

class Google_Service_CloudBuild_Source extends Google_Model
{
  protected $repoSourceType = 'Google_Service_CloudBuild_RepoSource';
  protected $repoSourceDataType = '';
  protected $storageSourceType = 'Google_Service_CloudBuild_StorageSource';
  protected $storageSourceDataType = '';

  /**
   * @param Google_Service_CloudBuild_RepoSource
   */
  public function setRepoSource(Google_Service_CloudBuild_RepoSource $repoSource)
  {
    $this->repoSource = $repoSource;
  }
  /**
   * @return Google_Service_CloudBuild_RepoSource
   */
  public function getRepoSource()
  {
    return $this->repoSource;
  }
  /**
   * @param Google_Service_CloudBuild_StorageSource
   */
  public function setStorageSource(Google_Service_CloudBuild_StorageSource $storageSource)
  {
    $this->storageSource = $storageSource;
  }
  /**
   * @return Google_Service_CloudBuild_StorageSource
   */
  public function getStorageSource()
  {
    return $this->storageSource;
  }
}
