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
 * The "acl" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $acl = $calendarService->acl;
 *  </code>
 */
class Google_Service_Calendar_Resource_Acl extends Google_Service_Resource
{
  /**
   * Deletes an access control rule. (acl.delete)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $ruleId ACL rule identifier.
   * @param array $optParams Optional parameters.
   */
  public function delete($calendarId, $ruleId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns an access control rule. (acl.get)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $ruleId ACL rule identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Calendar_AclRule
   */
  public function get($calendarId, $ruleId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Calendar_AclRule");
  }
  /**
   * Creates an access control rule. (acl.insert)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Google_Service_Calendar_AclRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * calendar sharing change. Optional. The default is True.
   * @return Google_Service_Calendar_AclRule
   */
  public function insert($calendarId, Google_Service_Calendar_AclRule $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Calendar_AclRule");
  }
  /**
   * Returns the rules in the access control list for the calendar. (acl.listAcl)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of entries returned on one result
   * page. By default the value is 100 entries. The page size can never be larger
   * than 250 entries. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param bool showDeleted Whether to include deleted ACLs in the result.
   * Deleted ACLs are represented by role equal to "none". Deleted ACLs will
   * always be included if syncToken is provided. Optional. The default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All entries deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. If the
   * syncToken expires, the server will respond with a 410 GONE response code and
   * the client should clear its storage and perform a full synchronization
   * without any syncToken. Learn more about incremental synchronization.
   * Optional. The default is to return all entries.
   * @return Google_Service_Calendar_Acl
   */
  public function listAcl($calendarId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Calendar_Acl");
  }
  /**
   * Updates an access control rule. This method supports patch semantics.
   * (acl.patch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $ruleId ACL rule identifier.
   * @param Google_Service_Calendar_AclRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * calendar sharing change. Note that there are no notifications on access
   * removal. Optional. The default is True.
   * @return Google_Service_Calendar_AclRule
   */
  public function patch($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Calendar_AclRule");
  }
  /**
   * Updates an access control rule. (acl.update)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $ruleId ACL rule identifier.
   * @param Google_Service_Calendar_AclRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * calendar sharing change. Note that there are no notifications on access
   * removal. Optional. The default is True.
   * @return Google_Service_Calendar_AclRule
   */
  public function update($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Calendar_AclRule");
  }
  /**
   * Watch for changes to ACL resources. (acl.watch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Google_Service_Calendar_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of entries returned on one result
   * page. By default the value is 100 entries. The page size can never be larger
   * than 250 entries. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param bool showDeleted Whether to include deleted ACLs in the result.
   * Deleted ACLs are represented by role equal to "none". Deleted ACLs will
   * always be included if syncToken is provided. Optional. The default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All entries deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. If the
   * syncToken expires, the server will respond with a 410 GONE response code and
   * the client should clear its storage and perform a full synchronization
   * without any syncToken. Learn more about incremental synchronization.
   * Optional. The default is to return all entries.
   * @return Google_Service_Calendar_Channel
   */
  public function watch($calendarId, Google_Service_Calendar_Channel $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Calendar_Channel");
  }
}
