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

class Google_Service_PlusDomains_ActivityObjectStatusForViewer extends Google_Model
{
  public $canComment;
  public $canPlusone;
  public $canUpdate;
  public $isPlusOned;
  public $resharingDisabled;

  public function setCanComment($canComment)
  {
    $this->canComment = $canComment;
  }
  public function getCanComment()
  {
    return $this->canComment;
  }
  public function setCanPlusone($canPlusone)
  {
    $this->canPlusone = $canPlusone;
  }
  public function getCanPlusone()
  {
    return $this->canPlusone;
  }
  public function setCanUpdate($canUpdate)
  {
    $this->canUpdate = $canUpdate;
  }
  public function getCanUpdate()
  {
    return $this->canUpdate;
  }
  public function setIsPlusOned($isPlusOned)
  {
    $this->isPlusOned = $isPlusOned;
  }
  public function getIsPlusOned()
  {
    return $this->isPlusOned;
  }
  public function setResharingDisabled($resharingDisabled)
  {
    $this->resharingDisabled = $resharingDisabled;
  }
  public function getResharingDisabled()
  {
    return $this->resharingDisabled;
  }
}
