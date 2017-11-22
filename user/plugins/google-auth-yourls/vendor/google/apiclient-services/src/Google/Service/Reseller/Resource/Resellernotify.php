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
 * The "resellernotify" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $resellernotify = $resellerService->resellernotify;
 *  </code>
 */
class Google_Service_Reseller_Resource_Resellernotify extends Google_Service_Resource
{
  /**
   * Returns all the details of the watch corresponding to the reseller.
   * (resellernotify.getwatchdetails)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_ResellernotifyGetwatchdetailsResponse
   */
  public function getwatchdetails($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getwatchdetails', array($params), "Google_Service_Reseller_ResellernotifyGetwatchdetailsResponse");
  }
  /**
   * Registers a Reseller for receiving notifications. (resellernotify.register)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceAccountEmailAddress The service account which will
   * own the created Cloud-PubSub topic.
   * @return Google_Service_Reseller_ResellernotifyResource
   */
  public function register($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('register', array($params), "Google_Service_Reseller_ResellernotifyResource");
  }
  /**
   * Unregisters a Reseller for receiving notifications.
   * (resellernotify.unregister)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string serviceAccountEmailAddress The service account which owns
   * the Cloud-PubSub topic.
   * @return Google_Service_Reseller_ResellernotifyResource
   */
  public function unregister($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('unregister', array($params), "Google_Service_Reseller_ResellernotifyResource");
  }
}
