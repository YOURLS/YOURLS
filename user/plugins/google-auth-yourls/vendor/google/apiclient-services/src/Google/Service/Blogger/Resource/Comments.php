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
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $comments = $bloggerService->comments;
 *  </code>
 */
class Google_Service_Blogger_Resource_Comments extends Google_Service_Resource
{
  /**
   * Marks a comment as not spam. (comments.approve)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param string $commentId The ID of the comment to mark as not spam.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function approve($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('approve', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Delete a comment by ID. (comments.delete)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param string $commentId The ID of the comment to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets one comment by ID. (comments.get)
   *
   * @param string $blogId ID of the blog to containing the comment.
   * @param string $postId ID of the post to fetch posts from.
   * @param string $commentId The ID of the comment to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Access level for the requested comment (default:
   * READER). Note that some comments will require elevated permissions, for
   * example comments where the parent posts which is in a draft state, or
   * comments that are pending moderation.
   * @return Google_Service_Blogger_Comment
   */
  public function get($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Retrieves the comments for a post, possibly filtered. (comments.listComments)
   *
   * @param string $blogId ID of the blog to fetch comments from.
   * @param string $postId ID of the post to fetch posts from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Latest date of comment to fetch, a date-time with
   * RFC 3339 formatting.
   * @opt_param bool fetchBodies Whether the body content of the comments is
   * included.
   * @opt_param string maxResults Maximum number of comments to include in the
   * result.
   * @opt_param string pageToken Continuation token if request is paged.
   * @opt_param string startDate Earliest date of comment to fetch, a date-time
   * with RFC 3339 formatting.
   * @opt_param string status
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require elevated access.
   * @return Google_Service_Blogger_CommentList
   */
  public function listComments($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_CommentList");
  }
  /**
   * Retrieves the comments for a blog, across all posts, possibly filtered.
   * (comments.listByBlog)
   *
   * @param string $blogId ID of the blog to fetch comments from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Latest date of comment to fetch, a date-time with
   * RFC 3339 formatting.
   * @opt_param bool fetchBodies Whether the body content of the comments is
   * included.
   * @opt_param string maxResults Maximum number of comments to include in the
   * result.
   * @opt_param string pageToken Continuation token if request is paged.
   * @opt_param string startDate Earliest date of comment to fetch, a date-time
   * with RFC 3339 formatting.
   * @opt_param string status
   * @return Google_Service_Blogger_CommentList
   */
  public function listByBlog($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('listByBlog', array($params), "Google_Service_Blogger_CommentList");
  }
  /**
   * Marks a comment as spam. (comments.markAsSpam)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param string $commentId The ID of the comment to mark as spam.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function markAsSpam($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('markAsSpam', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Removes the content of a comment. (comments.removeContent)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $postId The ID of the Post.
   * @param string $commentId The ID of the comment to delete content from.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function removeContent($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('removeContent', array($params), "Google_Service_Blogger_Comment");
  }
}
