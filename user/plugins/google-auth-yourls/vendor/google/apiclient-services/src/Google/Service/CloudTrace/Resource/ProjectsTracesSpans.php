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
 * The "spans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtraceService = new Google_Service_CloudTrace(...);
 *   $spans = $cloudtraceService->spans;
 *  </code>
 */
class Google_Service_CloudTrace_Resource_ProjectsTracesSpans extends Google_Service_Resource
{
  /**
   * Creates a new span. (spans.create)
   *
   * @param string $name The resource name of the span in the following format:
   *
   *     projects/[PROJECT_ID]/traces/[TRACE_ID]/spans/SPAN_ID is a unique
   * identifier for a trace within a project; it is a 32-character hexadecimal
   * encoding of a 16-byte array.
   *
   * [SPAN_ID] is a unique identifier for a span within a trace; it is a
   * 16-character hexadecimal encoding of an 8-byte array.
   * @param Google_Service_CloudTrace_Span $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTrace_Span
   */
  public function create($name, Google_Service_CloudTrace_Span $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudTrace_Span");
  }
}
