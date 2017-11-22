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

class Google_Service_AnalyticsReporting_Segment extends Google_Model
{
  protected $dynamicSegmentType = 'Google_Service_AnalyticsReporting_DynamicSegment';
  protected $dynamicSegmentDataType = '';
  public $segmentId;

  /**
   * @param Google_Service_AnalyticsReporting_DynamicSegment
   */
  public function setDynamicSegment(Google_Service_AnalyticsReporting_DynamicSegment $dynamicSegment)
  {
    $this->dynamicSegment = $dynamicSegment;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DynamicSegment
   */
  public function getDynamicSegment()
  {
    return $this->dynamicSegment;
  }
  public function setSegmentId($segmentId)
  {
    $this->segmentId = $segmentId;
  }
  public function getSegmentId()
  {
    return $this->segmentId;
  }
}
