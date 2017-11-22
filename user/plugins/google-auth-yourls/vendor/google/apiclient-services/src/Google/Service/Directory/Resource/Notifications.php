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
 *   $adminService = new Google_Service_Directory(...);
 *   $notifications = $adminService->notifications;
 *  </code>
 */
class Google_Service_Directory_Resource_Notifications extends Google_Service_Resource
{
  /**
   * Deletes a notification (notifications.delete)
   *
   * @param string $customer The unique ID for the customer's G Suite account. The
   * customerId is also returned as part of the Users resource.
   * @param string $notificationId The unique ID of the notification.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $notificationId, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a notification. (notifications.get)
   *
   * @param string $customer The unique ID for the customer's G Suite account. The
   * customerId is also returned as part of the Users resource.
   * @param string $notificationId The unique ID of the notification.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function get($customer, $notificationId, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Notification");
  }
  /**
   * Retrieves a list of notifications. (notifications.listNotifications)
   *
   * @param string $customer The unique ID for the customer's G Suite account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The ISO 639-1 code of the language notifications
   * are returned in. The default is English (en).
   * @opt_param string maxResults Maximum number of notifications to return per
   * page. The default is 100.
   * @opt_param string pageToken The token to specify the page of results to
   * retrieve.
   * @return Google_Service_Directory_Notifications
   */
  public function listNotifications($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Notifications");
  }
  /**
   * Updates a notification. This method supports patch semantics.
   * (notifications.patch)
   *
   * @param string $customer The unique ID for the customer's G Suite account.
   * @param string $notificationId The unique ID of the notification.
   * @param Google_Service_Directory_Notification $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function patch($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Notification");
  }
  /**
   * Updates a notification. (notifications.update)
   *
   * @param string $customer The unique ID for the customer's G Suite account.
   * @param string $notificationId The unique ID of the notification.
   * @param Google_Service_Directory_Notification $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Notification
   */
  public function update($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Notification");
  }
}
