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
 * The "contexts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $contexts = $dialogflowService->contexts;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentSessionsContexts extends Google_Service_Resource
{
  /**
   * Creates a context. (contexts.create)
   *
   * @param string $parent Required. The session to create a context for. Format:
   * `projects//agent/sessions/`.
   * @param Google_Service_Dialogflow_Context $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Context
   */
  public function create($parent, Google_Service_Dialogflow_Context $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_Context");
  }
  /**
   * Deletes the specified context. (contexts.delete)
   *
   * @param string $name Required. The name of the context to delete. Format:
   * `projects//agent/sessions//contexts/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_DialogflowEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_DialogflowEmpty");
  }
  /**
   * Retrieves the specified context. (contexts.get)
   *
   * @param string $name Required. The name of the context. Format:
   * `projects//agent/sessions//contexts/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Context
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_Context");
  }
  /**
   * Returns the list of all contexts in the specified session.
   * (contexts.listProjectsAgentSessionsContexts)
   *
   * @param string $parent Required. The session to list all contexts from.
   * Format: `projects//agent/sessions/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request.
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @return Google_Service_Dialogflow_ListContextsResponse
   */
  public function listProjectsAgentSessionsContexts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_ListContextsResponse");
  }
  /**
   * Updates the specified context. (contexts.patch)
   *
   * @param string $name Required. The unique identifier of the context. Format:
   * `projects//agent/sessions//contexts/`. Note: The Context ID is always
   * converted to lowercase.
   * @param Google_Service_Dialogflow_Context $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The mask to control which fields get
   * updated.
   * @return Google_Service_Dialogflow_Context
   */
  public function patch($name, Google_Service_Dialogflow_Context $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_Context");
  }
}
