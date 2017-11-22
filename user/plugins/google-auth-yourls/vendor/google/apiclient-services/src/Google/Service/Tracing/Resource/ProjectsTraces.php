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
 * The "traces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tracingService = new Google_Service_Tracing(...);
 *   $traces = $tracingService->traces;
 *  </code>
 */
class Google_Service_Tracing_Resource_ProjectsTraces extends Google_Service_Resource
{
  /**
   * Sends new spans to Stackdriver Trace or updates existing traces. If the name
   * of a trace that you send matches that of an existing trace, new spans are
   * added to the existing trace. Attempt to update existing spans results
   * undefined behavior. If the name does not match, a new trace is created with
   * given set of spans. (traces.batchWrite)
   *
   * @param string $name Name of the project where the spans belong to. Format is
   * `projects/PROJECT_ID`.
   * @param Google_Service_Tracing_BatchWriteSpansRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Tracing_TracingEmpty
   */
  public function batchWrite($name, Google_Service_Tracing_BatchWriteSpansRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchWrite', array($params), "Google_Service_Tracing_TracingEmpty");
  }
  /**
   * Returns of a list of traces that match the specified filter conditions.
   * (traces.listProjectsTraces)
   *
   * @param string $parent ID of the Cloud project where the trace data is stored
   * which is `projects/PROJECT_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An optional filter for the request. Example:
   * `version_label_key:a some_label:some_label_key` returns traces from version
   * `a` and has `some_label` with `some_label_key`.
   * @opt_param string endTime End of the time interval (inclusive) during which
   * the trace data was collected from the application.
   * @opt_param string pageToken Token identifying the page of results to return.
   * If provided, use the value of the `next_page_token` field from a previous
   * request. Optional.
   * @opt_param string startTime Start of the time interval (inclusive) during
   * which the trace data was collected from the application.
   * @opt_param int pageSize Maximum number of traces to return. If not specified
   * or <= 0, the implementation selects a reasonable value. The implementation
   * may return fewer traces than the requested page size. Optional.
   * @opt_param string orderBy Field used to sort the returned traces. Optional.
   * Can be one of the following:
   *
   * *   `trace_id` *   `name` (`name` field of root span in the trace) *
   * `duration` (difference between `end_time` and `start_time` fields of      the
   * root span) *   `start` (`start_time` field of the root span)
   *
   * Descending order can be specified by appending `desc` to the sort field (for
   * example, `name desc`).
   *
   * Only one sort field is permitted.
   * @return Google_Service_Tracing_ListTracesResponse
   */
  public function listProjectsTraces($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Tracing_ListTracesResponse");
  }
  /**
   * Returns a list of spans within a trace. (traces.listSpans)
   *
   * @param string $parent ID of the trace for which to list child spans. Format
   * is `projects/PROJECT_ID/traces/TRACE_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token identifying the page of results to return.
   * If provided, use the value of the `nextPageToken` field from a previous
   * request. Optional.
   * @return Google_Service_Tracing_ListSpansResponse
   */
  public function listSpans($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('listSpans', array($params), "Google_Service_Tracing_ListSpansResponse");
  }
}
