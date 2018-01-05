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

class Google_Service_Spanner_TransactionSelector extends Google_Model
{
  protected $beginType = 'Google_Service_Spanner_TransactionOptions';
  protected $beginDataType = '';
  public $id;
  protected $singleUseType = 'Google_Service_Spanner_TransactionOptions';
  protected $singleUseDataType = '';

  /**
   * @param Google_Service_Spanner_TransactionOptions
   */
  public function setBegin(Google_Service_Spanner_TransactionOptions $begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return Google_Service_Spanner_TransactionOptions
   */
  public function getBegin()
  {
    return $this->begin;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Spanner_TransactionOptions
   */
  public function setSingleUse(Google_Service_Spanner_TransactionOptions $singleUse)
  {
    $this->singleUse = $singleUse;
  }
  /**
   * @return Google_Service_Spanner_TransactionOptions
   */
  public function getSingleUse()
  {
    return $this->singleUse;
  }
}
