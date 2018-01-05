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

class Google_Service_Vault_AddMatterPermissionsRequest extends Google_Model
{
  public $ccMe;
  protected $matterPermissionType = 'Google_Service_Vault_MatterPermission';
  protected $matterPermissionDataType = '';
  public $sendEmails;

  public function setCcMe($ccMe)
  {
    $this->ccMe = $ccMe;
  }
  public function getCcMe()
  {
    return $this->ccMe;
  }
  /**
   * @param Google_Service_Vault_MatterPermission
   */
  public function setMatterPermission(Google_Service_Vault_MatterPermission $matterPermission)
  {
    $this->matterPermission = $matterPermission;
  }
  /**
   * @return Google_Service_Vault_MatterPermission
   */
  public function getMatterPermission()
  {
    return $this->matterPermission;
  }
  public function setSendEmails($sendEmails)
  {
    $this->sendEmails = $sendEmails;
  }
  public function getSendEmails()
  {
    return $this->sendEmails;
  }
}
