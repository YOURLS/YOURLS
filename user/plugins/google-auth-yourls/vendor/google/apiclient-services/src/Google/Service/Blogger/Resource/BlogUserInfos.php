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
 * The "blogUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogUserInfos = $bloggerService->blogUserInfos;
 *  </code>
 */
class Google_Service_Blogger_Resource_BlogUserInfos extends Google_Service_Resource
{
  /**
   * Gets one blog and user info pair by blogId and userId. (blogUserInfos.get)
   *
   * @param string $userId ID of the user whose blogs are to be fetched. Either
   * the word 'self' (sans quote marks) or the user's profile identifier.
   * @param string $blogId The ID of the blog to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts Maximum number of posts to pull back with the
   * blog.
   * @return Google_Service_Blogger_BlogUserInfo
   */
  public function get($userId, $blogId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_BlogUserInfo");
  }
}
