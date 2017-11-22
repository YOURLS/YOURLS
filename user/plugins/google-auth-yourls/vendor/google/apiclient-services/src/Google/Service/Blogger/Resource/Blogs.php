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
 * The "blogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogs = $bloggerService->blogs;
 *  </code>
 */
class Google_Service_Blogger_Resource_Blogs extends Google_Service_Resource
{
  /**
   * Gets one blog by ID. (blogs.get)
   *
   * @param string $blogId The ID of the blog to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts Maximum number of posts to pull back with the
   * blog.
   * @opt_param string view Access level with which to view the blog. Note that
   * some fields require elevated access.
   * @return Google_Service_Blogger_Blog
   */
  public function get($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Retrieve a Blog by URL. (blogs.getByUrl)
   *
   * @param string $url The URL of the blog to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Access level with which to view the blog. Note that
   * some fields require elevated access.
   * @return Google_Service_Blogger_Blog
   */
  public function getByUrl($url, $optParams = array())
  {
    $params = array('url' => $url);
    $params = array_merge($params, $optParams);
    return $this->call('getByUrl', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Retrieves a list of blogs, possibly filtered. (blogs.listByUser)
   *
   * @param string $userId ID of the user whose blogs are to be fetched. Either
   * the word 'self' (sans quote marks) or the user's profile identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchUserInfo Whether the response is a list of blogs with
   * per-user information instead of just blogs.
   * @opt_param string role User access types for blogs to include in the results,
   * e.g. AUTHOR will return blogs where the user has author level access. If no
   * roles are specified, defaults to ADMIN and AUTHOR roles.
   * @opt_param string status Blog statuses to include in the result (default:
   * Live blogs only). Note that ADMIN access is required to view deleted blogs.
   * @opt_param string view Access level with which to view the blogs. Note that
   * some fields require elevated access.
   * @return Google_Service_Blogger_BlogList
   */
  public function listByUser($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('listByUser', array($params), "Google_Service_Blogger_BlogList");
  }
}
