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

class Google_Service_Proximitybeacon_EphemeralIdRegistration extends Google_Model
{
  public $beaconEcdhPublicKey;
  public $beaconIdentityKey;
  public $initialClockValue;
  public $initialEid;
  public $rotationPeriodExponent;
  public $serviceEcdhPublicKey;

  public function setBeaconEcdhPublicKey($beaconEcdhPublicKey)
  {
    $this->beaconEcdhPublicKey = $beaconEcdhPublicKey;
  }
  public function getBeaconEcdhPublicKey()
  {
    return $this->beaconEcdhPublicKey;
  }
  public function setBeaconIdentityKey($beaconIdentityKey)
  {
    $this->beaconIdentityKey = $beaconIdentityKey;
  }
  public function getBeaconIdentityKey()
  {
    return $this->beaconIdentityKey;
  }
  public function setInitialClockValue($initialClockValue)
  {
    $this->initialClockValue = $initialClockValue;
  }
  public function getInitialClockValue()
  {
    return $this->initialClockValue;
  }
  public function setInitialEid($initialEid)
  {
    $this->initialEid = $initialEid;
  }
  public function getInitialEid()
  {
    return $this->initialEid;
  }
  public function setRotationPeriodExponent($rotationPeriodExponent)
  {
    $this->rotationPeriodExponent = $rotationPeriodExponent;
  }
  public function getRotationPeriodExponent()
  {
    return $this->rotationPeriodExponent;
  }
  public function setServiceEcdhPublicKey($serviceEcdhPublicKey)
  {
    $this->serviceEcdhPublicKey = $serviceEcdhPublicKey;
  }
  public function getServiceEcdhPublicKey()
  {
    return $this->serviceEcdhPublicKey;
  }
}
