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
 * The "details" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $details = $androidpublisherService->details;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsDetails extends Google_Service_Resource
{
  /**
   * Fetches app details for this edit. This includes the default language and
   * developer support contact information. (details.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppDetails
   */
  public function get($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_AppDetails");
  }
  /**
   * Updates app details for this edit. This method supports patch semantics.
   * (details.patch)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param Google_Service_AndroidPublisher_AppDetails $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppDetails
   */
  public function patch($packageName, $editId, Google_Service_AndroidPublisher_AppDetails $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_AppDetails");
  }
  /**
   * Updates app details for this edit. (details.update)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param Google_Service_AndroidPublisher_AppDetails $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppDetails
   */
  public function update($packageName, $editId, Google_Service_AndroidPublisher_AppDetails $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_AppDetails");
  }
}
