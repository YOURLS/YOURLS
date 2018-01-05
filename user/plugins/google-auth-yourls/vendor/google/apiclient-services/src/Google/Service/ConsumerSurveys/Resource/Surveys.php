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
 * The "surveys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $consumersurveysService = new Google_Service_ConsumerSurveys(...);
 *   $surveys = $consumersurveysService->surveys;
 *  </code>
 */
class Google_Service_ConsumerSurveys_Resource_Surveys extends Google_Service_Resource
{
  /**
   * Removes a survey from view in all user GET requests. (surveys.delete)
   *
   * @param string $surveyUrlId External URL ID for the survey.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_SurveysDeleteResponse
   */
  public function delete($surveyUrlId, $optParams = array())
  {
    $params = array('surveyUrlId' => $surveyUrlId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ConsumerSurveys_SurveysDeleteResponse");
  }
  /**
   * Retrieves information about the specified survey. (surveys.get)
   *
   * @param string $surveyUrlId External URL ID for the survey.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_Survey
   */
  public function get($surveyUrlId, $optParams = array())
  {
    $params = array('surveyUrlId' => $surveyUrlId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ConsumerSurveys_Survey");
  }
  /**
   * Creates a survey. (surveys.insert)
   *
   * @param Google_Service_ConsumerSurveys_Survey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_Survey
   */
  public function insert(Google_Service_ConsumerSurveys_Survey $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ConsumerSurveys_Survey");
  }
  /**
   * Lists the surveys owned by the authenticated user. (surveys.listSurveys)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * @opt_param string startIndex
   * @opt_param string token
   * @return Google_Service_ConsumerSurveys_SurveysListResponse
   */
  public function listSurveys($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ConsumerSurveys_SurveysListResponse");
  }
  /**
   * Begins running a survey. (surveys.start)
   *
   * @param string $resourceId
   * @param Google_Service_ConsumerSurveys_SurveysStartRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_SurveysStartResponse
   */
  public function start($resourceId, Google_Service_ConsumerSurveys_SurveysStartRequest $postBody, $optParams = array())
  {
    $params = array('resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('start', array($params), "Google_Service_ConsumerSurveys_SurveysStartResponse");
  }
  /**
   * Stops a running survey. (surveys.stop)
   *
   * @param string $resourceId
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_SurveysStopResponse
   */
  public function stop($resourceId, $optParams = array())
  {
    $params = array('resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params), "Google_Service_ConsumerSurveys_SurveysStopResponse");
  }
  /**
   * Updates a survey. Currently the only property that can be updated is the
   * owners property. (surveys.update)
   *
   * @param string $surveyUrlId External URL ID for the survey.
   * @param Google_Service_ConsumerSurveys_Survey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ConsumerSurveys_Survey
   */
  public function update($surveyUrlId, Google_Service_ConsumerSurveys_Survey $postBody, $optParams = array())
  {
    $params = array('surveyUrlId' => $surveyUrlId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ConsumerSurveys_Survey");
  }
}
