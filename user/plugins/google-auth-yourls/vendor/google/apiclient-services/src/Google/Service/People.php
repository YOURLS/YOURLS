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
 * Service definition for People (v1).
 *
 * <p>
 * Provides access to information about profiles and contacts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/people/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_People extends Google_Service
{
  /** Manage your contacts. */
  const CONTACTS =
      "https://www.googleapis.com/auth/contacts";
  /** View your contacts. */
  const CONTACTS_READONLY =
      "https://www.googleapis.com/auth/contacts.readonly";
  /** Know the list of people in your circles, your age range, and language. */
  const PLUS_LOGIN =
      "https://www.googleapis.com/auth/plus.login";
  /** View your street addresses. */
  const USER_ADDRESSES_READ =
      "https://www.googleapis.com/auth/user.addresses.read";
  /** View your complete date of birth. */
  const USER_BIRTHDAY_READ =
      "https://www.googleapis.com/auth/user.birthday.read";
  /** View your email addresses. */
  const USER_EMAILS_READ =
      "https://www.googleapis.com/auth/user.emails.read";
  /** View your phone numbers. */
  const USER_PHONENUMBERS_READ =
      "https://www.googleapis.com/auth/user.phonenumbers.read";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";
  /** View your basic profile info. */
  const USERINFO_PROFILE =
      "https://www.googleapis.com/auth/userinfo.profile";

  public $people;
  public $people_connections;
  
  /**
   * Constructs the internal representation of the People service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://people.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'people';

    $this->people = new Google_Service_People_Resource_People(
        $this,
        $this->serviceName,
        'people',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestMask.includeField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getBatchGet' => array(
              'path' => 'v1/people:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestMask.includeField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'resourceNames' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->people_connections = new Google_Service_People_Resource_PeopleConnections(
        $this,
        $this->serviceName,
        'connections',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+resourceName}/connections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestSyncToken' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'requestMask.includeField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'syncToken' => array(
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
