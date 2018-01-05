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
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $events = $gamesManagementService->events;
 *  </code>
 */
class Google_Service_GamesManagement_Resource_Events extends Google_Service_Resource
{
  /**
   * Resets all player progress on the event with the given ID for the currently
   * authenticated player. This method is only accessible to whitelisted tester
   * accounts for your application. All quests for this player that use the event
   * will also be reset. (events.reset)
   *
   * @param string $eventId The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function reset($eventId, $optParams = array())
  {
    $params = array('eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
  /**
   * Resets all player progress on all events for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. All quests for this player will also be reset.
   * (events.resetAll)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAll($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', array($params));
  }
  /**
   * Resets all draft events for all players. This method is only available to
   * user accounts for your developer console. All quests that use any of these
   * events will also be reset. (events.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', array($params));
  }
  /**
   * Resets the event with the given ID for all players. This method is only
   * available to user accounts for your developer console. Only draft events can
   * be reset. All quests that use the event will also be reset.
   * (events.resetForAllPlayers)
   *
   * @param string $eventId The ID of the event.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($eventId, $optParams = array())
  {
    $params = array('eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
  /**
   * Resets events with the given IDs for all players. This method is only
   * available to user accounts for your developer console. Only draft events may
   * be reset. All quests that use any of the events will also be reset.
   * (events.resetMultipleForAllPlayers)
   *
   * @param Google_Service_GamesManagement_EventsResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(Google_Service_GamesManagement_EventsResetMultipleForAllRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', array($params));
  }
}
