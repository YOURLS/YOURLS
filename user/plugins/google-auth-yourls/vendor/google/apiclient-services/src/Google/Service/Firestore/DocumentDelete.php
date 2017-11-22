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

class Google_Service_Firestore_DocumentDelete extends Google_Collection
{
  protected $collection_key = 'removedTargetIds';
  public $document;
  public $readTime;
  public $removedTargetIds;

  public function setDocument($document)
  {
    $this->document = $document;
  }
  public function getDocument()
  {
    return $this->document;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setRemovedTargetIds($removedTargetIds)
  {
    $this->removedTargetIds = $removedTargetIds;
  }
  public function getRemovedTargetIds()
  {
    return $this->removedTargetIds;
  }
}
