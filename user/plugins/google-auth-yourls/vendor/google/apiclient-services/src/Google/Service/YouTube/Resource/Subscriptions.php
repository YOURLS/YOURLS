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
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $subscriptions = $youtubeService->subscriptions;
 *  </code>
 */
class Google_Service_YouTube_Resource_Subscriptions extends Google_Service_Resource
{
  /**
   * Deletes a subscription. (subscriptions.delete)
   *
   * @param string $id The id parameter specifies the YouTube subscription ID for
   * the resource that is being deleted. In a subscription resource, the id
   * property specifies the YouTube subscription ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Adds a subscription for the authenticated user's channel.
   * (subscriptions.insert)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response will include.
   * @param Google_Service_YouTube_Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_Subscription
   */
  public function insert($part, Google_Service_YouTube_Subscription $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_Subscription");
  }
  /**
   * Returns subscription resources that match the API request criteria.
   * (subscriptions.listSubscriptions)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more subscription resource properties that the API response will
   * include.
   *
   * If the parameter identifies a property that contains child properties, the
   * child properties will be included in the response. For example, in a
   * subscription resource, the snippet property contains other properties, such
   * as a display title for the subscription. If you set part=snippet, the API
   * response will also contain all of those nested properties.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelId The channelId parameter specifies a YouTube
   * channel ID. The API will only return that channel's subscriptions.
   * @opt_param string forChannelId The forChannelId parameter specifies a comma-
   * separated list of channel IDs. The API response will then only contain
   * subscriptions matching those channels.
   * @opt_param string id The id parameter specifies a comma-separated list of the
   * YouTube subscription ID(s) for the resource(s) that are being retrieved. In a
   * subscription resource, the id property specifies the YouTube subscription ID.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param bool mine Set this parameter's value to true to retrieve a feed of
   * the authenticated user's subscriptions.
   * @opt_param bool myRecentSubscribers Set this parameter's value to true to
   * retrieve a feed of the subscribers of the authenticated user in reverse
   * chronological order (newest first).
   * @opt_param bool mySubscribers Set this parameter's value to true to retrieve
   * a feed of the subscribers of the authenticated user in no particular order.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.
   *
   * The onBehalfOfContentOwner parameter indicates that the request's
   * authorization credentials identify a YouTube CMS user who is acting on behalf
   * of the content owner specified in the parameter value. This parameter is
   * intended for YouTube content partners that own and manage many different
   * YouTube channels. It allows content owners to authenticate once and get
   * access to all their video and channel data, without having to provide
   * authentication credentials for each individual channel. The CMS account that
   * the user authenticates with must be linked to the specified YouTube content
   * owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.
   *
   * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
   * of the channel to which a video is being added. This parameter is required
   * when a request specifies a value for the onBehalfOfContentOwner parameter,
   * and it can only be used in conjunction with that parameter. In addition, the
   * request must be authorized using a CMS account that is linked to the content
   * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
   * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
   * be linked to the content owner that the onBehalfOfContentOwner parameter
   * specifies.
   *
   * This parameter is intended for YouTube content partners that own and manage
   * many different YouTube channels. It allows content owners to authenticate
   * once and perform actions on behalf of the channel specified in the parameter
   * value, without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string order The order parameter specifies the method that will be
   * used to sort resources in the API response.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @return Google_Service_YouTube_SubscriptionListResponse
   */
  public function listSubscriptions($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_SubscriptionListResponse");
  }
}
