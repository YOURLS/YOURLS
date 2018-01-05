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

class Google_Service_Firestore_BatchGetDocumentsResponse extends Google_Model
{
  protected $foundType = 'Google_Service_Firestore_Document';
  protected $foundDataType = '';
  public $missing;
  public $readTime;
  public $transaction;

  /**
   * @param Google_Service_Firestore_Document
   */
  public function setFound(Google_Service_Firestore_Document $found)
  {
    $this->found = $found;
  }
  /**
   * @return Google_Service_Firestore_Document
   */
  public function getFound()
  {
    return $this->found;
  }
  public function setMissing($missing)
  {
    $this->missing = $missing;
  }
  public function getMissing()
  {
    return $this->missing;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setTransaction($transaction)
  {
    $this->transaction = $transaction;
  }
  public function getTransaction()
  {
    return $this->transaction;
  }
}
