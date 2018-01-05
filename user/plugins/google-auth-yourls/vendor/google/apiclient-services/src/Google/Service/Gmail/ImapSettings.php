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

class Google_Service_Gmail_ImapSettings extends Google_Model
{
  public $autoExpunge;
  public $enabled;
  public $expungeBehavior;
  public $maxFolderSize;

  public function setAutoExpunge($autoExpunge)
  {
    $this->autoExpunge = $autoExpunge;
  }
  public function getAutoExpunge()
  {
    return $this->autoExpunge;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setExpungeBehavior($expungeBehavior)
  {
    $this->expungeBehavior = $expungeBehavior;
  }
  public function getExpungeBehavior()
  {
    return $this->expungeBehavior;
  }
  public function setMaxFolderSize($maxFolderSize)
  {
    $this->maxFolderSize = $maxFolderSize;
  }
  public function getMaxFolderSize()
  {
    return $this->maxFolderSize;
  }
}
