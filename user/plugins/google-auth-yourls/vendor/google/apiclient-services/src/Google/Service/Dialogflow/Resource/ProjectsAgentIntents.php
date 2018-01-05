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
 * The "intents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $intents = $dialogflowService->intents;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentIntents extends Google_Service_Resource
{
  /**
   * Deletes intents in the specified agent.
   *
   * Operation (intents.batchDelete)
   *
   * @param string $parent Required. The name of the agent to delete all entities
   * types for. Format: `projects//agent`.
   * @param Google_Service_Dialogflow_BatchDeleteIntentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function batchDelete($parent, Google_Service_Dialogflow_BatchDeleteIntentsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Updates/Creates multiple intents in the specified agent.
   *
   * Operation (intents.batchUpdate)
   *
   * @param string $parent Required. The name of the agent to update or create
   * intents in. Format: `projects//agent`.
   * @param Google_Service_Dialogflow_BatchUpdateIntentsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function batchUpdate($parent, Google_Service_Dialogflow_BatchUpdateIntentsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Creates an intent in the specified agent. (intents.create)
   *
   * @param string $parent Required. The agent to create a intent for. Format:
   * `projects//agent`.
   * @param Google_Service_Dialogflow_Intent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language of training phrases,
   * parameters and rich messages defined in `intent`. If not specified, the
   * agent's default language is used. [More than a dozen
   * languages](https://dialogflow.com/docs/reference/language) are supported.
   * Note: languages must be enabled in the agent, before they can be used.
   * @opt_param string intentView Optional. The resource view to apply to the
   * returned intent.
   * @return Google_Service_Dialogflow_Intent
   */
  public function create($parent, Google_Service_Dialogflow_Intent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_Intent");
  }
  /**
   * Deletes the specified intent. (intents.delete)
   *
   * @param string $name Required. The name of the intent to delete. Format:
   * `projects//agent/intents/`.
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
   * Retrieves the specified intent. (intents.get)
   *
   * @param string $name Required. The name of the intent. Format:
   * `projects//agent/intents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string intentView Optional. The resource view to apply to the
   * returned intent.
   * @opt_param string languageCode Optional. The language to retrieve training
   * phrases, parameters and rich messages for. If not specified, the agent's
   * default language is used. [More than a dozen
   * languages](https://dialogflow.com/docs/reference/language) are supported.
   * Note: languages must be enabled in the agent, before they can be used.
   * @return Google_Service_Dialogflow_Intent
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_Intent");
  }
  /**
   * Returns the list of all intents in the specified agent.
   * (intents.listProjectsAgentIntents)
   *
   * @param string $parent Required. The agent to list all intents from. Format:
   * `projects//agent`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @opt_param string intentView Optional. The resource view to apply to the
   * returned intent.
   * @opt_param string languageCode Optional. The language to list training
   * phrases, parameters and rich messages for. If not specified, the agent's
   * default language is used. [More than a dozen
   * languages](https://dialogflow.com/docs/reference/language) are supported.
   * Note: languages must be enabled in the agent before they can be used.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request.
   * @return Google_Service_Dialogflow_ListIntentsResponse
   */
  public function listProjectsAgentIntents($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_ListIntentsResponse");
  }
  /**
   * Updates the specified intent. (intents.patch)
   *
   * @param string $name Required for all methods except `create` (`create`
   * populates the name automatically. The unique identifier of this intent.
   * Format: `projects//agent/intents/`.
   * @param Google_Service_Dialogflow_Intent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language of training phrases,
   * parameters and rich messages defined in `intent`. If not specified, the
   * agent's default language is used. [More than a dozen
   * languages](https://dialogflow.com/docs/reference/language) are supported.
   * Note: languages must be enabled in the agent, before they can be used.
   * @opt_param string updateMask Optional. The mask to control which fields get
   * updated.
   * @opt_param string intentView Optional. The resource view to apply to the
   * returned intent.
   * @return Google_Service_Dialogflow_Intent
   */
  public function patch($name, Google_Service_Dialogflow_Intent $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_Intent");
  }
}
