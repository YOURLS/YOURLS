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

class Google_Service_Books_VolumeseriesinfoVolumeSeries extends Google_Collection
{
  protected $collection_key = 'issue';
  protected $issueType = 'Google_Service_Books_VolumeseriesinfoVolumeSeriesIssue';
  protected $issueDataType = 'array';
  public $orderNumber;
  public $seriesBookType;
  public $seriesId;

  /**
   * @param Google_Service_Books_VolumeseriesinfoVolumeSeriesIssue
   */
  public function setIssue($issue)
  {
    $this->issue = $issue;
  }
  /**
   * @return Google_Service_Books_VolumeseriesinfoVolumeSeriesIssue
   */
  public function getIssue()
  {
    return $this->issue;
  }
  public function setOrderNumber($orderNumber)
  {
    $this->orderNumber = $orderNumber;
  }
  public function getOrderNumber()
  {
    return $this->orderNumber;
  }
  public function setSeriesBookType($seriesBookType)
  {
    $this->seriesBookType = $seriesBookType;
  }
  public function getSeriesBookType()
  {
    return $this->seriesBookType;
  }
  public function setSeriesId($seriesId)
  {
    $this->seriesId = $seriesId;
  }
  public function getSeriesId()
  {
    return $this->seriesId;
  }
}
