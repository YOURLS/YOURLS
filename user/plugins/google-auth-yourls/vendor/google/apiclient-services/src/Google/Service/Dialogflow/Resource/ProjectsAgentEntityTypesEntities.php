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
 * The "entities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $entities = $dialogflowService->entities;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentEntityTypesEntities extends Google_Service_Resource
{
  /**
   * Creates multiple new entities in the specified entity type (extends the
   * existing collection of entries).
   *
   * Operation (entities.batchCreate)
   *
   * @param string $parent Required. The name of the entity type to create
   * entities in. Format: `projects//agent/entityTypes/`.
   * @param Google_Service_Dialogflow_BatchCreateEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function batchCreate($parent, Google_Service_Dialogflow_BatchCreateEntitiesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Deletes entities in the specified entity type.
   *
   * Operation (entities.batchDelete)
   *
   * @param string $parent Required. The name of the entity type to delete entries
   * for. Format: `projects//agent/entityTypes/`.
   * @param Google_Service_Dialogflow_BatchDeleteEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function batchDelete($parent, Google_Service_Dialogflow_BatchDeleteEntitiesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_Dialogflow_Operation");
  }
  /**
   * Updates entities in the specified entity type (replaces the existing
   * collection of entries).
   *
   * Operation (entities.batchUpdate)
   *
   * @param string $parent Required. The name of the entity type to update the
   * entities in. Format: `projects//agent/entityTypes/`.
   * @param Google_Service_Dialogflow_BatchUpdateEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_Operation
   */
  public function batchUpdate($parent, Google_Service_Dialogflow_BatchUpdateEntitiesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Dialogflow_Operation");
  }
}
