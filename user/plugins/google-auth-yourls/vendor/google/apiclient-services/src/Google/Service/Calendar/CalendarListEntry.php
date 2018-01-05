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

class Google_Service_Calendar_CalendarListEntry extends Google_Collection
{
  protected $collection_key = 'defaultReminders';
  public $accessRole;
  public $backgroundColor;
  public $colorId;
  protected $defaultRemindersType = 'Google_Service_Calendar_EventReminder';
  protected $defaultRemindersDataType = 'array';
  public $deleted;
  public $description;
  public $etag;
  public $foregroundColor;
  public $hidden;
  public $id;
  public $kind;
  public $location;
  protected $notificationSettingsType = 'Google_Service_Calendar_CalendarListEntryNotificationSettings';
  protected $notificationSettingsDataType = '';
  public $primary;
  public $selected;
  public $summary;
  public $summaryOverride;
  public $timeZone;

  public function setAccessRole($accessRole)
  {
    $this->accessRole = $accessRole;
  }
  public function getAccessRole()
  {
    return $this->accessRole;
  }
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  public function setColorId($colorId)
  {
    $this->colorId = $colorId;
  }
  public function getColorId()
  {
    return $this->colorId;
  }
  /**
   * @param Google_Service_Calendar_EventReminder
   */
  public function setDefaultReminders($defaultReminders)
  {
    $this->defaultReminders = $defaultReminders;
  }
  /**
   * @return Google_Service_Calendar_EventReminder
   */
  public function getDefaultReminders()
  {
    return $this->defaultReminders;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setForegroundColor($foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  public function getHidden()
  {
    return $this->hidden;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Calendar_CalendarListEntryNotificationSettings
   */
  public function setNotificationSettings(Google_Service_Calendar_CalendarListEntryNotificationSettings $notificationSettings)
  {
    $this->notificationSettings = $notificationSettings;
  }
  /**
   * @return Google_Service_Calendar_CalendarListEntryNotificationSettings
   */
  public function getNotificationSettings()
  {
    return $this->notificationSettings;
  }
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  public function getPrimary()
  {
    return $this->primary;
  }
  public function setSelected($selected)
  {
    $this->selected = $selected;
  }
  public function getSelected()
  {
    return $this->selected;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
  public function setSummaryOverride($summaryOverride)
  {
    $this->summaryOverride = $summaryOverride;
  }
  public function getSummaryOverride()
  {
    return $this->summaryOverride;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
