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

class Google_Service_Dns_Project extends Google_Model
{
  public $id;
  public $kind;
  public $number;
  protected $quotaType = 'Google_Service_Dns_Quota';
  protected $quotaDataType = '';

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
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param Google_Service_Dns_Quota
   */
  public function setQuota(Google_Service_Dns_Quota $quota)
  {
    $this->quota = $quota;
  }
  /**
   * @return Google_Service_Dns_Quota
   */
  public function getQuota()
  {
    return $this->quota;
  }
}
