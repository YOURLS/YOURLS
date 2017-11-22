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
 *   $kgsearchService = new Google_Service_Kgsearch(...);
 *   $entities = $kgsearchService->entities;
 *  </code>
 */
class Google_Service_Kgsearch_Resource_Entities extends Google_Service_Resource
{
  /**
   * Searches Knowledge Graph for entities that match the constraints. A list of
   * matched entities will be returned in response, which will be in JSON-LD
   * format and compatible with http://schema.org (entities.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool prefix Enables prefix match against names and aliases of
   * entities
   * @opt_param string query The literal query string for search.
   * @opt_param string types Restricts returned entities with these types, e.g.
   * Person (as defined in http://schema.org/Person). If multiple types are
   * specified, returned entities will contain one or more of these types.
   * @opt_param bool indent Enables indenting of json results.
   * @opt_param string languages The list of language codes (defined in ISO 693)
   * to run the query with, e.g. 'en'.
   * @opt_param string ids The list of entity id to be used for search instead of
   * query string. To specify multiple ids in the HTTP request, repeat the
   * parameter in the URL as in ...?ids=A=B
   * @opt_param int limit Limits the number of entities to be returned.
   * @return Google_Service_Kgsearch_SearchResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Kgsearch_SearchResponse");
  }
}
