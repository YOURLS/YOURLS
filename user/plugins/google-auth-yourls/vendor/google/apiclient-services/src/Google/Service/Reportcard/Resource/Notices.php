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
 * The "notices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $reportcardService = new Google_Service_Reportcard(...);
 *   $notices = $reportcardService->notices;
 *  </code>
 */
class Google_Service_Reportcard_Resource_Notices extends Google_Service_Resource
{
  /**
   * Deletes a Notice. (notices.delete)
   *
   * @param string $noticesId The Notice id.
   * @param array $optParams Optional parameters.
   */
  public function delete($noticesId, $optParams = array())
  {
    $params = array('noticesId' => $noticesId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a Notice by id. (notices.get)
   *
   * @param string $noticesId The Notice id.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reportcard_Notice
   */
  public function get($noticesId, $optParams = array())
  {
    $params = array('noticesId' => $noticesId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reportcard_Notice");
  }
  /**
   * Inserts a new Notice. (notices.insert)
   *
   * @param Google_Service_Reportcard_Notice $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reportcard_Notice
   */
  public function insert(Google_Service_Reportcard_Notice $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Reportcard_Notice");
  }
  /**
   * Retrieves a list of Notices, filtering by 'consumer' and maybe hiding muted
   * ones. (notices.listNotices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consumer Only return Notices for these consumers
   * @opt_param bool showMuted If set, show Notices that have been muted.
   * @return Google_Service_Reportcard_NoticesListResponse
   */
  public function listNotices($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Reportcard_NoticesListResponse");
  }
  /**
   * Updates an existing Notice. This method supports patch semantics.
   * (notices.patch)
   *
   * @param string $noticesId The Notice id.
   * @param Google_Service_Reportcard_Notice $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reportcard_Notice
   */
  public function patch($noticesId, Google_Service_Reportcard_Notice $postBody, $optParams = array())
  {
    $params = array('noticesId' => $noticesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Reportcard_Notice");
  }
  /**
   * Updates an existing Notice. (notices.update)
   *
   * @param string $noticesId The Notice id.
   * @param Google_Service_Reportcard_Notice $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reportcard_Notice
   */
  public function update($noticesId, Google_Service_Reportcard_Notice $postBody, $optParams = array())
  {
    $params = array('noticesId' => $noticesId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Reportcard_Notice");
  }
}
