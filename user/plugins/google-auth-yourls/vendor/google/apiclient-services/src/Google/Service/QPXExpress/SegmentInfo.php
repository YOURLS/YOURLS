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

class Google_Service_QPXExpress_SegmentInfo extends Google_Collection
{
  protected $collection_key = 'leg';
  public $bookingCode;
  public $bookingCodeCount;
  public $cabin;
  public $connectionDuration;
  public $duration;
  protected $flightType = 'Google_Service_QPXExpress_FlightInfo';
  protected $flightDataType = '';
  public $id;
  public $kind;
  protected $legType = 'Google_Service_QPXExpress_LegInfo';
  protected $legDataType = 'array';
  public $marriedSegmentGroup;
  public $subjectToGovernmentApproval;

  public function setBookingCode($bookingCode)
  {
    $this->bookingCode = $bookingCode;
  }
  public function getBookingCode()
  {
    return $this->bookingCode;
  }
  public function setBookingCodeCount($bookingCodeCount)
  {
    $this->bookingCodeCount = $bookingCodeCount;
  }
  public function getBookingCodeCount()
  {
    return $this->bookingCodeCount;
  }
  public function setCabin($cabin)
  {
    $this->cabin = $cabin;
  }
  public function getCabin()
  {
    return $this->cabin;
  }
  public function setConnectionDuration($connectionDuration)
  {
    $this->connectionDuration = $connectionDuration;
  }
  public function getConnectionDuration()
  {
    return $this->connectionDuration;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param Google_Service_QPXExpress_FlightInfo
   */
  public function setFlight(Google_Service_QPXExpress_FlightInfo $flight)
  {
    $this->flight = $flight;
  }
  /**
   * @return Google_Service_QPXExpress_FlightInfo
   */
  public function getFlight()
  {
    return $this->flight;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
   * @param Google_Service_QPXExpress_LegInfo
   */
  public function setLeg($leg)
  {
    $this->leg = $leg;
  }
  /**
   * @return Google_Service_QPXExpress_LegInfo
   */
  public function getLeg()
  {
    return $this->leg;
  }
  public function setMarriedSegmentGroup($marriedSegmentGroup)
  {
    $this->marriedSegmentGroup = $marriedSegmentGroup;
  }
  public function getMarriedSegmentGroup()
  {
    return $this->marriedSegmentGroup;
  }
  public function setSubjectToGovernmentApproval($subjectToGovernmentApproval)
  {
    $this->subjectToGovernmentApproval = $subjectToGovernmentApproval;
  }
  public function getSubjectToGovernmentApproval()
  {
    return $this->subjectToGovernmentApproval;
  }
}
