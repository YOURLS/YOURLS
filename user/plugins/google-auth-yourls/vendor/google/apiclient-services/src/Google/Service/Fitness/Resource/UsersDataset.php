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
 * The "dataset" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $dataset = $fitnessService->dataset;
 *  </code>
 */
class Google_Service_Fitness_Resource_UsersDataset extends Google_Service_Resource
{
  /**
   * Aggregates data of a certain type or stream into buckets divided by a given
   * type of boundary. Multiple data sets of multiple types and from multiple
   * sources can be aggreated into exactly one bucket type per request.
   * (dataset.aggregate)
   *
   * @param string $userId Aggregate data for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param Google_Service_Fitness_AggregateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fitness_AggregateResponse
   */
  public function aggregate($userId, Google_Service_Fitness_AggregateRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('aggregate', array($params), "Google_Service_Fitness_AggregateResponse");
  }
}
