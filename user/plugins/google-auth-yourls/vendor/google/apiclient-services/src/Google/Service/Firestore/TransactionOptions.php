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

class Google_Service_Firestore_TransactionOptions extends Google_Model
{
  protected $readOnlyType = 'Google_Service_Firestore_ReadOnly';
  protected $readOnlyDataType = '';
  protected $readWriteType = 'Google_Service_Firestore_ReadWrite';
  protected $readWriteDataType = '';

  /**
   * @param Google_Service_Firestore_ReadOnly
   */
  public function setReadOnly(Google_Service_Firestore_ReadOnly $readOnly)
  {
    $this->readOnly = $readOnly;
  }
  /**
   * @return Google_Service_Firestore_ReadOnly
   */
  public function getReadOnly()
  {
    return $this->readOnly;
  }
  /**
   * @param Google_Service_Firestore_ReadWrite
   */
  public function setReadWrite(Google_Service_Firestore_ReadWrite $readWrite)
  {
    $this->readWrite = $readWrite;
  }
  /**
   * @return Google_Service_Firestore_ReadWrite
   */
  public function getReadWrite()
  {
    return $this->readWrite;
  }
}
