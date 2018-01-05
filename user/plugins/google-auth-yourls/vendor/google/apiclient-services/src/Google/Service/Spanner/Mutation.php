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

class Google_Service_Spanner_Mutation extends Google_Model
{
  protected $deleteType = 'Google_Service_Spanner_Delete';
  protected $deleteDataType = '';
  protected $insertType = 'Google_Service_Spanner_Write';
  protected $insertDataType = '';
  protected $insertOrUpdateType = 'Google_Service_Spanner_Write';
  protected $insertOrUpdateDataType = '';
  protected $replaceType = 'Google_Service_Spanner_Write';
  protected $replaceDataType = '';
  protected $updateType = 'Google_Service_Spanner_Write';
  protected $updateDataType = '';

  /**
   * @param Google_Service_Spanner_Delete
   */
  public function setDelete(Google_Service_Spanner_Delete $delete)
  {
    $this->delete = $delete;
  }
  /**
   * @return Google_Service_Spanner_Delete
   */
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param Google_Service_Spanner_Write
   */
  public function setInsert(Google_Service_Spanner_Write $insert)
  {
    $this->insert = $insert;
  }
  /**
   * @return Google_Service_Spanner_Write
   */
  public function getInsert()
  {
    return $this->insert;
  }
  /**
   * @param Google_Service_Spanner_Write
   */
  public function setInsertOrUpdate(Google_Service_Spanner_Write $insertOrUpdate)
  {
    $this->insertOrUpdate = $insertOrUpdate;
  }
  /**
   * @return Google_Service_Spanner_Write
   */
  public function getInsertOrUpdate()
  {
    return $this->insertOrUpdate;
  }
  /**
   * @param Google_Service_Spanner_Write
   */
  public function setReplace(Google_Service_Spanner_Write $replace)
  {
    $this->replace = $replace;
  }
  /**
   * @return Google_Service_Spanner_Write
   */
  public function getReplace()
  {
    return $this->replace;
  }
  /**
   * @param Google_Service_Spanner_Write
   */
  public function setUpdate(Google_Service_Spanner_Write $update)
  {
    $this->update = $update;
  }
  /**
   * @return Google_Service_Spanner_Write
   */
  public function getUpdate()
  {
    return $this->update;
  }
}
