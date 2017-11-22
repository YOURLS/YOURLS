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

class Google_Service_ShoppingContent_OrderDeliveryDetails extends Google_Model
{
  protected $addressType = 'Google_Service_ShoppingContent_OrderAddress';
  protected $addressDataType = '';
  public $phoneNumber;

  /**
   * @param Google_Service_ShoppingContent_OrderAddress
   */
  public function setAddress(Google_Service_ShoppingContent_OrderAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return Google_Service_ShoppingContent_OrderAddress
   */
  public function getAddress()
  {
    return $this->address;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}
