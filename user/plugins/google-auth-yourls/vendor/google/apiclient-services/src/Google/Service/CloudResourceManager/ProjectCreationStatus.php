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

class Google_Service_CloudResourceManager_ProjectCreationStatus extends Google_Model
{
  public $createTime;
  public $gettable;
  public $ready;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setGettable($gettable)
  {
    $this->gettable = $gettable;
  }
  public function getGettable()
  {
    return $this->gettable;
  }
  public function setReady($ready)
  {
    $this->ready = $ready;
  }
  public function getReady()
  {
    return $this->ready;
  }
}
