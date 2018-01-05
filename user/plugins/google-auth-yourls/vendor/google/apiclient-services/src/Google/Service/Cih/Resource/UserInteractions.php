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
 * The "userInteractions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cihService = new Google_Service_Cih(...);
 *   $userInteractions = $cihService->userInteractions;
 *  </code>
 */
class Google_Service_Cih_Resource_UserInteractions extends Google_Service_Resource
{
  /**
   * Gets an interaction. (userInteractions.get)
   *
   * @param string $entityType Represents the Type of the entity whose interaction
   * will be returned. Possible Values: COMPANY, ADWORDS_CID, EMAIL,
   * ADDRESS_DIGEST, GAIA_ID.
   * @param string $entityId Represents the Id of the Entity whose interaction
   * will be returned.
   * @param string $timestamp the timestamp of the interaction to be returned. It
   * is measured as the number of microseconds since the Epoch.
   * @param string $interactionType The type of the interaction to be returned.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cih_UserInteraction
   */
  public function get($entityType, $entityId, $timestamp, $interactionType, $optParams = array())
  {
    $params = array('entityType' => $entityType, 'entityId' => $entityId, 'timestamp' => $timestamp, 'interactionType' => $interactionType);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Cih_UserInteraction");
  }
  /**
   * Inserts a new interaction to CIH. (userInteractions.insert)
   *
   * @param Google_Service_Cih_UserInteraction $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cih_UserInteraction
   */
  public function insert(Google_Service_Cih_UserInteraction $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Cih_UserInteraction");
  }
  /**
   * Get a list of interactions for the given entity and its relatives if
   * requested. The returned list is sorted by timestamp in descending order.
   * (userInteractions.listUserInteractions)
   *
   * @param string|array $entity List of entities to retrieve. At least one item
   * must be present. Each item must be in 'ENTITY_TYPE:ENTITY_ID' format which
   * ENTITY_TYPE is COMPANY, ADWORDS_CID, EMAIL, ADDRESS_DIGEST or GAIA_ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string entityFilter Primary or secondary entities, if available
   * only interactions whose primary or secondary entities are given are returned.
   * For info about the format of this field see the comments of
   * UserInteractionsApiaryFilter proto.
   * @opt_param bool excludePassedInteractionOrigin Indicates the inclusive or
   * exclusive behavior of interactionOrigin field. See the description of
   * interactionOrigin.
   * @opt_param bool excludePassedInteractionType Indicates the inclusive or
   * exclusive behavior of interactionType field. See the description of
   * interactionType.
   * @opt_param bool includeRelatedInteractions By default, all interactions which
   * apply to any member of the entity structure which contains the provided
   * entity are returned. If include_related_interactions is false, then only the
   * interactions which are associated directly with this entity are returned, and
   * neither parent_entity nor child_entities in the Entity object returned by
   * this operation are populated.
   * @opt_param string interactionOrigin This limit is ignored if absent and all
   * interactions regardless of their origin will be returned. Otherwise the
   * meaning of this field depends on the include_interaction_origin field. 1.
   * exclude_passed_interaction_origin is true: Only interactions whose Origin is
   * contained in interaction_origin will be returned. 2.
   * exclude_passed_interaction_origin is false: Only interactions whose Origin
   * isn't contained in interaction_origin will be returned.
   * @opt_param string interactionType This limit is ignored if absent and all
   * interactions regardless of their type will be returned. Otherwise the meaning
   * of this field depends on the exclude_passed_interaction_type field. 1.
   * exclude_passed_interaction_type is true: Only interactions whose Type is
   * contained in interaction_type will be returned. 2.
   * exclude_passed_interaction_type is false: Only interactions whose Type isn't
   * contained in interaction_type will be returned.
   * @opt_param bool lookup_participant_info Request to get additional information
   * about interaction participants, such as names, email addresses. May increase
   * latency of this call.
   * @opt_param int maxInteractionsPerPage The limit on the number of returned
   * interactions. This is the maximum number of interactions which will be
   * returned, starting with the most recent. Thie default value is 100. If it is
   * equal to zero then only the entity structure is returned.
   * @opt_param string maxResults The maximum number of results per page.
   * @opt_param string metaTypeFilter Represents the interaction's classification.
   * Possible values: SALES, SUPPORT, MARKETING. For more info see http://go/cih-
   * gt-api
   * @opt_param int minMainEntityInteractions Attempt to read at least this many
   * main entity interactions. The default value is set to 0. Pagination is
   * disabled if a positive value is set.
   * @opt_param string pageToken The pagination token.
   * @opt_param string phoneMatcher If available only interactions whose phone
   * number is given are returned. For info about the format of this field see the
   * comments of UserInteractionsApiaryFilter proto.
   * @opt_param string timestampEnd Upper limit on the timestamp for the returned
   * interactions. It is measured as the number of microseconds since the Epoch.
   * @opt_param string timestampStart Lower limit on the timestamp for the
   * returned interactions. It is measured as the number of microseconds since the
   * Epoch.
   * @return Google_Service_Cih_UserInteractionsListResponse
   */
  public function listUserInteractions($entity, $optParams = array())
  {
    $params = array('entity' => $entity);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cih_UserInteractionsListResponse");
  }
}
