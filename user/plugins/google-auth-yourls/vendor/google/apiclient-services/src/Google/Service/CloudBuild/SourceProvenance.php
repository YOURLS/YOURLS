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

class Google_Service_CloudBuild_SourceProvenance extends Google_Model
{
  protected $fileHashesType = 'Google_Service_CloudBuild_FileHashes';
  protected $fileHashesDataType = 'map';
  protected $resolvedRepoSourceType = 'Google_Service_CloudBuild_RepoSource';
  protected $resolvedRepoSourceDataType = '';
  protected $resolvedStorageSourceType = 'Google_Service_CloudBuild_StorageSource';
  protected $resolvedStorageSourceDataType = '';

  /**
   * @param Google_Service_CloudBuild_FileHashes
   */
  public function setFileHashes($fileHashes)
  {
    $this->fileHashes = $fileHashes;
  }
  /**
   * @return Google_Service_CloudBuild_FileHashes
   */
  public function getFileHashes()
  {
    return $this->fileHashes;
  }
  /**
   * @param Google_Service_CloudBuild_RepoSource
   */
  public function setResolvedRepoSource(Google_Service_CloudBuild_RepoSource $resolvedRepoSource)
  {
    $this->resolvedRepoSource = $resolvedRepoSource;
  }
  /**
   * @return Google_Service_CloudBuild_RepoSource
   */
  public function getResolvedRepoSource()
  {
    return $this->resolvedRepoSource;
  }
  /**
   * @param Google_Service_CloudBuild_StorageSource
   */
  public function setResolvedStorageSource(Google_Service_CloudBuild_StorageSource $resolvedStorageSource)
  {
    $this->resolvedStorageSource = $resolvedStorageSource;
  }
  /**
   * @return Google_Service_CloudBuild_StorageSource
   */
  public function getResolvedStorageSource()
  {
    return $this->resolvedStorageSource;
  }
}
