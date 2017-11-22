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

class Google_Service_AnalyticsReporting_SegmentFilter extends Google_Model
{
  public $not;
  protected $sequenceSegmentType = 'Google_Service_AnalyticsReporting_SequenceSegment';
  protected $sequenceSegmentDataType = '';
  protected $simpleSegmentType = 'Google_Service_AnalyticsReporting_SimpleSegment';
  protected $simpleSegmentDataType = '';

  public function setNot($not)
  {
    $this->not = $not;
  }
  public function getNot()
  {
    return $this->not;
  }
  /**
   * @param Google_Service_AnalyticsReporting_SequenceSegment
   */
  public function setSequenceSegment(Google_Service_AnalyticsReporting_SequenceSegment $sequenceSegment)
  {
    $this->sequenceSegment = $sequenceSegment;
  }
  /**
   * @return Google_Service_AnalyticsReporting_SequenceSegment
   */
  public function getSequenceSegment()
  {
    return $this->sequenceSegment;
  }
  /**
   * @param Google_Service_AnalyticsReporting_SimpleSegment
   */
  public function setSimpleSegment(Google_Service_AnalyticsReporting_SimpleSegment $simpleSegment)
  {
    $this->simpleSegment = $simpleSegment;
  }
  /**
   * @return Google_Service_AnalyticsReporting_SimpleSegment
   */
  public function getSimpleSegment()
  {
    return $this->simpleSegment;
  }
}
