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

class Google_Service_Bigquery_QueryRequest extends Google_Collection
{
  protected $collection_key = 'queryParameters';
  protected $defaultDatasetType = 'Google_Service_Bigquery_DatasetReference';
  protected $defaultDatasetDataType = '';
  public $dryRun;
  public $kind;
  public $maxResults;
  public $parameterMode;
  public $preserveNulls;
  public $query;
  protected $queryParametersType = 'Google_Service_Bigquery_QueryParameter';
  protected $queryParametersDataType = 'array';
  public $timeoutMs;
  public $useLegacySql;
  public $useQueryCache;

  /**
   * @param Google_Service_Bigquery_DatasetReference
   */
  public function setDefaultDataset(Google_Service_Bigquery_DatasetReference $defaultDataset)
  {
    $this->defaultDataset = $defaultDataset;
  }
  /**
   * @return Google_Service_Bigquery_DatasetReference
   */
  public function getDefaultDataset()
  {
    return $this->defaultDataset;
  }
  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }
  public function getDryRun()
  {
    return $this->dryRun;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxResults($maxResults)
  {
    $this->maxResults = $maxResults;
  }
  public function getMaxResults()
  {
    return $this->maxResults;
  }
  public function setParameterMode($parameterMode)
  {
    $this->parameterMode = $parameterMode;
  }
  public function getParameterMode()
  {
    return $this->parameterMode;
  }
  public function setPreserveNulls($preserveNulls)
  {
    $this->preserveNulls = $preserveNulls;
  }
  public function getPreserveNulls()
  {
    return $this->preserveNulls;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_Bigquery_QueryParameter
   */
  public function setQueryParameters($queryParameters)
  {
    $this->queryParameters = $queryParameters;
  }
  /**
   * @return Google_Service_Bigquery_QueryParameter
   */
  public function getQueryParameters()
  {
    return $this->queryParameters;
  }
  public function setTimeoutMs($timeoutMs)
  {
    $this->timeoutMs = $timeoutMs;
  }
  public function getTimeoutMs()
  {
    return $this->timeoutMs;
  }
  public function setUseLegacySql($useLegacySql)
  {
    $this->useLegacySql = $useLegacySql;
  }
  public function getUseLegacySql()
  {
    return $this->useLegacySql;
  }
  public function setUseQueryCache($useQueryCache)
  {
    $this->useQueryCache = $useQueryCache;
  }
  public function getUseQueryCache()
  {
    return $this->useQueryCache;
  }
}
