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
 * The "notifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $notifications = $storageService->notifications;
 *  </code>
 */
class Google_Service_Storage_Resource_Notifications extends Google_Service_Resource
{
  /**
   * Permanently deletes a notification subscription. (notifications.delete)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param string $notification ID of the notification to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $notification, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'notification' => $notification);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * View a notification configuration. (notifications.get)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param string $notification Notification ID
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Notification
   */
  public function get($bucket, $notification, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'notification' => $notification);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storage_Notification");
  }
  /**
   * Creates a notification subscription for a given bucket.
   * (notifications.insert)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param Google_Service_Storage_Notification $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Notification
   */
  public function insert($bucket, Google_Service_Storage_Notification $postBody, $optParams = array())
  {
    $params = array('bucket' => $bucket, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Storage_Notification");
  }
  /**
   * Retrieves a list of notification subscriptions for a given bucket.
   * (notifications.listNotifications)
   *
   * @param string $bucket Name of a Google Cloud Storage bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Google_Service_Storage_Notifications
   */
  public function listNotifications($bucket, $optParams = array())
  {
    $params = array('bucket' => $bucket);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storage_Notifications");
  }
}
