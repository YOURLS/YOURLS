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

class Google_Service_Datastore_QueryResultBatch extends Google_Collection
{
  protected $collection_key = 'entityResults';
  public $endCursor;
  public $entityResultType;
  protected $entityResultsType = 'Google_Service_Datastore_EntityResult';
  protected $entityResultsDataType = 'array';
  public $moreResults;
  public $skippedCursor;
  public $skippedResults;
  public $snapshotVersion;

  public function setEndCursor($endCursor)
  {
    $this->endCursor = $endCursor;
  }
  public function getEndCursor()
  {
    return $this->endCursor;
  }
  public function setEntityResultType($entityResultType)
  {
    $this->entityResultType = $entityResultType;
  }
  public function getEntityResultType()
  {
    return $this->entityResultType;
  }
  /**
   * @param Google_Service_Datastore_EntityResult
   */
  public function setEntityResults($entityResults)
  {
    $this->entityResults = $entityResults;
  }
  /**
   * @return Google_Service_Datastore_EntityResult
   */
  public function getEntityResults()
  {
    return $this->entityResults;
  }
  public function setMoreResults($moreResults)
  {
    $this->moreResults = $moreResults;
  }
  public function getMoreResults()
  {
    return $this->moreResults;
  }
  public function setSkippedCursor($skippedCursor)
  {
    $this->skippedCursor = $skippedCursor;
  }
  public function getSkippedCursor()
  {
    return $this->skippedCursor;
  }
  public function setSkippedResults($skippedResults)
  {
    $this->skippedResults = $skippedResults;
  }
  public function getSkippedResults()
  {
    return $this->skippedResults;
  }
  public function setSnapshotVersion($snapshotVersion)
  {
    $this->snapshotVersion = $snapshotVersion;
  }
  public function getSnapshotVersion()
  {
    return $this->snapshotVersion;
  }
}
