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

class Google_Service_Datastore_RunQueryRequest extends Google_Model
{
  protected $gqlQueryType = 'Google_Service_Datastore_GqlQuery';
  protected $gqlQueryDataType = '';
  protected $partitionIdType = 'Google_Service_Datastore_PartitionId';
  protected $partitionIdDataType = '';
  protected $queryType = 'Google_Service_Datastore_Query';
  protected $queryDataType = '';
  protected $readOptionsType = 'Google_Service_Datastore_ReadOptions';
  protected $readOptionsDataType = '';

  /**
   * @param Google_Service_Datastore_GqlQuery
   */
  public function setGqlQuery(Google_Service_Datastore_GqlQuery $gqlQuery)
  {
    $this->gqlQuery = $gqlQuery;
  }
  /**
   * @return Google_Service_Datastore_GqlQuery
   */
  public function getGqlQuery()
  {
    return $this->gqlQuery;
  }
  /**
   * @param Google_Service_Datastore_PartitionId
   */
  public function setPartitionId(Google_Service_Datastore_PartitionId $partitionId)
  {
    $this->partitionId = $partitionId;
  }
  /**
   * @return Google_Service_Datastore_PartitionId
   */
  public function getPartitionId()
  {
    return $this->partitionId;
  }
  /**
   * @param Google_Service_Datastore_Query
   */
  public function setQuery(Google_Service_Datastore_Query $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Datastore_Query
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_Datastore_ReadOptions
   */
  public function setReadOptions(Google_Service_Datastore_ReadOptions $readOptions)
  {
    $this->readOptions = $readOptions;
  }
  /**
   * @return Google_Service_Datastore_ReadOptions
   */
  public function getReadOptions()
  {
    return $this->readOptions;
  }
}
