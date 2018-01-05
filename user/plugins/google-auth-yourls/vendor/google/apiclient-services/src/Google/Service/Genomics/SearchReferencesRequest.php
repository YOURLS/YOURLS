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

class Google_Service_Genomics_SearchReferencesRequest extends Google_Collection
{
  protected $collection_key = 'md5checksums';
  public $accessions;
  public $md5checksums;
  public $pageSize;
  public $pageToken;
  public $referenceSetId;

  public function setAccessions($accessions)
  {
    $this->accessions = $accessions;
  }
  public function getAccessions()
  {
    return $this->accessions;
  }
  public function setMd5checksums($md5checksums)
  {
    $this->md5checksums = $md5checksums;
  }
  public function getMd5checksums()
  {
    return $this->md5checksums;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
}
