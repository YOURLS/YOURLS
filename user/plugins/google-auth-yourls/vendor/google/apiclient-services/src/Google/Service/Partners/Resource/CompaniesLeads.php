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
 * The "leads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $leads = $partnersService->leads;
 *  </code>
 */
class Google_Service_Partners_Resource_CompaniesLeads extends Google_Service_Resource
{
  /**
   * Creates an advertiser lead for the given company ID. (leads.create)
   *
   * @param string $companyId The ID of the company to contact.
   * @param Google_Service_Partners_CreateLeadRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Partners_CreateLeadResponse
   */
  public function create($companyId, Google_Service_Partners_CreateLeadRequest $postBody, $optParams = array())
  {
    $params = array('companyId' => $companyId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Partners_CreateLeadResponse");
  }
}
