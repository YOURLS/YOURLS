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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraints extends Google_Collection
{
  protected $collection_key = 'sameBookingCodes';
  protected $diffBookingCodesType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence';
  protected $diffBookingCodesDataType = 'array';
  protected $marriedSegmentsType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraint';
  protected $marriedSegmentsDataType = 'array';
  protected $sameBookingCodesType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence';
  protected $sameBookingCodesDataType = 'array';

  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence
   */
  public function setDiffBookingCodes($diffBookingCodes)
  {
    $this->diffBookingCodes = $diffBookingCodes;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence
   */
  public function getDiffBookingCodes()
  {
    return $this->diffBookingCodes;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraint
   */
  public function setMarriedSegments($marriedSegments)
  {
    $this->marriedSegments = $marriedSegments;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraint
   */
  public function getMarriedSegments()
  {
    return $this->marriedSegments;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence
   */
  public function setSameBookingCodes($sameBookingCodes)
  {
    $this->sameBookingCodes = $sameBookingCodes;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersConstraintWithEquivalence
   */
  public function getSameBookingCodes()
  {
    return $this->sameBookingCodes;
  }
}
