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
 * The "posts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $posts = $bloggerService->posts;
 *  </code>
 */
class Google_Service_Blogger_Resource_Posts extends Google_Service_Resource
{
  /**
   * Delete a post by ID. (posts.delete)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get a post by ID. (posts.get)
   *
   * @param string $blogId ID of the blog to fetch the post from.
   * @param string $postId The ID of the post
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody Whether the body content of the post is included
   * (default: true). This should be set to false when the post bodies are not
   * required, to help minimize traffic.
   * @opt_param bool fetchImages Whether image URL metadata for each post is
   * included (default: false).
   * @opt_param string maxComments Maximum number of comments to pull back on a
   * post.
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require elevated access.
   * @return Google_Service_Blogger_Post
   */
  public function get($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Retrieve a Post by Path. (posts.getByPath)
   *
   * @param string $blogId ID of the blog to fetch the post from.
   * @param string $path Path of the Post to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments Maximum number of comments to pull back on a
   * post.
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require elevated access.
   * @return Google_Service_Blogger_Post
   */
  public function getByPath($blogId, $path, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('getByPath', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Add a post. (posts.insert)
   *
   * @param string $blogId ID of the blog to add the post to.
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody Whether the body content of the post is included
   * with the result (default: true).
   * @opt_param bool fetchImages Whether image URL metadata for each post is
   * included in the returned result (default: false).
   * @opt_param bool isDraft Whether to create the post as a draft (default:
   * false).
   * @return Google_Service_Blogger_Post
   */
  public function insert($blogId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Retrieves a list of posts, possibly filtered. (posts.listPosts)
   *
   * @param string $blogId ID of the blog to fetch posts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Latest post date to fetch, a date-time with RFC
   * 3339 formatting.
   * @opt_param bool fetchBodies Whether the body content of posts is included
   * (default: true). This should be set to false when the post bodies are not
   * required, to help minimize traffic.
   * @opt_param bool fetchImages Whether image URL metadata for each post is
   * included.
   * @opt_param string labels Comma-separated list of labels to search for.
   * @opt_param string maxResults Maximum number of posts to fetch.
   * @opt_param string orderBy Sort search results
   * @opt_param string pageToken Continuation token if the request is paged.
   * @opt_param string startDate Earliest post date to fetch, a date-time with RFC
   * 3339 formatting.
   * @opt_param string status Statuses to include in the results.
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require escalated access.
   * @return Google_Service_Blogger_PostList
   */
  public function listPosts($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Update a post. This method supports patch semantics. (posts.patch)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody Whether the body content of the post is included
   * with the result (default: true).
   * @opt_param bool fetchImages Whether image URL metadata for each post is
   * included in the returned result (default: false).
   * @opt_param string maxComments Maximum number of comments to retrieve with the
   * returned post.
   * @opt_param bool publish Whether a publish action should be performed when the
   * post is updated (default: false).
   * @opt_param bool revert Whether a revert action should be performed when the
   * post is updated (default: false).
   * @return Google_Service_Blogger_Post
   */
  public function patch($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Publishes a draft post, optionally at the specific time of the given
   * publishDate parameter. (posts.publish)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string publishDate Optional date and time to schedule the
   * publishing of the Blog. If no publishDate parameter is given, the post is
   * either published at the a previously saved schedule date (if present), or the
   * current time. If a future date is given, the post will be scheduled to be
   * published.
   * @return Google_Service_Blogger_Post
   */
  public function publish($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Revert a published or scheduled post to draft state. (posts.revert)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Post
   */
  public function revert($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('revert', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Search for a post. (posts.search)
   *
   * @param string $blogId ID of the blog to fetch the post from.
   * @param string $q Query terms to search this blog for matching posts.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBodies Whether the body content of posts is included
   * (default: true). This should be set to false when the post bodies are not
   * required, to help minimize traffic.
   * @opt_param string orderBy Sort search results
   * @return Google_Service_Blogger_PostList
   */
  public function search($blogId, $q, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Update a post. (posts.update)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody Whether the body content of the post is included
   * with the result (default: true).
   * @opt_param bool fetchImages Whether image URL metadata for each post is
   * included in the returned result (default: false).
   * @opt_param string maxComments Maximum number of comments to retrieve with the
   * returned post.
   * @opt_param bool publish Whether a publish action should be performed when the
   * post is updated (default: false).
   * @opt_param bool revert Whether a revert action should be performed when the
   * post is updated (default: false).
   * @return Google_Service_Blogger_Post
   */
  public function update($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Blogger_Post");
  }
}
