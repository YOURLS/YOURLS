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

class Google_Service_Devprojects_Evaluation extends Google_Collection
{
  protected $collection_key = 'region';
  protected $abuseTypeType = 'Google_Service_Devprojects_AbuseType';
  protected $abuseTypeDataType = '';
  public $backend;
  public $comment;
  protected $featureType = 'Google_Service_Devprojects_Feature';
  protected $featureDataType = 'array';
  public $kind;
  protected $miscDataType = 'Google_Service_Devprojects_NameValuePair';
  protected $miscDataDataType = 'array';
  public $processTimeMillisecs;
  public $processedMicros;
  protected $regionType = 'Google_Service_Devprojects_Region';
  protected $regionDataType = 'array';
  public $score;
  public $status;
  protected $targetType = 'Google_Service_Devprojects_Target';
  protected $targetDataType = '';
  public $timestampMicros;
  public $version;

  public function setAbuseType(Google_Service_Devprojects_AbuseType $abuseType)
  {
    $this->abuseType = $abuseType;
  }
  public function getAbuseType()
  {
    return $this->abuseType;
  }
  public function setBackend($backend)
  {
    $this->backend = $backend;
  }
  public function getBackend()
  {
    return $this->backend;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  public function getFeature()
  {
    return $this->feature;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMiscData($miscData)
  {
    $this->miscData = $miscData;
  }
  public function getMiscData()
  {
    return $this->miscData;
  }
  public function setProcessTimeMillisecs($processTimeMillisecs)
  {
    $this->processTimeMillisecs = $processTimeMillisecs;
  }
  public function getProcessTimeMillisecs()
  {
    return $this->processTimeMillisecs;
  }
  public function setProcessedMicros($processedMicros)
  {
    $this->processedMicros = $processedMicros;
  }
  public function getProcessedMicros()
  {
    return $this->processedMicros;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTarget(Google_Service_Devprojects_Target $target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
