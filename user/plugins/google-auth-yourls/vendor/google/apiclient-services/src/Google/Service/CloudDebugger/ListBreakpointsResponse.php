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

class Google_Service_CloudDebugger_ListBreakpointsResponse extends Google_Collection
{
  protected $collection_key = 'breakpoints';
  protected $breakpointsType = 'Google_Service_CloudDebugger_Breakpoint';
  protected $breakpointsDataType = 'array';
  public $nextWaitToken;

  /**
   * @param Google_Service_CloudDebugger_Breakpoint
   */
  public function setBreakpoints($breakpoints)
  {
    $this->breakpoints = $breakpoints;
  }
  /**
   * @return Google_Service_CloudDebugger_Breakpoint
   */
  public function getBreakpoints()
  {
    return $this->breakpoints;
  }
  public function setNextWaitToken($nextWaitToken)
  {
    $this->nextWaitToken = $nextWaitToken;
  }
  public function getNextWaitToken()
  {
    return $this->nextWaitToken;
  }
}
