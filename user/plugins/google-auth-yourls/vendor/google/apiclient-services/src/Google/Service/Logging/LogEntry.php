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

class Google_Service_Logging_LogEntry extends Google_Model
{
  protected $httpRequestType = 'Google_Service_Logging_HttpRequest';
  protected $httpRequestDataType = '';
  public $insertId;
  public $jsonPayload;
  public $labels;
  public $logName;
  protected $operationType = 'Google_Service_Logging_LogEntryOperation';
  protected $operationDataType = '';
  public $protoPayload;
  public $receiveTimestamp;
  protected $resourceType = 'Google_Service_Logging_MonitoredResource';
  protected $resourceDataType = '';
  public $severity;
  protected $sourceLocationType = 'Google_Service_Logging_LogEntrySourceLocation';
  protected $sourceLocationDataType = '';
  public $spanId;
  public $textPayload;
  public $timestamp;
  public $trace;

  /**
   * @param Google_Service_Logging_HttpRequest
   */
  public function setHttpRequest(Google_Service_Logging_HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return Google_Service_Logging_HttpRequest
   */
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
  public function setInsertId($insertId)
  {
    $this->insertId = $insertId;
  }
  public function getInsertId()
  {
    return $this->insertId;
  }
  public function setJsonPayload($jsonPayload)
  {
    $this->jsonPayload = $jsonPayload;
  }
  public function getJsonPayload()
  {
    return $this->jsonPayload;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLogName($logName)
  {
    $this->logName = $logName;
  }
  public function getLogName()
  {
    return $this->logName;
  }
  /**
   * @param Google_Service_Logging_LogEntryOperation
   */
  public function setOperation(Google_Service_Logging_LogEntryOperation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return Google_Service_Logging_LogEntryOperation
   */
  public function getOperation()
  {
    return $this->operation;
  }
  public function setProtoPayload($protoPayload)
  {
    $this->protoPayload = $protoPayload;
  }
  public function getProtoPayload()
  {
    return $this->protoPayload;
  }
  public function setReceiveTimestamp($receiveTimestamp)
  {
    $this->receiveTimestamp = $receiveTimestamp;
  }
  public function getReceiveTimestamp()
  {
    return $this->receiveTimestamp;
  }
  /**
   * @param Google_Service_Logging_MonitoredResource
   */
  public function setResource(Google_Service_Logging_MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_Logging_MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param Google_Service_Logging_LogEntrySourceLocation
   */
  public function setSourceLocation(Google_Service_Logging_LogEntrySourceLocation $sourceLocation)
  {
    $this->sourceLocation = $sourceLocation;
  }
  /**
   * @return Google_Service_Logging_LogEntrySourceLocation
   */
  public function getSourceLocation()
  {
    return $this->sourceLocation;
  }
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  public function getSpanId()
  {
    return $this->spanId;
  }
  public function setTextPayload($textPayload)
  {
    $this->textPayload = $textPayload;
  }
  public function getTextPayload()
  {
    return $this->textPayload;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setTrace($trace)
  {
    $this->trace = $trace;
  }
  public function getTrace()
  {
    return $this->trace;
  }
}
