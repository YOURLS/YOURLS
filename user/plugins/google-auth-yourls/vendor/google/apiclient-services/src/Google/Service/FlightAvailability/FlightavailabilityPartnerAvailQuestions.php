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

class Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestions extends Google_Collection
{
  protected $collection_key = 'questions';
  protected $parametersType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsParameters';
  protected $parametersDataType = '';
  protected $questionsType = 'Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsQuestion';
  protected $questionsDataType = 'array';

  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsParameters
   */
  public function setParameters(Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsQuestion
   */
  public function setQuestions($questions)
  {
    $this->questions = $questions;
  }
  /**
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestionsQuestion
   */
  public function getQuestions()
  {
    return $this->questions;
  }
}
