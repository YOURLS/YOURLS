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
class Google_Service_CloudDebugger_Resource_ControllerDebuggeesBreakpoints extends Google_Service_Resource
{
  /**
   * Returns the list of all active breakpoints for the debuggee.
   *
   * The breakpoint specification (`location`, `condition`, and `expressions`
   * fields) is semantically immutable, although the field values may change. For
   * example, an agent may update the location line number to reflect the actual
   * line where the breakpoint was set, but this doesn't change the breakpoint
   * semantics.
   *
   * This means that an agent does not need to check if a breakpoint has changed
   * when it encounters the same breakpoint on a successive call. Moreover, an
   * agent should remember the breakpoints that are completed until the controller
   * removes them from the active list to avoid setting those breakpoints again.
   * (breakpoints.listControllerDebuggeesBreakpoints)
   *
   * @param string $debuggeeId Identifies the debuggee.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool successOnTimeout If set to `true` (recommended), returns
   * `google.rpc.Code.OK` status and sets the `wait_expired` response field to
   * `true` when the server-selected timeout has expired.
   *
   * If set to `false` (deprecated), returns `google.rpc.Code.ABORTED` status when
   * the server-selected timeout has expired.
   * @opt_param string waitToken A token that, if specified, blocks the method
   * call until the list of active breakpoints has changed, or a server-selected
   * timeout has expired. The value should be set from the `next_wait_token` field
   * in the last response. The initial value should be set to `"init"`.
   * @return Google_Service_CloudDebugger_ListActiveBreakpointsResponse
   */
  public function listControllerDebuggeesBreakpoints($debuggeeId, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudDebugger_ListActiveBreakpointsResponse");
  }
  /**
   * Updates the breakpoint state or mutable fields. The entire Breakpoint message
   * must be sent back to the controller service.
   *
   * Updates to active breakpoint fields are only allowed if the new value does
   * not change the breakpoint specification. Updates to the `location`,
   * `condition` and `expressions` fields should not alter the breakpoint
   * semantics. These may only make changes such as canonicalizing a value or
   * snapping the location to the correct line of code. (breakpoints.update)
   *
   * @param string $debuggeeId Identifies the debuggee being debugged.
   * @param string $id Breakpoint identifier, unique in the scope of the debuggee.
   * @param Google_Service_CloudDebugger_UpdateActiveBreakpointRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudDebugger_UpdateActiveBreakpointResponse
   */
  public function update($debuggeeId, $id, Google_Service_CloudDebugger_UpdateActiveBreakpointRequest $postBody, $optParams = array())
  {
    $params = array('debuggeeId' => $debuggeeId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_CloudDebugger_UpdateActiveBreakpointResponse");
  }
}
