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

class Google_Service_Mirror_Subscription extends Google_Collection
{
  protected $collection_key = 'operation';
  public $callbackUrl;
  public $collection;
  public $id;
  public $kind;
  protected $notificationType = 'Google_Service_Mirror_Notification';
  protected $notificationDataType = '';
  public $operation;
  public $updated;
  public $userToken;
  public $verifyToken;

  public function setCallbackUrl($callbackUrl)
  {
    $this->callbackUrl = $callbackUrl;
  }
  public function getCallbackUrl()
  {
    return $this->callbackUrl;
  }
  public function setCollection($collection)
  {
    $this->collection = $collection;
  }
  public function getCollection()
  {
    return $this->collection;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Mirror_Notification
   */
  public function setNotification(Google_Service_Mirror_Notification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Google_Service_Mirror_Notification
   */
  public function getNotification()
  {
    return $this->notification;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setUserToken($userToken)
  {
    $this->userToken = $userToken;
  }
  public function getUserToken()
  {
    return $this->userToken;
  }
  public function setVerifyToken($verifyToken)
  {
    $this->verifyToken = $verifyToken;
  }
  public function getVerifyToken()
  {
    return $this->verifyToken;
  }
}
