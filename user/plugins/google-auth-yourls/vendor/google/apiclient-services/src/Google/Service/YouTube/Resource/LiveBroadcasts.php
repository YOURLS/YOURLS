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
 * The "liveBroadcasts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveBroadcasts = $youtubeService->liveBroadcasts;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveBroadcasts extends Google_Service_Resource
{
  /**
   * Binds a YouTube broadcast to a stream or removes an existing binding between
   * a broadcast and a stream. A broadcast can only be bound to one video stream,
   * though a video stream may be bound to more than one broadcast.
   * (liveBroadcasts.bind)
   *
   * @param string $id The id parameter specifies the unique ID of the broadcast
   * that is being bound to a video stream.
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
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
   * @opt_param string streamId The streamId parameter specifies the unique ID of
   * the video stream that is being bound to a broadcast. If this parameter is
   * omitted, the API will remove any existing binding between the broadcast and a
   * video stream.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function bind($id, $part, $optParams = array())
  {
    $params = array('id' => $id, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('bind', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Controls the settings for a slate that can be displayed in the broadcast
   * stream. (liveBroadcasts.control)
   *
   * @param string $id The id parameter specifies the YouTube live broadcast ID
   * that uniquely identifies the broadcast in which the slate is being updated.
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool displaySlate The displaySlate parameter specifies whether the
   * slate is being enabled or disabled.
   * @opt_param string offsetTimeMs The offsetTimeMs parameter specifies a
   * positive time offset when the specified slate change will occur. The value is
   * measured in milliseconds from the beginning of the broadcast's monitor
   * stream, which is the time that the testing phase for the broadcast began.
   * Even though it is specified in milliseconds, the value is actually an
   * approximation, and YouTube completes the requested action as closely as
   * possible to that time.
   *
   * If you do not specify a value for this parameter, then YouTube performs the
   * action as soon as possible. See the Getting started guide for more details.
   *
   * Important: You should only specify a value for this parameter if your
   * broadcast stream is delayed.
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
   * @opt_param string walltime The walltime parameter specifies the wall clock
   * time at which the specified slate change will occur. The value is specified
   * in ISO 8601 (YYYY-MM-DDThh:mm:ss.sssZ) format.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function control($id, $part, $optParams = array())
  {
    $params = array('id' => $id, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('control', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Deletes a broadcast. (liveBroadcasts.delete)
   *
   * @param string $id The id parameter specifies the YouTube live broadcast ID
   * for the resource that is being deleted.
   * @param array $optParams Optional parameters.
   *
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
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Creates a broadcast. (liveBroadcasts.insert)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response will include.
   *
   * The part properties that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param Google_Service_YouTube_LiveBroadcast $postBody
   * @param array $optParams Optional parameters.
   *
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
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function insert($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Returns a list of YouTube broadcasts that match the API request parameters.
   * (liveBroadcasts.listLiveBroadcasts)
   *
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string broadcastStatus The broadcastStatus parameter filters the
   * API response to only include broadcasts with the specified status.
   * @opt_param string broadcastType The broadcastType parameter filters the API
   * response to only include broadcasts with the specified type. This is only
   * compatible with the mine filter for now.
   * @opt_param string id The id parameter specifies a comma-separated list of
   * YouTube broadcast IDs that identify the broadcasts being retrieved. In a
   * liveBroadcast resource, the id property specifies the broadcast's ID.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param bool mine The mine parameter can be used to instruct the API to
   * only return broadcasts owned by the authenticated user. Set the parameter
   * value to true to only retrieve your own broadcasts.
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
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @return Google_Service_YouTube_LiveBroadcastListResponse
   */
  public function listLiveBroadcasts($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveBroadcastListResponse");
  }
  /**
   * Changes the status of a YouTube live broadcast and initiates any processes
   * associated with the new status. For example, when you transition a
   * broadcast's status to testing, YouTube starts to transmit video to that
   * broadcast's monitor stream. Before calling this method, you should confirm
   * that the value of the status.streamStatus property for the stream bound to
   * your broadcast is active. (liveBroadcasts.transition)
   *
   * @param string $broadcastStatus The broadcastStatus parameter identifies the
   * state to which the broadcast is changing. Note that to transition a broadcast
   * to either the testing or live state, the status.streamStatus must be active
   * for the stream that the broadcast is bound to.
   * @param string $id The id parameter specifies the unique ID of the broadcast
   * that is transitioning to another status.
   * @param string $part The part parameter specifies a comma-separated list of
   * one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
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
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function transition($broadcastStatus, $id, $part, $optParams = array())
  {
    $params = array('broadcastStatus' => $broadcastStatus, 'id' => $id, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('transition', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Updates a broadcast. For example, you could modify the broadcast settings
   * defined in the liveBroadcast resource's contentDetails object.
   * (liveBroadcasts.update)
   *
   * @param string $part The part parameter serves two purposes in this operation.
   * It identifies the properties that the write operation will set as well as the
   * properties that the API response will include.
   *
   * The part properties that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   *
   * Note that this method will override the existing values for all of the
   * mutable properties that are contained in any parts that the parameter value
   * specifies. For example, a broadcast's privacy status is defined in the status
   * part. As such, if your request is updating a private or unlisted broadcast,
   * and the request's part parameter value includes the status part, the
   * broadcast's privacy setting will be updated to whatever value the request
   * body specifies. If the request body does not specify a value, the existing
   * privacy setting will be removed and the broadcast will revert to the default
   * privacy setting.
   * @param Google_Service_YouTube_LiveBroadcast $postBody
   * @param array $optParams Optional parameters.
   *
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
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function update($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
}
