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
 * The "associatedEmails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cihService = new Google_Service_Cih(...);
 *   $associatedEmails = $cihService->associatedEmails;
 *  </code>
 */
class Google_Service_Cih_Resource_AssociatedEmails extends Google_Service_Resource
{
  /**
   * Associates an AdWords customer id to an email address.
   * (associatedEmails.create)
   *
   * @param string $customerId The AdWords customer Id the email will be
   * associated to.
   * @param Google_Service_Cih_AssociatedEmail $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cih_AssociatedEmail
   */
  public function create($customerId, Google_Service_Cih_AssociatedEmail $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Cih_AssociatedEmail");
  }
  /**
   * Dissociates an AdWords customer id from an email address.
   * (associatedEmails.delete)
   *
   * @param string $customerId The AdWords customer Id the email will be
   * dissociated from.
   * @param string $emailAddress The email address.
   * @param string $operator The program or person who initiated the operation.
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $emailAddress, $operator, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'emailAddress' => $emailAddress, 'operator' => $operator);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
}
