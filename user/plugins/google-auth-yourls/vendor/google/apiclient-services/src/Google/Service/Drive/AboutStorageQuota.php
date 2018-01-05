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

class Google_Service_Drive_AboutStorageQuota extends Google_Model
{
  public $limit;
  public $usage;
  public $usageInDrive;
  public $usageInDriveTrash;

  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setUsage($usage)
  {
    $this->usage = $usage;
  }
  public function getUsage()
  {
    return $this->usage;
  }
  public function setUsageInDrive($usageInDrive)
  {
    $this->usageInDrive = $usageInDrive;
  }
  public function getUsageInDrive()
  {
    return $this->usageInDrive;
  }
  public function setUsageInDriveTrash($usageInDriveTrash)
  {
    $this->usageInDriveTrash = $usageInDriveTrash;
  }
  public function getUsageInDriveTrash()
  {
    return $this->usageInDriveTrash;
  }
}
