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
 * The "contacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $contacts = $mirrorService->contacts;
 *  </code>
 */
class Google_Service_Mirror_Resource_Contacts extends Google_Service_Resource
{
  /**
   * Deletes a contact. (contacts.delete)
   *
   * @param string $id The ID of the contact.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a single contact by ID. (contacts.get)
   *
   * @param string $id The ID of the contact.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Contact
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mirror_Contact");
  }
  /**
   * Inserts a new contact. (contacts.insert)
   *
   * @param Google_Service_Mirror_Contact $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Contact
   */
  public function insert(Google_Service_Mirror_Contact $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Mirror_Contact");
  }
  /**
   * Retrieves a list of contacts for the authenticated user.
   * (contacts.listContacts)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_ContactsListResponse
   */
  public function listContacts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mirror_ContactsListResponse");
  }
  /**
   * Updates a contact in place. This method supports patch semantics.
   * (contacts.patch)
   *
   * @param string $id The ID of the contact.
   * @param Google_Service_Mirror_Contact $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Contact
   */
  public function patch($id, Google_Service_Mirror_Contact $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Mirror_Contact");
  }
  /**
   * Updates a contact in place. (contacts.update)
   *
   * @param string $id The ID of the contact.
   * @param Google_Service_Mirror_Contact $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Contact
   */
  public function update($id, Google_Service_Mirror_Contact $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Mirror_Contact");
  }
}
