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
 * Service definition for Calendar (v3).
 *
 * <p>
 * Manipulates events and other calendar data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/calendar/firstapp" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Calendar extends Google_Service
{
  /** Manage your calendars. */
  const CALENDAR =
      "https://www.googleapis.com/auth/calendar";
  /** View your calendars. */
  const CALENDAR_READONLY =
      "https://www.googleapis.com/auth/calendar.readonly";

  public $acl;
  public $calendarList;
  public $calendars;
  public $channels;
  public $colors;
  public $events;
  public $freebusy;
  public $settings;
  
  /**
   * Constructs the internal representation of the Calendar service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'calendar/v3/';
    $this->version = 'v3';
    $this->serviceName = 'calendar';

    $this->acl = new Google_Service_Calendar_Resource_Acl(
        $this,
        $this->serviceName,
        'acl',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ruleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ruleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'calendars/{calendarId}/acl',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'calendars/{calendarId}/acl',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ruleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ruleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'watch' => array(
              'path' => 'calendars/{calendarId}/acl/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->calendarList = new Google_Service_Calendar_Resource_CalendarList(
        $this,
        $this->serviceName,
        'calendarList',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'users/me/calendarList',
              'httpMethod' => 'POST',
              'parameters' => array(
                'colorRgbFormat' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'users/me/calendarList',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'minAccessRole' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'showHidden' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'colorRgbFormat' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'colorRgbFormat' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'watch' => array(
              'path' => 'users/me/calendarList/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'minAccessRole' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'showHidden' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->calendars = new Google_Service_Calendar_Resource_Calendars(
        $this,
        $this->serviceName,
        'calendars',
        array(
          'methods' => array(
            'clear' => array(
              'path' => 'calendars/{calendarId}/clear',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'calendars',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'patch' => array(
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Calendar_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'stop' => array(
              'path' => 'channels/stop',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->colors = new Google_Service_Calendar_Resource_Colors(
        $this,
        $this->serviceName,
        'colors',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'colors',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->events = new Google_Service_Calendar_Resource_Events(
        $this,
        $this->serviceName,
        'events',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'timeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'import' => array(
              'path' => 'calendars/{calendarId}/events/import',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'supportsAttachments' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'insert' => array(
              'path' => 'calendars/{calendarId}/events',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsAttachments' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'instances' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}/instances',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'originalStart' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'timeMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'calendars/{calendarId}/events',
              'httpMethod' => 'GET',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'iCalUID' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'privateExtendedProperty' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sharedExtendedProperty' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'showHiddenInvitations' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'singleEvents' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'move' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}/move',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destination' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'patch' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsAttachments' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'quickAdd' => array(
              'path' => 'calendars/{calendarId}/events/quickAdd',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'text' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'sendNotifications' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'supportsAttachments' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'watch' => array(
              'path' => 'calendars/{calendarId}/events/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'calendarId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alwaysIncludeEmail' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'iCalUID' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxAttendees' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'privateExtendedProperty' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sharedExtendedProperty' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'showHiddenInvitations' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'singleEvents' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'timeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->freebusy = new Google_Service_Calendar_Resource_Freebusy(
        $this,
        $this->serviceName,
        'freebusy',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'freeBusy',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->settings = new Google_Service_Calendar_Resource_Settings(
        $this,
        $this->serviceName,
        'settings',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'users/me/settings/{setting}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'setting' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'users/me/settings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'syncToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'watch' => array(
              'path' => 'users/me/settings/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
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
