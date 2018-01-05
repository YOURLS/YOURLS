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

class Google_Service_CloudBuild_Build extends Google_Collection
{
  protected $collection_key = 'tags';
  public $buildTriggerId;
  public $createTime;
  public $finishTime;
  public $id;
  public $images;
  public $logUrl;
  public $logsBucket;
  protected $optionsType = 'Google_Service_CloudBuild_BuildOptions';
  protected $optionsDataType = '';
  public $projectId;
  protected $resultsType = 'Google_Service_CloudBuild_Results';
  protected $resultsDataType = '';
  protected $secretsType = 'Google_Service_CloudBuild_Secret';
  protected $secretsDataType = 'array';
  protected $sourceType = 'Google_Service_CloudBuild_Source';
  protected $sourceDataType = '';
  protected $sourceProvenanceType = 'Google_Service_CloudBuild_SourceProvenance';
  protected $sourceProvenanceDataType = '';
  public $startTime;
  public $status;
  public $statusDetail;
  protected $stepsType = 'Google_Service_CloudBuild_BuildStep';
  protected $stepsDataType = 'array';
  public $substitutions;
  public $tags;
  public $timeout;

  public function setBuildTriggerId($buildTriggerId)
  {
    $this->buildTriggerId = $buildTriggerId;
  }
  public function getBuildTriggerId()
  {
    return $this->buildTriggerId;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFinishTime($finishTime)
  {
    $this->finishTime = $finishTime;
  }
  public function getFinishTime()
  {
    return $this->finishTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setImages($images)
  {
    $this->images = $images;
  }
  public function getImages()
  {
    return $this->images;
  }
  public function setLogUrl($logUrl)
  {
    $this->logUrl = $logUrl;
  }
  public function getLogUrl()
  {
    return $this->logUrl;
  }
  public function setLogsBucket($logsBucket)
  {
    $this->logsBucket = $logsBucket;
  }
  public function getLogsBucket()
  {
    return $this->logsBucket;
  }
  /**
   * @param Google_Service_CloudBuild_BuildOptions
   */
  public function setOptions(Google_Service_CloudBuild_BuildOptions $options)
  {
    $this->options = $options;
  }
  /**
   * @return Google_Service_CloudBuild_BuildOptions
   */
  public function getOptions()
  {
    return $this->options;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_CloudBuild_Results
   */
  public function setResults(Google_Service_CloudBuild_Results $results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_CloudBuild_Results
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param Google_Service_CloudBuild_Secret
   */
  public function setSecrets($secrets)
  {
    $this->secrets = $secrets;
  }
  /**
   * @return Google_Service_CloudBuild_Secret
   */
  public function getSecrets()
  {
    return $this->secrets;
  }
  /**
   * @param Google_Service_CloudBuild_Source
   */
  public function setSource(Google_Service_CloudBuild_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_CloudBuild_Source
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param Google_Service_CloudBuild_SourceProvenance
   */
  public function setSourceProvenance(Google_Service_CloudBuild_SourceProvenance $sourceProvenance)
  {
    $this->sourceProvenance = $sourceProvenance;
  }
  /**
   * @return Google_Service_CloudBuild_SourceProvenance
   */
  public function getSourceProvenance()
  {
    return $this->sourceProvenance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  /**
   * @param Google_Service_CloudBuild_BuildStep
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return Google_Service_CloudBuild_BuildStep
   */
  public function getSteps()
  {
    return $this->steps;
  }
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
