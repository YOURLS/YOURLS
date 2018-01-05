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
 * The "sessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $sessions = $dialogflowService->sessions;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentSessions extends Google_Service_Resource
{
  /**
   * Deletes all active contexts in the specified session.
   * (sessions.deleteContexts)
   *
   * @param string $parent Required. The name of the session to delete all
   * contexts from. Format: `projects//agent/sessions/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_DialogflowEmpty
   */
  public function deleteContexts($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('deleteContexts', array($params), "Google_Service_Dialogflow_DialogflowEmpty");
  }
  /**
   * Processes a natural language query and returns structured, actionable data as
   * a result. This method is not idempotent, because it may cause contexts and
   * session entity types to be updated, which in turn might affect results of
   * future queries. (sessions.detectIntent)
   *
   * @param string $session Required. The name of the session this query is sent
   * to. Format: `projects//agent/sessions/`. It's up to the API caller to choose
   * an appropriate session ID. It can be a random number or some type of user
   * identifier (preferably hashed). The length of the session ID must not exceed
   * 36 bytes.
   * @param Google_Service_Dialogflow_DetectIntentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_DetectIntentResponse
   */
  public function detectIntent($session, Google_Service_Dialogflow_DetectIntentRequest $postBody, $optParams = array())
  {
    $params = array('session' => $session, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('detectIntent', array($params), "Google_Service_Dialogflow_DetectIntentResponse");
  }
}
