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
 * The "templates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managerService = new Google_Service_Manager(...);
 *   $templates = $managerService->templates;
 *  </code>
 */
class Google_Service_Manager_TemplatesResource extends Google_Service_Resource
{
  /**
   * (templates.delete)
   *
   * @param string $projectId
   * @param string $templateName
   * @param array $optParams Optional parameters.
   */
  public function delete($projectId, $templateName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'templateName' => $templateName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * (templates.get)
   *
   * @param string $projectId
   * @param string $templateName
   * @param array $optParams Optional parameters.
   * @return Google_Service_Template
   */
  public function get($projectId, $templateName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'templateName' => $templateName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Manager_Template");
  }
  /**
   * (templates.insert)
   *
   * @param string $projectId
   * @param Google_Template $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Template
   */
  public function insert($projectId, Google_Service_Manager_Template $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Manager_Template");
  }
  /**
   * (templates.listTemplates)
   *
   * @param string $projectId
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 100, inclusive. (Default: 50)
   * @opt_param string pageToken Specifies a nextPageToken returned by a previous
   * list request. This token can be used to request the next page of results from
   * a previous list request.
   * @return Google_Service_TemplatesListResponse
   */
  public function listTemplates($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Manager_TemplatesListResponse");
  }
}
