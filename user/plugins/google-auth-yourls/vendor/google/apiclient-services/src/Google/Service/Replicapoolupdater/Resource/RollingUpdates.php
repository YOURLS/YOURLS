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
 * The "rollingUpdates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolupdaterService = new Google_Service_Replicapoolupdater(...);
 *   $rollingUpdates = $replicapoolupdaterService->rollingUpdates;
 *  </code>
 */
class Google_Service_Replicapoolupdater_Resource_RollingUpdates extends Google_Service_Resource
{
  /**
   * Cancels an update. The update must be PAUSED before it can be cancelled. This
   * has no effect if the update is already CANCELLED. (rollingUpdates.cancel)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Operation
   */
  public function cancel($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Replicapoolupdater_Operation");
  }
  /**
   * Returns information about an update. (rollingUpdates.get)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_RollingUpdate
   */
  public function get($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapoolupdater_RollingUpdate");
  }
  /**
   * Inserts and starts a new update. (rollingUpdates.insert)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param Google_Service_Replicapoolupdater_RollingUpdate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Operation
   */
  public function insert($project, $zone, Google_Service_Replicapoolupdater_RollingUpdate $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapoolupdater_Operation");
  }
  /**
   * Lists recent updates for a given managed instance group, in reverse
   * chronological order and paginated format. (rollingUpdates.listRollingUpdates)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression for filtering listed
   * resources.
   * @opt_param string maxResults Optional. Maximum count of results to be
   * returned. Maximum value is 500 and default value is 500.
   * @opt_param string pageToken Optional. Tag returned by a previous list request
   * truncated by maxResults. Used to continue a previous list request.
   * @return Google_Service_Replicapoolupdater_RollingUpdateList
   */
  public function listRollingUpdates($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapoolupdater_RollingUpdateList");
  }
  /**
   * Lists the current status for each instance within a given update.
   * (rollingUpdates.listInstanceUpdates)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression for filtering listed
   * resources.
   * @opt_param string maxResults Optional. Maximum count of results to be
   * returned. Maximum value is 500 and default value is 500.
   * @opt_param string pageToken Optional. Tag returned by a previous list request
   * truncated by maxResults. Used to continue a previous list request.
   * @return Google_Service_Replicapoolupdater_InstanceUpdateList
   */
  public function listInstanceUpdates($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('listInstanceUpdates', array($params), "Google_Service_Replicapoolupdater_InstanceUpdateList");
  }
  /**
   * Pauses the update in state from ROLLING_FORWARD or ROLLING_BACK. Has no
   * effect if invoked when the state of the update is PAUSED.
   * (rollingUpdates.pause)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Operation
   */
  public function pause($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params), "Google_Service_Replicapoolupdater_Operation");
  }
  /**
   * Continues an update in PAUSED state. Has no effect if invoked when the state
   * of the update is ROLLED_OUT. (rollingUpdates.resume)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Operation
   */
  public function resume($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_Replicapoolupdater_Operation");
  }
  /**
   * Rolls back the update in state from ROLLING_FORWARD or PAUSED. Has no effect
   * if invoked when the state of the update is ROLLED_BACK.
   * (rollingUpdates.rollback)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the update's target
   * resides.
   * @param string $rollingUpdate The name of the update.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapoolupdater_Operation
   */
  public function rollback($project, $zone, $rollingUpdate, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params), "Google_Service_Replicapoolupdater_Operation");
  }
}
