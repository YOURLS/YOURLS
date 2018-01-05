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

class Google_Service_Logging_RequestLog extends Google_Collection
{
  protected $collection_key = 'sourceReference';
  public $appEngineRelease;
  public $appId;
  public $cost;
  public $endTime;
  public $finished;
  public $first;
  public $host;
  public $httpVersion;
  public $instanceId;
  public $instanceIndex;
  public $ip;
  public $latency;
  protected $lineType = 'Google_Service_Logging_LogLine';
  protected $lineDataType = 'array';
  public $megaCycles;
  public $method;
  public $moduleId;
  public $nickname;
  public $pendingTime;
  public $referrer;
  public $requestId;
  public $resource;
  public $responseSize;
  protected $sourceReferenceType = 'Google_Service_Logging_SourceReference';
  protected $sourceReferenceDataType = 'array';
  public $startTime;
  public $status;
  public $taskName;
  public $taskQueueName;
  public $traceId;
  public $urlMapEntry;
  public $userAgent;
  public $versionId;
  public $wasLoadingRequest;

  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  public function getCost()
  {
    return $this->cost;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setFinished($finished)
  {
    $this->finished = $finished;
  }
  public function getFinished()
  {
    return $this->finished;
  }
  public function setFirst($first)
  {
    $this->first = $first;
  }
  public function getFirst()
  {
    return $this->first;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setHttpVersion($httpVersion)
  {
    $this->httpVersion = $httpVersion;
  }
  public function getHttpVersion()
  {
    return $this->httpVersion;
  }
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  public function setInstanceIndex($instanceIndex)
  {
    $this->instanceIndex = $instanceIndex;
  }
  public function getInstanceIndex()
  {
    return $this->instanceIndex;
  }
  public function setIp($ip)
  {
    $this->ip = $ip;
  }
  public function getIp()
  {
    return $this->ip;
  }
  public function setLatency($latency)
  {
    $this->latency = $latency;
  }
  public function getLatency()
  {
    return $this->latency;
  }
  /**
   * @param Google_Service_Logging_LogLine
   */
  public function setLine($line)
  {
    $this->line = $line;
  }
  /**
   * @return Google_Service_Logging_LogLine
   */
  public function getLine()
  {
    return $this->line;
  }
  public function setMegaCycles($megaCycles)
  {
    $this->megaCycles = $megaCycles;
  }
  public function getMegaCycles()
  {
    return $this->megaCycles;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setModuleId($moduleId)
  {
    $this->moduleId = $moduleId;
  }
  public function getModuleId()
  {
    return $this->moduleId;
  }
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  public function getNickname()
  {
    return $this->nickname;
  }
  public function setPendingTime($pendingTime)
  {
    $this->pendingTime = $pendingTime;
  }
  public function getPendingTime()
  {
    return $this->pendingTime;
  }
  public function setReferrer($referrer)
  {
    $this->referrer = $referrer;
  }
  public function getReferrer()
  {
    return $this->referrer;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  public function setResponseSize($responseSize)
  {
    $this->responseSize = $responseSize;
  }
  public function getResponseSize()
  {
    return $this->responseSize;
  }
  /**
   * @param Google_Service_Logging_SourceReference
   */
  public function setSourceReference($sourceReference)
  {
    $this->sourceReference = $sourceReference;
  }
  /**
   * @return Google_Service_Logging_SourceReference
   */
  public function getSourceReference()
  {
    return $this->sourceReference;
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
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  public function getTaskName()
  {
    return $this->taskName;
  }
  public function setTaskQueueName($taskQueueName)
  {
    $this->taskQueueName = $taskQueueName;
  }
  public function getTaskQueueName()
  {
    return $this->taskQueueName;
  }
  public function setTraceId($traceId)
  {
    $this->traceId = $traceId;
  }
  public function getTraceId()
  {
    return $this->traceId;
  }
  public function setUrlMapEntry($urlMapEntry)
  {
    $this->urlMapEntry = $urlMapEntry;
  }
  public function getUrlMapEntry()
  {
    return $this->urlMapEntry;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
  public function setWasLoadingRequest($wasLoadingRequest)
  {
    $this->wasLoadingRequest = $wasLoadingRequest;
  }
  public function getWasLoadingRequest()
  {
    return $this->wasLoadingRequest;
  }
}
