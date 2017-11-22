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
 * The "samples" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $samples = $toolresultsService->samples;
 *  </code>
 */
class Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfSampleSeriesSamples extends Google_Service_Resource
{
  /**
   * Creates a batch of PerfSamples - a client can submit multiple batches of Perf
   * Samples through repeated calls to this method in order to split up a large
   * request payload - duplicates and existing timestamp entries will be ignored.
   * - the batch operation may partially succeed - the set of elements
   * successfully inserted is returned in the response (omits items which already
   * existed in the database).
   *
   * May return any of the following canonical error codes: - NOT_FOUND - The
   * containing PerfSampleSeries does not exist (samples.batchCreate)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param string $sampleSeriesId A sample series id
   * @param Google_Service_ToolResults_BatchCreatePerfSamplesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_BatchCreatePerfSamplesResponse
   */
  public function batchCreate($projectId, $historyId, $executionId, $stepId, $sampleSeriesId, Google_Service_ToolResults_BatchCreatePerfSamplesRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'sampleSeriesId' => $sampleSeriesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_ToolResults_BatchCreatePerfSamplesResponse");
  }
  /**
   * Lists the Performance Samples of a given Sample Series - The list results are
   * sorted by timestamps ascending - The default page size is 500 samples; and
   * maximum size allowed 5000 - The response token indicates the last returned
   * PerfSample timestamp - When the results size exceeds the page size, submit a
   * subsequent request including the page token to return the rest of the samples
   * up to the page limit
   *
   * May return any of the following canonical error codes: - OUT_OF_RANGE - The
   * specified request page_token is out of valid range - NOT_FOUND - The
   * containing PerfSampleSeries does not exist
   * (samples.listProjectsHistoriesExecutionsStepsPerfSampleSeriesSamples)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param string $sampleSeriesId A sample series id
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The default page size is 500 samples, and the maximum
   * size is 5000. If the page_size is greater than 5000, the effective page size
   * will be 5000
   * @opt_param string pageToken Optional, the next_page_token returned in the
   * previous response
   * @return Google_Service_ToolResults_ListPerfSamplesResponse
   */
  public function listProjectsHistoriesExecutionsStepsPerfSampleSeriesSamples($projectId, $historyId, $executionId, $stepId, $sampleSeriesId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'sampleSeriesId' => $sampleSeriesId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ToolResults_ListPerfSamplesResponse");
  }
}
