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
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $events = $calendarService->events;
 *  </code>
 */
class Google_Service_Calendar_Resource_Events extends Google_Service_Resource
{
  /**
   * Deletes an event. (events.delete)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * deletion of the event. Optional. The default is False.
   */
  public function delete($calendarId, $eventId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Returns an event. (events.get)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @return Google_Service_Calendar_Event
   */
  public function get($calendarId, $eventId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Imports an event. This operation is used to add a private copy of an existing
   * event to a calendar. (events.import)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Google_Service_Calendar_Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function import($calendarId, Google_Service_Calendar_Event $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Creates an event. (events.insert)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Google_Service_Calendar_Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Whether to send notifications about the
   * creation of the new event. Optional. The default is False.
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function insert($calendarId, Google_Service_Calendar_Event $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Returns instances of the specified recurring event. (events.instances)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Recurring event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. By default the value is 250 events. The page size can never be larger
   * than 2500 events. Optional.
   * @opt_param string originalStart The original start time of the instance in
   * the result. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * will still be included if singleEvents is False. Optional. The default is
   * False.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset.
   * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @return Google_Service_Calendar_Events
   */
  public function instances($calendarId, $eventId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
    $params = array_merge($params, $optParams);
    return $this->call('instances', array($params), "Google_Service_Calendar_Events");
  }
  /**
   * Returns events on the specified calendar. (events.listEvents)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
   * included in the response. Optional.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. The number of events in the resulting page may be less than this value,
   * or none at all, even if there are more events matching the query. Incomplete
   * pages can be detected by a non-empty nextPageToken field in the response. By
   * default the value is 250 events. The page size can never be larger than 2500
   * events. Optional.
   * @opt_param string orderBy The order of the events returned in the result.
   * Optional. The default is an unspecified, stable order.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string privateExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only private properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param string q Free text search terms to find events that match these
   * terms in any field, except for extended properties. Optional.
   * @opt_param string sharedExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only shared properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * (but not the underlying recurring event) will still be included if
   * showDeleted and singleEvents are both False. If showDeleted and singleEvents
   * are both True, only single instances of deleted events (but not the
   * underlying recurring events) are returned. Optional. The default is False.
   * @opt_param bool showHiddenInvitations Whether to include hidden invitations
   * in the result. Optional. The default is False.
   * @opt_param bool singleEvents Whether to expand recurring events into
   * instances and only return single one-off events and instances of recurring
   * events, but not the underlying recurring events themselves. Optional. The
   * default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All events deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. There are
   * several query parameters that cannot be specified together with nextSyncToken
   * to ensure consistency of the client state.
   *
   * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
   * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
   * expires, the server will respond with a 410 GONE response code and the client
   * should clear its storage and perform a full synchronization without any
   * syncToken. Learn more about incremental synchronization. Optional. The
   * default is to return all entries.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset, e.g.,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but will be ignored. If timeMin is set, timeMax must be greater than timeMin.
   * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset, e.g.,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but will be ignored. If timeMax is set, timeMin must be smaller than timeMax.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @opt_param string updatedMin Lower bound for an event's last modification
   * time (as a RFC3339 timestamp) to filter by. When specified, entries deleted
   * since this time will always be included regardless of showDeleted. Optional.
   * The default is not to filter by last modification time.
   * @return Google_Service_Calendar_Events
   */
  public function listEvents($calendarId, $optParams = array())
  {
    $params = array('calendarId' => $calendarId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Calendar_Events");
  }
  /**
   * Moves an event to another calendar, i.e. changes an event's organizer.
   * (events.move)
   *
   * @param string $calendarId Calendar identifier of the source calendar where
   * the event currently is on.
   * @param string $eventId Event identifier.
   * @param string $destination Calendar identifier of the target calendar where
   * the event is to be moved to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * change of the event's organizer. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function move($calendarId, $eventId, $destination, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'destination' => $destination);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Updates an event. This method supports patch semantics. (events.patch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param Google_Service_Calendar_Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Whether to send notifications about the
   * event update (e.g. attendee's responses, title changes, etc.). Optional. The
   * default is False.
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function patch($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Creates an event based on a simple text string. (events.quickAdd)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $text The text describing the event to be created.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Whether to send notifications about the
   * creation of the event. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function quickAdd($calendarId, $text, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'text' => $text);
    $params = array_merge($params, $optParams);
    return $this->call('quickAdd', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Updates an event. (events.update)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param Google_Service_Calendar_Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Whether to send notifications about the
   * event update (e.g. attendee's responses, title changes, etc.). Optional. The
   * default is False.
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Google_Service_Calendar_Event
   */
  public function update($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Calendar_Event");
  }
  /**
   * Watch for changes to Events resources. (events.watch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Google_Service_Calendar_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
   * email field for the organizer, creator and attendees, even if no real email
   * is available (i.e. a generated, non-working value will be provided). The use
   * of this option is discouraged and should only be used by clients which cannot
   * handle the absence of an email address value in the mentioned places.
   * Optional. The default is False.
   * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
   * included in the response. Optional.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. The number of events in the resulting page may be less than this value,
   * or none at all, even if there are more events matching the query. Incomplete
   * pages can be detected by a non-empty nextPageToken field in the response. By
   * default the value is 250 events. The page size can never be larger than 2500
   * events. Optional.
   * @opt_param string orderBy The order of the events returned in the result.
   * Optional. The default is an unspecified, stable order.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string privateExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only private properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param string q Free text search terms to find events that match these
   * terms in any field, except for extended properties. Optional.
   * @opt_param string sharedExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only shared properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * (but not the underlying recurring event) will still be included if
   * showDeleted and singleEvents are both False. If showDeleted and singleEvents
   * are both True, only single instances of deleted events (but not the
   * underlying recurring events) are returned. Optional. The default is False.
   * @opt_param bool showHiddenInvitations Whether to include hidden invitations
   * in the result. Optional. The default is False.
   * @opt_param bool singleEvents Whether to expand recurring events into
   * instances and only return single one-off events and instances of recurring
   * events, but not the underlying recurring events themselves. Optional. The
   * default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All events deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. There are
   * several query parameters that cannot be specified together with nextSyncToken
   * to ensure consistency of the client state.
   *
   * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
   * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
   * expires, the server will respond with a 410 GONE response code and the client
   * should clear its storage and perform a full synchronization without any
   * syncToken. Learn more about incremental synchronization. Optional. The
   * default is to return all entries.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset, e.g.,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but will be ignored. If timeMin is set, timeMax must be greater than timeMin.
   * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset, e.g.,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but will be ignored. If timeMax is set, timeMin must be smaller than timeMax.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @opt_param string updatedMin Lower bound for an event's last modification
   * time (as a RFC3339 timestamp) to filter by. When specified, entries deleted
   * since this time will always be included regardless of showDeleted. Optional.
   * The default is not to filter by last modification time.
   * @return Google_Service_Calendar_Channel
   */
  public function watch($calendarId, Google_Service_Calendar_Channel $postBody, $optParams = array())
  {
    $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Calendar_Channel");
  }
}
