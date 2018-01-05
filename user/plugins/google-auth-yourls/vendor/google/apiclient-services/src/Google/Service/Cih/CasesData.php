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

class Google_Service_Cih_CasesData extends Google_Model
{
  protected $agentType = 'Google_Service_Cih_CasesInteractionSource';
  protected $agentDataType = '';
  public $assignedGaia;
  public $emailType;
  public $messageId;
  public $state;
  protected $userIdType = 'Google_Service_Cih_UserId';
  protected $userIdDataType = '';

  public function setAgent(Google_Service_Cih_CasesInteractionSource $agent)
  {
    $this->agent = $agent;
  }
  public function getAgent()
  {
    return $this->agent;
  }
  public function setAssignedGaia($assignedGaia)
  {
    $this->assignedGaia = $assignedGaia;
  }
  public function getAssignedGaia()
  {
    return $this->assignedGaia;
  }
  public function setEmailType($emailType)
  {
    $this->emailType = $emailType;
  }
  public function getEmailType()
  {
    return $this->emailType;
  }
  public function setMessageId($messageId)
  {
    $this->messageId = $messageId;
  }
  public function getMessageId()
  {
    return $this->messageId;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUserId(Google_Service_Cih_UserId $userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
