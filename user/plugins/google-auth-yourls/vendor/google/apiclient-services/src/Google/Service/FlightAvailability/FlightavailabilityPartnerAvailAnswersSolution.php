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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersSolution extends Google_Collection
{
  protected $collection_key = 'segmentCounts';
  protected $constraintsType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraints';
  protected $constraintsDataType = '';
  public $narrative;
  protected $segmentCountsType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersSegmentCounts';
  protected $segmentCountsDataType = 'array';
  public $timestampTime;

  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraints
   */
  public function setConstraints(Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraints $constraints)
  {
    $this->constraints = $constraints;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraints
   */
  public function getConstraints()
  {
    return $this->constraints;
  }
  public function setNarrative($narrative)
  {
    $this->narrative = $narrative;
  }
  public function getNarrative()
  {
    return $this->narrative;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersSegmentCounts
   */
  public function setSegmentCounts($segmentCounts)
  {
    $this->segmentCounts = $segmentCounts;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersSegmentCounts
   */
  public function getSegmentCounts()
  {
    return $this->segmentCounts;
  }
  public function setTimestampTime($timestampTime)
  {
    $this->timestampTime = $timestampTime;
  }
  public function getTimestampTime()
  {
    return $this->timestampTime;
  }
}
