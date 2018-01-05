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

class Google_Service_Reports_UsageReport extends Google_Collection
{
  protected $collection_key = 'parameters';
  public $date;
  protected $entityType = 'Google_Service_Reports_UsageReportEntity';
  protected $entityDataType = '';
  public $etag;
  public $kind;
  protected $parametersType = 'Google_Service_Reports_UsageReportParameters';
  protected $parametersDataType = 'array';

  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param Google_Service_Reports_UsageReportEntity
   */
  public function setEntity(Google_Service_Reports_UsageReportEntity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return Google_Service_Reports_UsageReportEntity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Reports_UsageReportParameters
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_Reports_UsageReportParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}
