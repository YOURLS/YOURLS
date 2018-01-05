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
 * The "testers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $testers = $androidpublisherService->testers;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsTesters extends Google_Service_Resource
{
  /**
   * (testers.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $track
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Testers
   */
  public function get($packageName, $editId, $track, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_Testers");
  }
  /**
   * (testers.patch)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $track
   * @param Google_Service_AndroidPublisher_Testers $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Testers
   */
  public function patch($packageName, $editId, $track, Google_Service_AndroidPublisher_Testers $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_Testers");
  }
  /**
   * (testers.update)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $track
   * @param Google_Service_AndroidPublisher_Testers $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Testers
   */
  public function update($packageName, $editId, $track, Google_Service_AndroidPublisher_Testers $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_Testers");
  }
}
