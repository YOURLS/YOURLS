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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $projects = $dialogflowService->projects;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_Projects extends Google_Service_Resource
{
  /**
   * Retrieves the specified agent. (projects.getAgent)
   *
   * @param string $parent Required. The project that the agent to fetch is
   * associated with. Format: `projects/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Agent
   */
  public function getAgent($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getAgent', array($params), "Google_Service_Dialogflow_Agent");
  }
}
