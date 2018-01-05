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

class Google_Service_QPXExpress_TripOptionsRequest extends Google_Collection
{
  protected $collection_key = 'slice';
  public $maxPrice;
  protected $passengersType = 'Google_Service_QPXExpress_PassengerCounts';
  protected $passengersDataType = '';
  public $refundable;
  public $saleCountry;
  protected $sliceType = 'Google_Service_QPXExpress_SliceInput';
  protected $sliceDataType = 'array';
  public $solutions;
  public $ticketingCountry;

  public function setMaxPrice($maxPrice)
  {
    $this->maxPrice = $maxPrice;
  }
  public function getMaxPrice()
  {
    return $this->maxPrice;
  }
  /**
   * @param Google_Service_QPXExpress_PassengerCounts
   */
  public function setPassengers(Google_Service_QPXExpress_PassengerCounts $passengers)
  {
    $this->passengers = $passengers;
  }
  /**
   * @return Google_Service_QPXExpress_PassengerCounts
   */
  public function getPassengers()
  {
    return $this->passengers;
  }
  public function setRefundable($refundable)
  {
    $this->refundable = $refundable;
  }
  public function getRefundable()
  {
    return $this->refundable;
  }
  public function setSaleCountry($saleCountry)
  {
    $this->saleCountry = $saleCountry;
  }
  public function getSaleCountry()
  {
    return $this->saleCountry;
  }
  /**
   * @param Google_Service_QPXExpress_SliceInput
   */
  public function setSlice($slice)
  {
    $this->slice = $slice;
  }
  /**
   * @return Google_Service_QPXExpress_SliceInput
   */
  public function getSlice()
  {
    return $this->slice;
  }
  public function setSolutions($solutions)
  {
    $this->solutions = $solutions;
  }
  public function getSolutions()
  {
    return $this->solutions;
  }
  public function setTicketingCountry($ticketingCountry)
  {
    $this->ticketingCountry = $ticketingCountry;
  }
  public function getTicketingCountry()
  {
    return $this->ticketingCountry;
  }
}
