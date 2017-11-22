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
 * The "items" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromewebstoreService = new Google_Service_Chromewebstore(...);
 *   $items = $chromewebstoreService->items;
 *  </code>
 */
class Google_Service_Chromewebstore_Resource_Items extends Google_Service_Resource
{
  /**
   * Gets your own Chrome Web Store item. (items.get)
   *
   * @param string $itemId Unique identifier representing the Chrome App, Chrome
   * Extension, or the Chrome Theme.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Determines which subset of the item information
   * to return.
   * @return Google_Service_Chromewebstore_Item
   */
  public function get($itemId, $optParams = array())
  {
    $params = array('itemId' => $itemId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Chromewebstore_Item");
  }
  /**
   * Inserts a new item. (items.insert)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string publisherEmail The email of the publisher who owns the
   * items. Defaults to the caller's email address.
   * @return Google_Service_Chromewebstore_Item
   */
  public function insert($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Chromewebstore_Item");
  }
  /**
   * Updates an existing item. This method supports patch semantics. (items.patch)
   *
   * @param string $itemId The ID of the item to upload.
   * @param Google_Service_Chromewebstore_Item $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Chromewebstore_Item
   */
  public function patch($itemId, Google_Service_Chromewebstore_Item $postBody, $optParams = array())
  {
    $params = array('itemId' => $itemId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Chromewebstore_Item");
  }
  /**
   * Publishes an item. (items.publish)
   *
   * @param string $itemId The ID of the item to publish.
   * @param Google_Service_Chromewebstore_PublishRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int deployPercentage The deploy percentage you want to set for
   * your item. Valid values are [0, 100]. If set to any number less than 100,
   * only that many percentage of users will be allowed to get the update.
   * @opt_param string publishTarget Provide defined publishTarget in URL (case
   * sensitive): publishTarget="trustedTesters" or publishTarget="default".
   * Defaults to publishTarget="default".
   * @return Google_Service_Chromewebstore_Item
   */
  public function publish($itemId, Google_Service_Chromewebstore_PublishRequest $postBody, $optParams = array())
  {
    $params = array('itemId' => $itemId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Chromewebstore_Item");
  }
  /**
   * Updates an existing item. (items.update)
   *
   * @param string $itemId The ID of the item to upload.
   * @param Google_Service_Chromewebstore_Item $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Chromewebstore_Item
   */
  public function update($itemId, Google_Service_Chromewebstore_Item $postBody, $optParams = array())
  {
    $params = array('itemId' => $itemId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Chromewebstore_Item");
  }
}
