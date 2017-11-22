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

class Google_Service_Books_Usersettings extends Google_Model
{
  public $kind;
  protected $notesExportType = 'Google_Service_Books_UsersettingsNotesExport';
  protected $notesExportDataType = '';
  protected $notificationType = 'Google_Service_Books_UsersettingsNotification';
  protected $notificationDataType = '';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Books_UsersettingsNotesExport
   */
  public function setNotesExport(Google_Service_Books_UsersettingsNotesExport $notesExport)
  {
    $this->notesExport = $notesExport;
  }
  /**
   * @return Google_Service_Books_UsersettingsNotesExport
   */
  public function getNotesExport()
  {
    return $this->notesExport;
  }
  /**
   * @param Google_Service_Books_UsersettingsNotification
   */
  public function setNotification(Google_Service_Books_UsersettingsNotification $notification)
  {
    $this->notification = $notification;
  }
  /**
   * @return Google_Service_Books_UsersettingsNotification
   */
  public function getNotification()
  {
    return $this->notification;
  }
}
