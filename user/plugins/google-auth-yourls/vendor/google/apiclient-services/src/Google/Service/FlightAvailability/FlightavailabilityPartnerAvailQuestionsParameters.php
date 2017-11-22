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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsParameters extends Google_Collection
{
  protected $collection_key = 'journeyDataSegments';
  public $carrierPreferredAnswer;
  protected $journeyDataSegmentsType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsSegment';
  protected $journeyDataSegmentsDataType = 'array';
  protected $pointOfSaleType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsPointOfSale';
  protected $pointOfSaleDataType = '';
  public $seamlessAdjustment;

  public function setCarrierPreferredAnswer($carrierPreferredAnswer)
  {
    $this->carrierPreferredAnswer = $carrierPreferredAnswer;
  }
  public function getCarrierPreferredAnswer()
  {
    return $this->carrierPreferredAnswer;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsSegment
   */
  public function setJourneyDataSegments($journeyDataSegments)
  {
    $this->journeyDataSegments = $journeyDataSegments;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsSegment
   */
  public function getJourneyDataSegments()
  {
    return $this->journeyDataSegments;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsPointOfSale
   */
  public function setPointOfSale(Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsPointOfSale $pointOfSale)
  {
    $this->pointOfSale = $pointOfSale;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsPointOfSale
   */
  public function getPointOfSale()
  {
    return $this->pointOfSale;
  }
  public function setSeamlessAdjustment($seamlessAdjustment)
  {
    $this->seamlessAdjustment = $seamlessAdjustment;
  }
  public function getSeamlessAdjustment()
  {
    return $this->seamlessAdjustment;
  }
}
