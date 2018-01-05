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
 * Service definition for Script (v1).
 *
 * <p>
 * An API for managing and executing Google Apps Script projects.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/apps-script/execution/rest/v1/scripts/run" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Script extends Google_Service
{
  /** Read, send, delete, and manage your email. */
  const MAIL_GOOGLE_COM =
      "https://mail.google.com/";
  /** Manage your calendars. */
  const WWW_GOOGLE_COM_CALENDAR_FEEDS =
      "https://www.google.com/calendar/feeds";
  /** Manage your contacts. */
  const WWW_GOOGLE_COM_M8_FEEDS =
      "https://www.google.com/m8/feeds";
  /** View and manage the provisioning of groups on your domain. */
  const ADMIN_DIRECTORY_GROUP =
      "https://www.googleapis.com/auth/admin.directory.group";
  /** View and manage the provisioning of users on your domain. */
  const ADMIN_DIRECTORY_USER =
      "https://www.googleapis.com/auth/admin.directory.user";
  /** View and manage the files in your Google Drive. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage your forms in Google Drive. */
  const FORMS =
      "https://www.googleapis.com/auth/forms";
  /** View and manage forms that this application has been installed in. */
  const FORMS_CURRENTONLY =
      "https://www.googleapis.com/auth/forms.currentonly";
  /** View and manage your Google Groups. */
  const GROUPS =
      "https://www.googleapis.com/auth/groups";
  /** View and manage your spreadsheets in Google Drive. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $scripts;
  
  /**
   * Constructs the internal representation of the Script service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://script.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'script';

    $this->scripts = new Google_Service_Script_Resource_Scripts(
        $this,
        $this->serviceName,
        'scripts',
        array(
          'methods' => array(
            'run' => array(
              'path' => 'v1/scripts/{scriptId}:run',
              'httpMethod' => 'POST',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
