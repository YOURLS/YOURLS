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

class Google_Service_Vault_Hold extends Google_Collection
{
  protected $collection_key = 'accounts';
  protected $accountsType = 'Google_Service_Vault_HeldAccount';
  protected $accountsDataType = 'array';
  public $corpus;
  public $holdId;
  public $name;
  protected $orgUnitType = 'Google_Service_Vault_HeldOrgUnit';
  protected $orgUnitDataType = '';
  protected $queryType = 'Google_Service_Vault_CorpusQuery';
  protected $queryDataType = '';
  public $updateTime;

  /**
   * @param Google_Service_Vault_HeldAccount
   */
  public function setAccounts($accounts)
  {
    $this->accounts = $accounts;
  }
  /**
   * @return Google_Service_Vault_HeldAccount
   */
  public function getAccounts()
  {
    return $this->accounts;
  }
  public function setCorpus($corpus)
  {
    $this->corpus = $corpus;
  }
  public function getCorpus()
  {
    return $this->corpus;
  }
  public function setHoldId($holdId)
  {
    $this->holdId = $holdId;
  }
  public function getHoldId()
  {
    return $this->holdId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Vault_HeldOrgUnit
   */
  public function setOrgUnit(Google_Service_Vault_HeldOrgUnit $orgUnit)
  {
    $this->orgUnit = $orgUnit;
  }
  /**
   * @return Google_Service_Vault_HeldOrgUnit
   */
  public function getOrgUnit()
  {
    return $this->orgUnit;
  }
  /**
   * @param Google_Service_Vault_CorpusQuery
   */
  public function setQuery(Google_Service_Vault_CorpusQuery $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Vault_CorpusQuery
   */
  public function getQuery()
  {
    return $this->query;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
