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
 * The "agent" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $agent = $dialogflowService->agent;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgent extends Google_Service_Resource
{
  /**
   * Exports the specified agent to a ZIP file.
   *
   * Operation (agent.export)
   *
   * @param string $parent Required. The project that the agent to export is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_ExportAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function export($parent, Google_Service_Dialogflow_ExportAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Imports the specified agent from a ZIP file.
   *
   * Uploads new intents and entity types without deleting the existing ones.
   * Intents and entity types with the same name are replaced with the new
   * versions from ImportAgentRequest.
   *
   * Operation (agent.import)
   *
   * @param string $parent Required. The project that the agent to import is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_ImportAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function import($parent, Google_Service_Dialogflow_ImportAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Restores the specified agent from a ZIP file.
   *
   * Replaces the current agent version with a new one. All the intents and entity
   * types in the older version are deleted.
   *
   * Operation (agent.restore)
   *
   * @param string $parent Required. The project that the agent to restore is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_RestoreAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function restore($parent, Google_Service_Dialogflow_RestoreAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Returns the list of agents.
   *
   * Since there is at most one conversational agent per project, this method is
   * useful primarily for listing all agents across projects the caller has access
   * to. One can achieve that with a wildcard project collection id "-". Refer to
   * [List Sub-Collections](https://cloud.google.com/apis/design/design_patterns
   * #list_sub-collections). (agent.search)
   *
   * @param string $parent Required. The project to list agents from. Format:
   * `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request.
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @return Google_Service_Dialogflow_SearchAgentsResponse
   */
  public function search($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Dialogflow_SearchAgentsResponse");
  }
  /**
   * Trains the specified agent.
   *
   * Operation (agent.train)
   *
   * @param string $parent Required. The project that the agent to train is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_TrainAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function train($parent, Google_Service_Dialogflow_TrainAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('train', array($params), "Google_Service_Dialogflow_Operation");
  }
}
