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

class Google_Service_Vault_CorpusQuery extends Google_Model
{
  protected $driveQueryType = 'Google_Service_Vault_HeldDriveQuery';
  protected $driveQueryDataType = '';
  protected $groupsQueryType = 'Google_Service_Vault_HeldGroupsQuery';
  protected $groupsQueryDataType = '';
  protected $mailQueryType = 'Google_Service_Vault_HeldMailQuery';
  protected $mailQueryDataType = '';

  /**
   * @param Google_Service_Vault_HeldDriveQuery
   */
  public function setDriveQuery(Google_Service_Vault_HeldDriveQuery $driveQuery)
  {
    $this->driveQuery = $driveQuery;
  }
  /**
   * @return Google_Service_Vault_HeldDriveQuery
   */
  public function getDriveQuery()
  {
    return $this->driveQuery;
  }
  /**
   * @param Google_Service_Vault_HeldGroupsQuery
   */
  public function setGroupsQuery(Google_Service_Vault_HeldGroupsQuery $groupsQuery)
  {
    $this->groupsQuery = $groupsQuery;
  }
  /**
   * @return Google_Service_Vault_HeldGroupsQuery
   */
  public function getGroupsQuery()
  {
    return $this->groupsQuery;
  }
  /**
   * @param Google_Service_Vault_HeldMailQuery
   */
  public function setMailQuery(Google_Service_Vault_HeldMailQuery $mailQuery)
  {
    $this->mailQuery = $mailQuery;
  }
  /**
   * @return Google_Service_Vault_HeldMailQuery
   */
  public function getMailQuery()
  {
    return $this->mailQuery;
  }
}
