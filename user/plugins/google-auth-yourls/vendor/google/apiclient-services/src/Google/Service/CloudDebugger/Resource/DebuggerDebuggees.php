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

/**
 * The "debuggees" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddebuggerService = new Google_Service_CloudDebugger(...);
 *   $debuggees = $clouddebuggerService->debuggees;
 *  </code>
 */
class Google_Service_CloudDebugger_Resource_DebuggerDebuggees extends Google_Service_Resource
{
  /**
   * Lists all the debuggees that the user has access to.
   * (debuggees.listDebuggerDebuggees)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive When set to `true`, the result includes all
   * debuggees. Otherwise, the result includes only debuggees that are active.
   * @opt_param string project Project number of a Google Cloud project whose
   * debuggees to list.
   * @opt_param string clientVersion The client version making the call. Schema:
   * `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return Google_Service_CloudDebugger_ListDebuggeesResponse
   */
  public function listDebuggerDebuggees($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudDebugger_ListDebuggeesResponse");
  }
}
