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

class Google_Service_AndroidEnterprise_NotificationSet extends Google_Collection
{
  protected $collection_key = 'notification';
  public $kind;
  protected $notificationType = 'Google_Service_AndroidEnterprise_Notification';
  protected $notificationDataType = 'array';
  public $notificationSetId;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_AndroidEnterprise_Notification
   */
  public function setNotification($notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Google_Service_AndroidEnterprise_Notification
   */
  public function getNotification()
  {
    return $this->notification;
  }
  public function setNotificationSetId($notificationSetId)
  {
    $this->notificationSetId = $notificationSetId;
  }
  public function getNotificationSetId()
  {
    return $this->notificationSetId;
  }
}
