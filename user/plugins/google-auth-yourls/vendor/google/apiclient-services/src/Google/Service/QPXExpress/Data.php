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

class Google_Service_QPXExpress_Data extends Google_Collection
{
  protected $collection_key = 'tax';
  protected $aircraftType = 'Google_Service_QPXExpress_AircraftData';
  protected $aircraftDataType = 'array';
  protected $airportType = 'Google_Service_QPXExpress_AirportData';
  protected $airportDataType = 'array';
  protected $carrierType = 'Google_Service_QPXExpress_CarrierData';
  protected $carrierDataType = 'array';
  protected $cityType = 'Google_Service_QPXExpress_CityData';
  protected $cityDataType = 'array';
  public $kind;
  protected $taxType = 'Google_Service_QPXExpress_TaxData';
  protected $taxDataType = 'array';

  /**
   * @param Google_Service_QPXExpress_AircraftData
   */
  public function setAircraft($aircraft)
  {
    $this->aircraft = $aircraft;
  }
  /**
   * @return Google_Service_QPXExpress_AircraftData
   */
  public function getAircraft()
  {
    return $this->aircraft;
  }
  /**
   * @param Google_Service_QPXExpress_AirportData
   */
  public function setAirport($airport)
  {
    $this->airport = $airport;
  }
  /**
   * @return Google_Service_QPXExpress_AirportData
   */
  public function getAirport()
  {
    return $this->airport;
  }
  /**
   * @param Google_Service_QPXExpress_CarrierData
   */
  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  /**
   * @return Google_Service_QPXExpress_CarrierData
   */
  public function getCarrier()
  {
    return $this->carrier;
  }
  /**
   * @param Google_Service_QPXExpress_CityData
   */
  public function setCity($city)
  {
    $this->city = $city;
  }
  /**
   * @return Google_Service_QPXExpress_CityData
   */
  public function getCity()
  {
    return $this->city;
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
   * @param Google_Service_QPXExpress_TaxData
   */
  public function setTax($tax)
  {
    $this->tax = $tax;
  }
  /**
   * @return Google_Service_QPXExpress_TaxData
   */
  public function getTax()
  {
    return $this->tax;
  }
}
