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

class Google_Service_Books_Notification extends Google_Collection
{
  protected $collection_key = 'crmExperimentIds';
  protected $internal_gapi_mappings = array(
        "docId" => "doc_id",
        "docType" => "doc_type",
        "dontShowNotification" => "dont_show_notification",
        "notificationType" => "notification_type",
        "pcampaignId" => "pcampaign_id",
        "showNotificationSettingsAction" => "show_notification_settings_action",
  );
  public $body;
  public $crmExperimentIds;
  public $docId;
  public $docType;
  public $dontShowNotification;
  public $iconUrl;
  public $kind;
  public $notificationGroup;
  public $notificationType;
  public $pcampaignId;
  public $reason;
  public $showNotificationSettingsAction;
  public $targetUrl;
  public $title;

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setCrmExperimentIds($crmExperimentIds)
  {
    $this->crmExperimentIds = $crmExperimentIds;
  }
  public function getCrmExperimentIds()
  {
    return $this->crmExperimentIds;
  }
  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  public function getDocId()
  {
    return $this->docId;
  }
  public function setDocType($docType)
  {
    $this->docType = $docType;
  }
  public function getDocType()
  {
    return $this->docType;
  }
  public function setDontShowNotification($dontShowNotification)
  {
    $this->dontShowNotification = $dontShowNotification;
  }
  public function getDontShowNotification()
  {
    return $this->dontShowNotification;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNotificationGroup($notificationGroup)
  {
    $this->notificationGroup = $notificationGroup;
  }
  public function getNotificationGroup()
  {
    return $this->notificationGroup;
  }
  public function setNotificationType($notificationType)
  {
    $this->notificationType = $notificationType;
  }
  public function getNotificationType()
  {
    return $this->notificationType;
  }
  public function setPcampaignId($pcampaignId)
  {
    $this->pcampaignId = $pcampaignId;
  }
  public function getPcampaignId()
  {
    return $this->pcampaignId;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  public function setShowNotificationSettingsAction($showNotificationSettingsAction)
  {
    $this->showNotificationSettingsAction = $showNotificationSettingsAction;
  }
  public function getShowNotificationSettingsAction()
  {
    return $this->showNotificationSettingsAction;
  }
  public function setTargetUrl($targetUrl)
  {
    $this->targetUrl = $targetUrl;
  }
  public function getTargetUrl()
  {
    return $this->targetUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
