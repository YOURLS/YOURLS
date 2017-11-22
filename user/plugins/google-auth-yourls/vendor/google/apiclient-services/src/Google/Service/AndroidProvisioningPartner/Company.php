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

class Google_Service_AndroidProvisioningPartner_Company extends Google_Collection
{
  protected $collection_key = 'ownerEmails';
  public $adminEmails;
  public $companyId;
  public $companyName;
  public $name;
  public $ownerEmails;

  public function setAdminEmails($adminEmails)
  {
    $this->adminEmails = $adminEmails;
  }
  public function getAdminEmails()
  {
    return $this->adminEmails;
  }
  public function setCompanyId($companyId)
  {
    $this->companyId = $companyId;
  }
  public function getCompanyId()
  {
    return $this->companyId;
  }
  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  public function getCompanyName()
  {
    return $this->companyName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOwnerEmails($ownerEmails)
  {
    $this->ownerEmails = $ownerEmails;
  }
  public function getOwnerEmails()
  {
    return $this->ownerEmails;
  }
}
