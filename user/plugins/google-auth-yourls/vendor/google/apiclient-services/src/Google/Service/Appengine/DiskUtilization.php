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

class Google_Service_Appengine_DiskUtilization extends Google_Model
{
  public $targetReadBytesPerSecond;
  public $targetReadOpsPerSecond;
  public $targetWriteBytesPerSecond;
  public $targetWriteOpsPerSecond;

  public function setTargetReadBytesPerSecond($targetReadBytesPerSecond)
  {
    $this->targetReadBytesPerSecond = $targetReadBytesPerSecond;
  }
  public function getTargetReadBytesPerSecond()
  {
    return $this->targetReadBytesPerSecond;
  }
  public function setTargetReadOpsPerSecond($targetReadOpsPerSecond)
  {
    $this->targetReadOpsPerSecond = $targetReadOpsPerSecond;
  }
  public function getTargetReadOpsPerSecond()
  {
    return $this->targetReadOpsPerSecond;
  }
  public function setTargetWriteBytesPerSecond($targetWriteBytesPerSecond)
  {
    $this->targetWriteBytesPerSecond = $targetWriteBytesPerSecond;
  }
  public function getTargetWriteBytesPerSecond()
  {
    return $this->targetWriteBytesPerSecond;
  }
  public function setTargetWriteOpsPerSecond($targetWriteOpsPerSecond)
  {
    $this->targetWriteOpsPerSecond = $targetWriteOpsPerSecond;
  }
  public function getTargetWriteOpsPerSecond()
  {
    return $this->targetWriteOpsPerSecond;
  }
}
