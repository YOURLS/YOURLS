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

class Google_Service_ServiceConsumerManagement_UsageRule extends Google_Model
{
  public $allowUnregisteredCalls;
  public $selector;
  public $skipServiceControl;

  public function setAllowUnregisteredCalls($allowUnregisteredCalls)
  {
    $this->allowUnregisteredCalls = $allowUnregisteredCalls;
  }
  public function getAllowUnregisteredCalls()
  {
    return $this->allowUnregisteredCalls;
  }
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  public function getSelector()
  {
    return $this->selector;
  }
  public function setSkipServiceControl($skipServiceControl)
  {
    $this->skipServiceControl = $skipServiceControl;
  }
  public function getSkipServiceControl()
  {
    return $this->skipServiceControl;
  }
}
