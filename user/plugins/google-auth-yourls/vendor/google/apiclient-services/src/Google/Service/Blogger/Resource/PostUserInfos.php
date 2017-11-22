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
 * The "postUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $postUserInfos = $bloggerService->postUserInfos;
 *  </code>
 */
class Google_Service_Blogger_Resource_PostUserInfos extends Google_Service_Resource
{
  /**
   * Gets one post and user info pair, by post ID and user ID. The post user info
   * contains per-user information about the post, such as access rights, specific
   * to the user. (postUserInfos.get)
   *
   * @param string $userId ID of the user for the per-user information to be
   * fetched. Either the word 'self' (sans quote marks) or the user's profile
   * identifier.
   * @param string $blogId The ID of the blog.
   * @param string $postId The ID of the post to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments Maximum number of comments to pull back on a
   * post.
   * @return Google_Service_Blogger_PostUserInfo
   */
  public function get($userId, $blogId, $postId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_PostUserInfo");
  }
  /**
   * Retrieves a list of post and post user info pairs, possibly filtered. The
   * post user info contains per-user information about the post, such as access
   * rights, specific to the user. (postUserInfos.listPostUserInfos)
   *
   * @param string $userId ID of the user for the per-user information to be
   * fetched. Either the word 'self' (sans quote marks) or the user's profile
   * identifier.
   * @param string $blogId ID of the blog to fetch posts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Latest post date to fetch, a date-time with RFC
   * 3339 formatting.
   * @opt_param bool fetchBodies Whether the body content of posts is included.
   * Default is false.
   * @opt_param string labels Comma-separated list of labels to search for.
   * @opt_param string maxResults Maximum number of posts to fetch.
   * @opt_param string orderBy Sort order applied to search results. Default is
   * published.
   * @opt_param string pageToken Continuation token if the request is paged.
   * @opt_param string startDate Earliest post date to fetch, a date-time with RFC
   * 3339 formatting.
   * @opt_param string status
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require elevated access.
   * @return Google_Service_Blogger_PostUserInfosList
   */
  public function listPostUserInfos($userId, $blogId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PostUserInfosList");
  }
}
