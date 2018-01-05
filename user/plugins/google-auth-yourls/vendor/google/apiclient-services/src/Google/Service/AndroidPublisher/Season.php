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

class Google_Service_AndroidPublisher_Season extends Google_Collection
{
  protected $collection_key = 'prorations';
  protected $endType = 'Google_Service_AndroidPublisher_MonthDay';
  protected $endDataType = '';
  protected $prorationsType = 'Google_Service_AndroidPublisher_Prorate';
  protected $prorationsDataType = 'array';
  protected $startType = 'Google_Service_AndroidPublisher_MonthDay';
  protected $startDataType = '';

  /**
   * @param Google_Service_AndroidPublisher_MonthDay
   */
  public function setEnd(Google_Service_AndroidPublisher_MonthDay $end)
  {
    $this->end = $end;
  }
  /**
   * @return Google_Service_AndroidPublisher_MonthDay
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param Google_Service_AndroidPublisher_Prorate
   */
  public function setProrations($prorations)
  {
    $this->prorations = $prorations;
  }
  /**
   * @return Google_Service_AndroidPublisher_Prorate
   */
  public function getProrations()
  {
    return $this->prorations;
  }
  /**
   * @param Google_Service_AndroidPublisher_MonthDay
   */
  public function setStart(Google_Service_AndroidPublisher_MonthDay $start)
  {
    $this->start = $start;
  }
  /**
   * @return Google_Service_AndroidPublisher_MonthDay
   */
  public function getStart()
  {
    return $this->start;
  }
}
