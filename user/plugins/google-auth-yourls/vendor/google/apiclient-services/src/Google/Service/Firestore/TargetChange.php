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

class Google_Service_Firestore_TargetChange extends Google_Collection
{
  protected $collection_key = 'targetIds';
  protected $causeType = 'Google_Service_Firestore_Status';
  protected $causeDataType = '';
  public $readTime;
  public $resumeToken;
  public $targetChangeType;
  public $targetIds;

  /**
   * @param Google_Service_Firestore_Status
   */
  public function setCause(Google_Service_Firestore_Status $cause)
  {
    $this->cause = $cause;
  }
  /**
   * @return Google_Service_Firestore_Status
   */
  public function getCause()
  {
    return $this->cause;
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
  public function setTargetChangeType($targetChangeType)
  {
    $this->targetChangeType = $targetChangeType;
  }
  public function getTargetChangeType()
  {
    return $this->targetChangeType;
  }
  public function setTargetIds($targetIds)
  {
    $this->targetIds = $targetIds;
  }
  public function getTargetIds()
  {
    return $this->targetIds;
  }
}
