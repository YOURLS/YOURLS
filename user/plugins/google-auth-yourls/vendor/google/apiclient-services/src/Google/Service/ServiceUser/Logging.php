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

class Google_Service_ServiceUser_Logging extends Google_Collection
{
  protected $collection_key = 'producerDestinations';
  protected $consumerDestinationsType = 'Google_Service_ServiceUser_LoggingDestination';
  protected $consumerDestinationsDataType = 'array';
  protected $producerDestinationsType = 'Google_Service_ServiceUser_LoggingDestination';
  protected $producerDestinationsDataType = 'array';

  /**
   * @param Google_Service_ServiceUser_LoggingDestination
   */
  public function setConsumerDestinations($consumerDestinations)
  {
    $this->consumerDestinations = $consumerDestinations;
  }
  /**
   * @return Google_Service_ServiceUser_LoggingDestination
   */
  public function getConsumerDestinations()
  {
    return $this->consumerDestinations;
  }
  /**
   * @param Google_Service_ServiceUser_LoggingDestination
   */
  public function setProducerDestinations($producerDestinations)
  {
    $this->producerDestinations = $producerDestinations;
  }
  /**
   * @return Google_Service_ServiceUser_LoggingDestination
   */
  public function getProducerDestinations()
  {
    return $this->producerDestinations;
  }
}
