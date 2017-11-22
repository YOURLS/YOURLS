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
 * The "googleServiceAccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storagetransferService = new Google_Service_Storagetransfer(...);
 *   $googleServiceAccounts = $storagetransferService->googleServiceAccounts;
 *  </code>
 */
class Google_Service_Storagetransfer_Resource_GoogleServiceAccounts extends Google_Service_Resource
{
  /**
   * Returns the Google service account that is used by Storage Transfer Service
   * to access buckets in the project where transfers run or in other projects.
   * Each Google service account is associated with one Google Cloud Platform
   * Console project. Users should add this service account to the Google Cloud
   * Storage bucket ACLs to grant access to Storage Transfer Service. This service
   * account is created and owned by Storage Transfer Service and can only be used
   * by Storage Transfer Service. (googleServiceAccounts.get)
   *
   * @param string $projectId The ID of the Google Cloud Platform Console project
   * that the Google service account is associated with. Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_GoogleServiceAccount
   */
  public function get($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storagetransfer_GoogleServiceAccount");
  }
}
