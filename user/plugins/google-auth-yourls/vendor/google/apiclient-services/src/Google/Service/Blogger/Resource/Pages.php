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
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $pages = $bloggerService->pages;
 *  </code>
 */
class Google_Service_Blogger_Resource_Pages extends Google_Service_Resource
{
  /**
   * Delete a page by ID. (pages.delete)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $pageId The ID of the Page.
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $pageId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets one blog page by ID. (pages.get)
   *
   * @param string $blogId ID of the blog containing the page.
   * @param string $pageId The ID of the page to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @return Google_Service_Blogger_Page
   */
  public function get($blogId, $pageId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Add a page. (pages.insert)
   *
   * @param string $blogId ID of the blog to add the page to.
   * @param Google_Service_Blogger_Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool isDraft Whether to create the page as a draft (default:
   * false).
   * @return Google_Service_Blogger_Page
   */
  public function insert($blogId, Google_Service_Blogger_Page $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Retrieves the pages for a blog, optionally including non-LIVE statuses.
   * (pages.listPages)
   *
   * @param string $blogId ID of the blog to fetch Pages from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBodies Whether to retrieve the Page bodies.
   * @opt_param string maxResults Maximum number of Pages to fetch.
   * @opt_param string pageToken Continuation token if the request is paged.
   * @opt_param string status
   * @opt_param string view Access level with which to view the returned result.
   * Note that some fields require elevated access.
   * @return Google_Service_Blogger_PageList
   */
  public function listPages($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PageList");
  }
  /**
   * Update a page. This method supports patch semantics. (pages.patch)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $pageId The ID of the Page.
   * @param Google_Service_Blogger_Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool publish Whether a publish action should be performed when the
   * page is updated (default: false).
   * @opt_param bool revert Whether a revert action should be performed when the
   * page is updated (default: false).
   * @return Google_Service_Blogger_Page
   */
  public function patch($blogId, $pageId, Google_Service_Blogger_Page $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Publishes a draft page. (pages.publish)
   *
   * @param string $blogId The ID of the blog.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Page
   */
  public function publish($blogId, $pageId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Revert a published or scheduled page to draft state. (pages.revert)
   *
   * @param string $blogId The ID of the blog.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Page
   */
  public function revert($blogId, $pageId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('revert', array($params), "Google_Service_Blogger_Page");
  }
  /**
   * Update a page. (pages.update)
   *
   * @param string $blogId The ID of the Blog.
   * @param string $pageId The ID of the Page.
   * @param Google_Service_Blogger_Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool publish Whether a publish action should be performed when the
   * page is updated (default: false).
   * @opt_param bool revert Whether a revert action should be performed when the
   * page is updated (default: false).
   * @return Google_Service_Blogger_Page
   */
  public function update($blogId, $pageId, Google_Service_Blogger_Page $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Blogger_Page");
  }
}
