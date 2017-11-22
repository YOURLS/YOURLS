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

class Google_Service_Firestore_Target extends Google_Model
{
  protected $documentsType = 'Google_Service_Firestore_DocumentsTarget';
  protected $documentsDataType = '';
  public $once;
  protected $queryType = 'Google_Service_Firestore_QueryTarget';
  protected $queryDataType = '';
  public $readTime;
  public $resumeToken;
  public $targetId;

  /**
   * @param Google_Service_Firestore_DocumentsTarget
   */
  public function setDocuments(Google_Service_Firestore_DocumentsTarget $documents)
  {
    $this->documents = $documents;
  }
  /**
   * @return Google_Service_Firestore_DocumentsTarget
   */
  public function getDocuments()
  {
    return $this->documents;
  }
  public function setOnce($once)
  {
    $this->once = $once;
  }
  public function getOnce()
  {
    return $this->once;
  }
  /**
   * @param Google_Service_Firestore_QueryTarget
   */
  public function setQuery(Google_Service_Firestore_QueryTarget $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Firestore_QueryTarget
   */
  public function getQuery()
  {
    return $this->query;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  public function getTargetId()
  {
    return $this->targetId;
  }
}
