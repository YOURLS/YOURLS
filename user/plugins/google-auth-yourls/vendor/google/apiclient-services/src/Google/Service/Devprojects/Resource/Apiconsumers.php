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
 * The "apiconsumers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $apiconsumers = $devprojectsService->apiconsumers;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Apiconsumers extends Google_Service_Resource
{
  /**
   * Removes an API available for consumption from the consumer project. This can
   * be invoked by either the API producer or the API consumer.
   * (apiconsumers.delete)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiIdToken The ID of the API for which to delete the API
   * consumption details
   * @opt_param string consumerProjectId The consumer project ID for which to
   * delete the API consumption details
   * @opt_param string producerProjectId The producer project ID for which to
   * delete the API consumption details
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   */
  public function delete($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Makes an API available for consumption to a given consumer project by the the
   * API producer (apiconsumers.insert)
   *
   * @param Google_Service_Devprojects_ApiConsumer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApiConsumer
   */
  public function insert(Google_Service_Devprojects_ApiConsumer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Devprojects_ApiConsumer");
  }
  /**
   * Lists the API consumers for a given producer and API
   * (apiconsumers.listApiconsumers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiIdToken The ApiId token for which consumers are listed
   * @opt_param string locale The language code, country code and locale variant
   * encoded as a single string. This is intended to be the locale for the end
   * user, and hence the target of translations. Presence of the language code
   * indicates that the response should include translation strings for the
   * requested sections, as appropriate.
   * @opt_param string producerProjectId The producer project for which consumers
   * are listed
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApiconsumersListResponse
   */
  public function listApiconsumers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Devprojects_ApiconsumersListResponse");
  }
  /**
   * Updates the configuration of consumption of an API. The update can change
   * producer-specific configuration like the API consumption status or quota
   * constraints. By switching the consumption status the producer can
   * pause/resume the consumption of the API. Through quota constraints the
   * producer can set or clear an explicit per-consumer daily quota, overriding
   * the per-API default. (apiconsumers.update)
   *
   * @param Google_Service_Devprojects_ApiConsumer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_ApiConsumer
   */
  public function update(Google_Service_Devprojects_ApiConsumer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Devprojects_ApiConsumer");
  }
}
