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
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $settings = $gmailService->settings;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersSettings extends Google_Service_Resource
{
  /**
   * Gets the auto-forwarding setting for the specified account.
   * (settings.getAutoForwarding)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_AutoForwarding
   */
  public function getAutoForwarding($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('getAutoForwarding', array($params), "Google_Service_Gmail_AutoForwarding");
  }
  /**
   * Gets IMAP settings. (settings.getImap)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ImapSettings
   */
  public function getImap($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('getImap', array($params), "Google_Service_Gmail_ImapSettings");
  }
  /**
   * Gets POP settings. (settings.getPop)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_PopSettings
   */
  public function getPop($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('getPop', array($params), "Google_Service_Gmail_PopSettings");
  }
  /**
   * Gets vacation responder settings. (settings.getVacation)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_VacationSettings
   */
  public function getVacation($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('getVacation', array($params), "Google_Service_Gmail_VacationSettings");
  }
  /**
   * Updates the auto-forwarding setting for the specified account. A verified
   * forwarding address must be specified when auto-forwarding is enabled.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (settings.updateAutoForwarding)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_AutoForwarding $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_AutoForwarding
   */
  public function updateAutoForwarding($userId, Google_Service_Gmail_AutoForwarding $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateAutoForwarding', array($params), "Google_Service_Gmail_AutoForwarding");
  }
  /**
   * Updates IMAP settings. (settings.updateImap)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_ImapSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ImapSettings
   */
  public function updateImap($userId, Google_Service_Gmail_ImapSettings $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateImap', array($params), "Google_Service_Gmail_ImapSettings");
  }
  /**
   * Updates POP settings. (settings.updatePop)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_PopSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_PopSettings
   */
  public function updatePop($userId, Google_Service_Gmail_PopSettings $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatePop', array($params), "Google_Service_Gmail_PopSettings");
  }
  /**
   * Updates vacation responder settings. (settings.updateVacation)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_VacationSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_VacationSettings
   */
  public function updateVacation($userId, Google_Service_Gmail_VacationSettings $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateVacation', array($params), "Google_Service_Gmail_VacationSettings");
  }
}
