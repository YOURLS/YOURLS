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
 * The "edits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $edits = $androidpublisherService->edits;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_Edits extends Google_Service_Resource
{
  /**
   * Commits/applies the changes made in this edit back to the app. (edits.commit)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppEdit
   */
  public function commit($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('commit', array($params), "Google_Service_AndroidPublisher_AppEdit");
  }
  /**
   * Deletes an edit for an app. Creating a new edit will automatically delete any
   * of your previous edits so this method need only be called if you want to
   * preemptively abandon an edit. (edits.delete)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns information about the edit specified. Calls will fail if the edit is
   * no long active (e.g. has been deleted, superseded or expired). (edits.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppEdit
   */
  public function get($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_AppEdit");
  }
  /**
   * Creates a new edit for an app, populated with the app's current state.
   * (edits.insert)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param Google_Service_AndroidPublisher_AppEdit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppEdit
   */
  public function insert($packageName, Google_Service_AndroidPublisher_AppEdit $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidPublisher_AppEdit");
  }
  /**
   * Checks that the edit can be successfully committed. The edit's changes are
   * not applied to the live app. (edits.validate)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_AppEdit
   */
  public function validate($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_AndroidPublisher_AppEdit");
  }
}
