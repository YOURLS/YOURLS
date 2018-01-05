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
 * The "photos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $photos = $adminService->photos;
 *  </code>
 */
class Google_Service_Directory_Resource_UsersPhotos extends Google_Service_Resource
{
  /**
   * Remove photos for the user (photos.delete)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve photo of a user (photos.get)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function get($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_UserPhoto");
  }
  /**
   * Add a photo for the user. This method supports patch semantics.
   * (photos.patch)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param Google_Service_Directory_UserPhoto $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function patch($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_UserPhoto");
  }
  /**
   * Add a photo for the user (photos.update)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param Google_Service_Directory_UserPhoto $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_UserPhoto
   */
  public function update($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_UserPhoto");
  }
}
