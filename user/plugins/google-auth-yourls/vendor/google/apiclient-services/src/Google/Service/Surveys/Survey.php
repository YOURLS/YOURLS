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

class Google_Service_Surveys_Survey extends Google_Collection
{
  protected $collection_key = 'questions';
  protected $audienceType = 'Google_Service_Surveys_SurveyAudience';
  protected $audienceDataType = '';
  protected $costType = 'Google_Service_Surveys_SurveyCost';
  protected $costDataType = '';
  public $customerData;
  public $description;
  public $owners;
  protected $questionsType = 'Google_Service_Surveys_SurveyQuestion';
  protected $questionsDataType = 'array';
  protected $rejectionReasonType = 'Google_Service_Surveys_SurveyRejection';
  protected $rejectionReasonDataType = '';
  public $state;
  public $surveyUrlId;
  public $title;
  public $wantedResponseCount;

  /**
   * @param Google_Service_Surveys_SurveyAudience
   */
  public function setAudience(Google_Service_Surveys_SurveyAudience $audience)
  {
    $this->audience = $audience;
  }
  /**
   * @return Google_Service_Surveys_SurveyAudience
   */
  public function getAudience()
  {
    return $this->audience;
  }
  /**
   * @param Google_Service_Surveys_SurveyCost
   */
  public function setCost(Google_Service_Surveys_SurveyCost $cost)
  {
    $this->cost = $cost;
  }
  /**
   * @return Google_Service_Surveys_SurveyCost
   */
  public function getCost()
  {
    return $this->cost;
  }
  public function setCustomerData($customerData)
  {
    $this->customerData = $customerData;
  }
  public function getCustomerData()
  {
    return $this->customerData;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  public function getOwners()
  {
    return $this->owners;
  }
  /**
   * @param Google_Service_Surveys_SurveyQuestion
   */
  public function setQuestions($questions)
  {
    $this->questions = $questions;
  }
  /**
   * @return Google_Service_Surveys_SurveyQuestion
   */
  public function getQuestions()
  {
    return $this->questions;
  }
  /**
   * @param Google_Service_Surveys_SurveyRejection
   */
  public function setRejectionReason(Google_Service_Surveys_SurveyRejection $rejectionReason)
  {
    $this->rejectionReason = $rejectionReason;
  }
  /**
   * @return Google_Service_Surveys_SurveyRejection
   */
  public function getRejectionReason()
  {
    return $this->rejectionReason;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSurveyUrlId($surveyUrlId)
  {
    $this->surveyUrlId = $surveyUrlId;
  }
  public function getSurveyUrlId()
  {
    return $this->surveyUrlId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setWantedResponseCount($wantedResponseCount)
  {
    $this->wantedResponseCount = $wantedResponseCount;
  }
  public function getWantedResponseCount()
  {
    return $this->wantedResponseCount;
  }
}
