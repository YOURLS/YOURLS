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
 * Service definition for YouTube (v3).
 *
 * <p>
 * Supports core YouTube features, such as uploading videos, creating and
 * managing playlists, searching for content, and much more.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/youtube/v3" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_YouTube extends Google_Service
{
  /** Manage your YouTube account. */
  const YOUTUBE =
      "https://www.googleapis.com/auth/youtube";
  /** Manage your YouTube account. */
  const YOUTUBE_FORCE_SSL =
      "https://www.googleapis.com/auth/youtube.force-ssl";
  /** View your YouTube account. */
  const YOUTUBE_READONLY =
      "https://www.googleapis.com/auth/youtube.readonly";
  /** Manage your YouTube videos. */
  const YOUTUBE_UPLOAD =
      "https://www.googleapis.com/auth/youtube.upload";
  /** View and manage your assets and associated content on YouTube. */
  const YOUTUBEPARTNER =
      "https://www.googleapis.com/auth/youtubepartner";
  /** View private information of your YouTube channel relevant during the audit process with a YouTube partner. */
  const YOUTUBEPARTNER_CHANNEL_AUDIT =
      "https://www.googleapis.com/auth/youtubepartner-channel-audit";

  public $activities;
  public $captions;
  public $channelBanners;
  public $channelSections;
  public $channels;
  public $commentThreads;
  public $comments;
  public $fanFundingEvents;
  public $guideCategories;
  public $i18nLanguages;
  public $i18nRegions;
  public $liveBroadcasts;
  public $liveChatBans;
  public $liveChatMessages;
  public $liveChatModerators;
  public $liveStreams;
  public $playlistItems;
  public $playlists;
  public $search;
  public $sponsors;
  public $subscriptions;
  public $superChatEvents;
  public $thumbnails;
  public $videoAbuseReportReasons;
  public $videoCategories;
  public $videos;
  public $watermarks;
  
  /**
   * Constructs the internal representation of the YouTube service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'youtube/v3/';
    $this->version = 'v3';
    $this->serviceName = 'youtube';

    $this->activities = new Google_Service_YouTube_Resource_Activities(
        $this,
        $this->serviceName,
        'activities',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'activities',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'activities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'home' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'publishedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'publishedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->captions = new Google_Service_YouTube_Resource_Captions(
        $this,
        $this->serviceName,
        'captions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'captions',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'download' => array(
              'path' => 'captions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tfmt' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tlang' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'captions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sync' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'captions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'captions',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOf' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sync' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->channelBanners = new Google_Service_YouTube_Resource_ChannelBanners(
        $this,
        $this->serviceName,
        'channelBanners',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'channelBanners/insert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channelSections = new Google_Service_YouTube_Resource_ChannelSections(
        $this,
        $this->serviceName,
        'channelSections',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'channelSections',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'channelSections',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'channelSections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'channelSections',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_YouTube_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'channels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'categoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forUsername' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'managedByMe' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'mySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'channels',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->commentThreads = new Google_Service_YouTube_Resource_CommentThreads(
        $this,
        $this->serviceName,
        'commentThreads',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'commentThreads',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'commentThreads',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'allThreadsRelatedToChannelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'moderationStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'textFormat' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'commentThreads',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->comments = new Google_Service_YouTube_Resource_Comments(
        $this,
        $this->serviceName,
        'comments',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'comments',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'comments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'comments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'textFormat' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'markAsSpam' => array(
              'path' => 'comments/markAsSpam',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setModerationStatus' => array(
              'path' => 'comments/setModerationStatus',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'moderationStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'banAuthor' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'comments',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->fanFundingEvents = new Google_Service_YouTube_Resource_FanFundingEvents(
        $this,
        $this->serviceName,
        'fanFundingEvents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'fanFundingEvents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->guideCategories = new Google_Service_YouTube_Resource_GuideCategories(
        $this,
        $this->serviceName,
        'guideCategories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'guideCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->i18nLanguages = new Google_Service_YouTube_Resource_I18nLanguages(
        $this,
        $this->serviceName,
        'i18nLanguages',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'i18nLanguages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->i18nRegions = new Google_Service_YouTube_Resource_I18nRegions(
        $this,
        $this->serviceName,
        'i18nRegions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'i18nRegions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->liveBroadcasts = new Google_Service_YouTube_Resource_LiveBroadcasts(
        $this,
        $this->serviceName,
        'liveBroadcasts',
        array(
          'methods' => array(
            'bind' => array(
              'path' => 'liveBroadcasts/bind',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'streamId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'control' => array(
              'path' => 'liveBroadcasts/control',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'displaySlate' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'offsetTimeMs' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'walltime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'liveBroadcasts',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'liveBroadcasts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'liveBroadcasts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'broadcastStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'broadcastType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'transition' => array(
              'path' => 'liveBroadcasts/transition',
              'httpMethod' => 'POST',
              'parameters' => array(
                'broadcastStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'liveBroadcasts',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatBans = new Google_Service_YouTube_Resource_LiveChatBans(
        $this,
        $this->serviceName,
        'liveChatBans',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'liveChat/bans',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'liveChat/bans',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatMessages = new Google_Service_YouTube_Resource_LiveChatMessages(
        $this,
        $this->serviceName,
        'liveChatMessages',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'liveChat/messages',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'liveChat/messages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'liveChat/messages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'liveChatId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'profileImageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->liveChatModerators = new Google_Service_YouTube_Resource_LiveChatModerators(
        $this,
        $this->serviceName,
        'liveChatModerators',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'liveChat/moderators',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'liveChat/moderators',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'liveChat/moderators',
              'httpMethod' => 'GET',
              'parameters' => array(
                'liveChatId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->liveStreams = new Google_Service_YouTube_Resource_LiveStreams(
        $this,
        $this->serviceName,
        'liveStreams',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'liveStreams',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'liveStreams',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'liveStreams',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'liveStreams',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->playlistItems = new Google_Service_YouTube_Resource_PlaylistItems(
        $this,
        $this->serviceName,
        'playlistItems',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'playlistItems',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'playlistItems',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'playlistItems',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'playlistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'playlistItems',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->playlists = new Google_Service_YouTube_Resource_Playlists(
        $this,
        $this->serviceName,
        'playlists',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'playlists',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'playlists',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'playlists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'playlists',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->search = new Google_Service_YouTube_Resource_Search(
        $this,
        $this->serviceName,
        'search',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'channelType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'eventType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forContentOwner' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'forDeveloper' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'forMine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'location' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locationRadius' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'publishedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'publishedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relatedToVideoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relevanceLanguage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'safeSearch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'topicId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoCaption' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoCategoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDefinition' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDimension' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoDuration' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoEmbeddable' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoLicense' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoSyndicated' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->sponsors = new Google_Service_YouTube_Resource_Sponsors(
        $this,
        $this->serviceName,
        'sponsors',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'sponsors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->subscriptions = new Google_Service_YouTube_Resource_Subscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'subscriptions',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'subscriptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'subscriptions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'forChannelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'mine' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'myRecentSubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'mySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'order' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->superChatEvents = new Google_Service_YouTube_Resource_SuperChatEvents(
        $this,
        $this->serviceName,
        'superChatEvents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'superChatEvents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->thumbnails = new Google_Service_YouTube_Resource_Thumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        array(
          'methods' => array(
            'set' => array(
              'path' => 'thumbnails/set',
              'httpMethod' => 'POST',
              'parameters' => array(
                'videoId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videoAbuseReportReasons = new Google_Service_YouTube_Resource_VideoAbuseReportReasons(
        $this,
        $this->serviceName,
        'videoAbuseReportReasons',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'videoAbuseReportReasons',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videoCategories = new Google_Service_YouTube_Resource_VideoCategories(
        $this,
        $this->serviceName,
        'videoCategories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'videoCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->videos = new Google_Service_YouTube_Resource_Videos(
        $this,
        $this->serviceName,
        'videos',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'videos',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getRating' => array(
              'path' => 'videos/getRating',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'videos',
              'httpMethod' => 'POST',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoLevels' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'notifySubscribers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwnerChannel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'stabilize' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'videos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'chart' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxHeight' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxWidth' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'myRating' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'videoCategoryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'rate' => array(
              'path' => 'videos/rate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'rating' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'reportAbuse' => array(
              'path' => 'videos/reportAbuse',
              'httpMethod' => 'POST',
              'parameters' => array(
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'videos',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'part' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->watermarks = new Google_Service_YouTube_Resource_Watermarks(
        $this,
        $this->serviceName,
        'watermarks',
        array(
          'methods' => array(
            'set' => array(
              'path' => 'watermarks/set',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'unset' => array(
              'path' => 'watermarks/unset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'channelId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'onBehalfOfContentOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
