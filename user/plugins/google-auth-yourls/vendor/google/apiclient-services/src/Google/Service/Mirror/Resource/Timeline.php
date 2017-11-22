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
 * The "timeline" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $timeline = $mirrorService->timeline;
 *  </code>
 */
class Google_Service_Mirror_Resource_Timeline extends Google_Service_Resource
{
  /**
   * Deletes a timeline item. (timeline.delete)
   *
   * @param string $id The ID of the timeline item.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a single timeline item by ID. (timeline.get)
   *
   * @param string $id The ID of the timeline item.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_TimelineItem
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mirror_TimelineItem");
  }
  /**
   * Inserts a new item into the timeline. (timeline.insert)
   *
   * @param Google_Service_Mirror_TimelineItem $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_TimelineItem
   */
  public function insert(Google_Service_Mirror_TimelineItem $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Mirror_TimelineItem");
  }
  /**
   * Retrieves a list of timeline items for the authenticated user.
   * (timeline.listTimeline)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string bundleId If provided, only items with the given bundleId
   * will be returned.
   * @opt_param bool includeDeleted If true, tombstone records for deleted items
   * will be returned.
   * @opt_param string maxResults The maximum number of items to include in the
   * response, used for paging.
   * @opt_param string orderBy Controls the order in which timeline items are
   * returned.
   * @opt_param string pageToken Token for the page of results to return.
   * @opt_param bool pinnedOnly If true, only pinned items will be returned.
   * @opt_param string sourceItemId If provided, only items with the given
   * sourceItemId will be returned.
   * @return Google_Service_Mirror_TimelineListResponse
   */
  public function listTimeline($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mirror_TimelineListResponse");
  }
  /**
   * Updates a timeline item in place. This method supports patch semantics.
   * (timeline.patch)
   *
   * @param string $id The ID of the timeline item.
   * @param Google_Service_Mirror_TimelineItem $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_TimelineItem
   */
  public function patch($id, Google_Service_Mirror_TimelineItem $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Mirror_TimelineItem");
  }
  /**
   * Updates a timeline item in place. (timeline.update)
   *
   * @param string $id The ID of the timeline item.
   * @param Google_Service_Mirror_TimelineItem $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_TimelineItem
   */
  public function update($id, Google_Service_Mirror_TimelineItem $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Mirror_TimelineItem");
  }
}
