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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswers extends Google_Collection
{
  protected $collection_key = 'answers';
  protected $answersType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersAnswer';
  protected $answersDataType = 'array';
  public $narrative;

  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersAnswer
   */
  public function setAnswers($answers)
  {
    $this->answers = $answers;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswersAnswer
   */
  public function getAnswers()
  {
    return $this->answers;
  }
  public function setNarrative($narrative)
  {
    $this->narrative = $narrative;
  }
  public function getNarrative()
  {
    return $this->narrative;
  }
}
