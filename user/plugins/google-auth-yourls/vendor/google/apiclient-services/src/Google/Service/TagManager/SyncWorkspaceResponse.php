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

class Google_Service_TagManager_SyncWorkspaceResponse extends Google_Collection
{
  protected $collection_key = 'mergeConflict';
  protected $mergeConflictType = 'Google_Service_TagManager_MergeConflict';
  protected $mergeConflictDataType = 'array';
  protected $syncStatusType = 'Google_Service_TagManager_SyncStatus';
  protected $syncStatusDataType = '';

  /**
   * @param Google_Service_TagManager_MergeConflict
   */
  public function setMergeConflict($mergeConflict)
  {
    $this->mergeConflict = $mergeConflict;
  }
  /**
   * @return Google_Service_TagManager_MergeConflict
   */
  public function getMergeConflict()
  {
    return $this->mergeConflict;
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
