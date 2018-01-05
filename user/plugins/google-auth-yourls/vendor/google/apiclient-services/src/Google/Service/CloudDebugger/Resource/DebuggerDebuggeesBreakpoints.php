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
 * The "breakpoints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddebuggerService = new Google_Service_CloudDebugger(...);
 *   $breakpoints = $clouddebuggerService->breakpoints;
 *  </code>
 */
class Google_Service_CloudDebugger_Resource_DebuggerDebuggeesBreakpoints extends Google_Service_Resource
{
  /**
   * Deletes the breakpoint from the debuggee. (breakpoints.delete)
   *
   * @param string $debuggeeId ID of the debuggee whose breakpoint to delete.
   * @param string $breakpointId ID of the breakpoint to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion The client version making the call. Schema:
   * `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return Google_Service_CloudDebugger_ClouddebuggerEmpty
   */
  public function delete($debuggeeId, $breakpointId, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId, 'breakpointId' => $breakpointId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudDebugger_ClouddebuggerEmpty");
  }
  /**
   * Gets breakpoint information. (breakpoints.get)
   *
   * @param string $debuggeeId ID of the debuggee whose breakpoint to get.
   * @param string $breakpointId ID of the breakpoint to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion The client version making the call. Schema:
   * `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return Google_Service_CloudDebugger_GetBreakpointResponse
   */
  public function get($debuggeeId, $breakpointId, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId, 'breakpointId' => $breakpointId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudDebugger_GetBreakpointResponse");
  }
  /**
   * Lists all breakpoints for the debuggee.
   * (breakpoints.listDebuggerDebuggeesBreakpoints)
   *
   * @param string $debuggeeId ID of the debuggee whose breakpoints to list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string waitToken A wait token that, if specified, blocks the call
   * until the breakpoints list has changed, or a server selected timeout has
   * expired.  The value should be set from the last response. The error code
   * `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which should be
   * called again with the same `wait_token`.
   * @opt_param string clientVersion The client version making the call. Schema:
   * `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @opt_param string action.value Only breakpoints with the specified action
   * will pass the filter.
   * @opt_param bool includeInactive When set to `true`, the response includes
   * active and inactive breakpoints. Otherwise, it includes only active
   * breakpoints.
   * @opt_param bool includeAllUsers When set to `true`, the response includes the
   * list of breakpoints set by any user. Otherwise, it includes only breakpoints
   * set by the caller.
   * @opt_param bool stripResults This field is deprecated. The following fields
   * are always stripped out of the result: `stack_frames`,
   * `evaluated_expressions` and `variable_table`.
   * @return Google_Service_CloudDebugger_ListBreakpointsResponse
   */
  public function listDebuggerDebuggeesBreakpoints($debuggeeId, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudDebugger_ListBreakpointsResponse");
  }
  /**
   * Sets the breakpoint to the debuggee. (breakpoints.set)
   *
   * @param string $debuggeeId ID of the debuggee where the breakpoint is to be
   * set.
   * @param Google_Service_CloudDebugger_Breakpoint $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion The client version making the call. Schema:
   * `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return Google_Service_CloudDebugger_SetBreakpointResponse
   */
  public function set($debuggeeId, Google_Service_CloudDebugger_Breakpoint $postBody, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('set', array($params), "Google_Service_CloudDebugger_SetBreakpointResponse");
  }
}
