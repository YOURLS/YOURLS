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
 * Service definition for Games (v1).
 *
 * <p>
 * The API for Google Play Game Services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Games extends Google_Service
{
  /** View and manage its own configuration data in your Google Drive. */
  const DRIVE_APPDATA =
      "https://www.googleapis.com/auth/drive.appdata";
  /** Share your Google+ profile information and view and manage your game activity. */
  const GAMES =
      "https://www.googleapis.com/auth/games";
  /** Know the list of people in your circles, your age range, and language. */
  const PLUS_LOGIN =
      "https://www.googleapis.com/auth/plus.login";

  public $achievementDefinitions;
  public $achievements;
  public $applications;
  public $events;
  public $leaderboards;
  public $metagame;
  public $players;
  public $pushtokens;
  public $questMilestones;
  public $quests;
  public $revisions;
  public $rooms;
  public $scores;
  public $snapshots;
  public $turnBasedMatches;
  
  /**
   * Constructs the internal representation of the Games service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'games/v1/';
    $this->version = 'v1';
    $this->serviceName = 'games';

    $this->achievementDefinitions = new Google_Service_Games_Resource_AchievementDefinitions(
        $this,
        $this->serviceName,
        'achievementDefinitions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'achievements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->achievements = new Google_Service_Games_Resource_Achievements(
        $this,
        $this->serviceName,
        'achievements',
        array(
          'methods' => array(
            'increment' => array(
              'path' => 'achievements/{achievementId}/increment',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepsToIncrement' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'players/{playerId}/achievements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
                'state' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reveal' => array(
              'path' => 'achievements/{achievementId}/reveal',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setStepsAtLeast' => array(
              'path' => 'achievements/{achievementId}/setStepsAtLeast',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'steps' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'unlock' => array(
              'path' => 'achievements/{achievementId}/unlock',
              'httpMethod' => 'POST',
              'parameters' => array(
                'achievementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateMultiple' => array(
              'path' => 'achievements/updateMultiple',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->applications = new Google_Service_Games_Resource_Applications(
        $this,
        $this->serviceName,
        'applications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'applications/{applicationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'platformType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'played' => array(
              'path' => 'applications/played',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'verify' => array(
              'path' => 'applications/{applicationId}/verify',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->events = new Google_Service_Games_Resource_Events(
        $this,
        $this->serviceName,
        'events',
        array(
          'methods' => array(
            'listByPlayer' => array(
              'path' => 'events',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
            ),'listDefinitions' => array(
              'path' => 'eventDefinitions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
            ),'record' => array(
              'path' => 'events',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->leaderboards = new Google_Service_Games_Resource_Leaderboards(
        $this,
        $this->serviceName,
        'leaderboards',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'leaderboards/{leaderboardId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'leaderboards',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->metagame = new Google_Service_Games_Resource_Metagame(
        $this,
        $this->serviceName,
        'metagame',
        array(
          'methods' => array(
            'getMetagameConfig' => array(
              'path' => 'metagameConfig',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listCategoriesByPlayer' => array(
              'path' => 'players/{playerId}/categories/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->players = new Google_Service_Games_Resource_Players(
        $this,
        $this->serviceName,
        'players',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'players/{playerId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'players/me/players/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->pushtokens = new Google_Service_Games_Resource_Pushtokens(
        $this,
        $this->serviceName,
        'pushtokens',
        array(
          'methods' => array(
            'remove' => array(
              'path' => 'pushtokens/remove',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'pushtokens',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->questMilestones = new Google_Service_Games_Resource_QuestMilestones(
        $this,
        $this->serviceName,
        'questMilestones',
        array(
          'methods' => array(
            'claim' => array(
              'path' => 'quests/{questId}/milestones/{milestoneId}/claim',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'questId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'milestoneId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->quests = new Google_Service_Games_Resource_Quests(
        $this,
        $this->serviceName,
        'quests',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'quests/{questId}/accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'questId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'players/{playerId}/quests',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->revisions = new Google_Service_Games_Resource_Revisions(
        $this,
        $this->serviceName,
        'revisions',
        array(
          'methods' => array(
            'check' => array(
              'path' => 'revisions/check',
              'httpMethod' => 'GET',
              'parameters' => array(
                'clientRevision' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->rooms = new Google_Service_Games_Resource_Rooms(
        $this,
        $this->serviceName,
        'rooms',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'rooms/create',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'decline' => array(
              'path' => 'rooms/{roomId}/decline',
              'httpMethod' => 'POST',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'dismiss' => array(
              'path' => 'rooms/{roomId}/dismiss',
              'httpMethod' => 'POST',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'rooms/{roomId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'join' => array(
              'path' => 'rooms/{roomId}/join',
              'httpMethod' => 'POST',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'leave' => array(
              'path' => 'rooms/{roomId}/leave',
              'httpMethod' => 'POST',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'rooms',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
            ),'reportStatus' => array(
              'path' => 'rooms/{roomId}/reportstatus',
              'httpMethod' => 'POST',
              'parameters' => array(
                'roomId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->scores = new Google_Service_Games_Resource_Scores(
        $this,
        $this->serviceName,
        'scores',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeRankType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
            ),'list' => array(
              'path' => 'leaderboards/{leaderboardId}/scores/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
            ),'listWindow' => array(
              'path' => 'leaderboards/{leaderboardId}/window/{collection}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'collection' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'timeSpan' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
                'resultsAbove' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'returnTopIfAbsent' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'submit' => array(
              'path' => 'leaderboards/{leaderboardId}/scores',
              'httpMethod' => 'POST',
              'parameters' => array(
                'leaderboardId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'score' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scoreTag' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'submitMultiple' => array(
              'path' => 'leaderboards/scores',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->snapshots = new Google_Service_Games_Resource_Snapshots(
        $this,
        $this->serviceName,
        'snapshots',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'snapshots/{snapshotId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'snapshotId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'players/{playerId}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => array(
                'playerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
    $this->turnBasedMatches = new Google_Service_Games_Resource_TurnBasedMatches(
        $this,
        $this->serviceName,
        'turnBasedMatches',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'turnbasedmatches/{matchId}/cancel',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'create' => array(
              'path' => 'turnbasedmatches/create',
              'httpMethod' => 'POST',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'decline' => array(
              'path' => 'turnbasedmatches/{matchId}/decline',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'dismiss' => array(
              'path' => 'turnbasedmatches/{matchId}/dismiss',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'finish' => array(
              'path' => 'turnbasedmatches/{matchId}/finish',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'turnbasedmatches/{matchId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeMatchData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'join' => array(
              'path' => 'turnbasedmatches/{matchId}/join',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'leave' => array(
              'path' => 'turnbasedmatches/{matchId}/leave',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'leaveTurn' => array(
              'path' => 'turnbasedmatches/{matchId}/leaveTurn',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'matchVersion' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pendingParticipantId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'turnbasedmatches',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeMatchData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxCompletedMatches' => array(
                  'location' => 'query',
                  'type' => 'integer',
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
            ),'rematch' => array(
              'path' => 'turnbasedmatches/{matchId}/rematch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'sync' => array(
              'path' => 'turnbasedmatches/sync',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeMatchData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxCompletedMatches' => array(
                  'location' => 'query',
                  'type' => 'integer',
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
            ),'takeTurn' => array(
              'path' => 'turnbasedmatches/{matchId}/turn',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matchId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'consistencyToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
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
