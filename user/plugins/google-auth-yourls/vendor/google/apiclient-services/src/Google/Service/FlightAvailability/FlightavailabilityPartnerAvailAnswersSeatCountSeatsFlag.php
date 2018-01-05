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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersSeatCountSeatsFlag extends Google_Model
{
  public $infinityFlag;
  public $nonOperating;
  public $onRequest;
  public $waitlistClosed;
  public $waitlistOpen;

  public function setInfinityFlag($infinityFlag)
  {
    $this->infinityFlag = $infinityFlag;
  }
  public function getInfinityFlag()
  {
    return $this->infinityFlag;
  }
  public function setNonOperating($nonOperating)
  {
    $this->nonOperating = $nonOperating;
  }
  public function getNonOperating()
  {
    return $this->nonOperating;
  }
  public function setOnRequest($onRequest)
  {
    $this->onRequest = $onRequest;
  }
  public function getOnRequest()
  {
    return $this->onRequest;
  }
  public function setWaitlistClosed($waitlistClosed)
  {
    $this->waitlistClosed = $waitlistClosed;
  }
  public function getWaitlistClosed()
  {
    return $this->waitlistClosed;
  }
  public function setWaitlistOpen($waitlistOpen)
  {
    $this->waitlistOpen = $waitlistOpen;
  }
  public function getWaitlistOpen()
  {
    return $this->waitlistOpen;
  }
}
