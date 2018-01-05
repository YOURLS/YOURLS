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

class Google_Service_Surveys_SurveyQuestion extends Google_Collection
{
  protected $collection_key = 'thresholdAnswers';
  public $answerOrder;
  public $answers;
  public $hasOther;
  public $highValueLabel;
  protected $imagesType = 'Google_Service_Surveys_SurveyQuestionImage';
  protected $imagesDataType = 'array';
  public $lastAnswerPositionPinned;
  public $lowValueLabel;
  public $mustPickSuggestion;
  public $numStars;
  public $openTextPlaceholder;
  public $openTextSuggestions;
  public $question;
  public $sentimentText;
  public $singleLineResponse;
  public $thresholdAnswers;
  public $type;
  public $unitOfMeasurementLabel;
  public $videoId;

  public function setAnswerOrder($answerOrder)
  {
    $this->answerOrder = $answerOrder;
  }
  public function getAnswerOrder()
  {
    return $this->answerOrder;
  }
  public function setAnswers($answers)
  {
    $this->answers = $answers;
  }
  public function getAnswers()
  {
    return $this->answers;
  }
  public function setHasOther($hasOther)
  {
    $this->hasOther = $hasOther;
  }
  public function getHasOther()
  {
    return $this->hasOther;
  }
  public function setHighValueLabel($highValueLabel)
  {
    $this->highValueLabel = $highValueLabel;
  }
  public function getHighValueLabel()
  {
    return $this->highValueLabel;
  }
  /**
   * @param Google_Service_Surveys_SurveyQuestionImage
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return Google_Service_Surveys_SurveyQuestionImage
   */
  public function getImages()
  {
    return $this->images;
  }
  public function setLastAnswerPositionPinned($lastAnswerPositionPinned)
  {
    $this->lastAnswerPositionPinned = $lastAnswerPositionPinned;
  }
  public function getLastAnswerPositionPinned()
  {
    return $this->lastAnswerPositionPinned;
  }
  public function setLowValueLabel($lowValueLabel)
  {
    $this->lowValueLabel = $lowValueLabel;
  }
  public function getLowValueLabel()
  {
    return $this->lowValueLabel;
  }
  public function setMustPickSuggestion($mustPickSuggestion)
  {
    $this->mustPickSuggestion = $mustPickSuggestion;
  }
  public function getMustPickSuggestion()
  {
    return $this->mustPickSuggestion;
  }
  public function setNumStars($numStars)
  {
    $this->numStars = $numStars;
  }
  public function getNumStars()
  {
    return $this->numStars;
  }
  public function setOpenTextPlaceholder($openTextPlaceholder)
  {
    $this->openTextPlaceholder = $openTextPlaceholder;
  }
  public function getOpenTextPlaceholder()
  {
    return $this->openTextPlaceholder;
  }
  public function setOpenTextSuggestions($openTextSuggestions)
  {
    $this->openTextSuggestions = $openTextSuggestions;
  }
  public function getOpenTextSuggestions()
  {
    return $this->openTextSuggestions;
  }
  public function setQuestion($question)
  {
    $this->question = $question;
  }
  public function getQuestion()
  {
    return $this->question;
  }
  public function setSentimentText($sentimentText)
  {
    $this->sentimentText = $sentimentText;
  }
  public function getSentimentText()
  {
    return $this->sentimentText;
  }
  public function setSingleLineResponse($singleLineResponse)
  {
    $this->singleLineResponse = $singleLineResponse;
  }
  public function getSingleLineResponse()
  {
    return $this->singleLineResponse;
  }
  public function setThresholdAnswers($thresholdAnswers)
  {
    $this->thresholdAnswers = $thresholdAnswers;
  }
  public function getThresholdAnswers()
  {
    return $this->thresholdAnswers;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUnitOfMeasurementLabel($unitOfMeasurementLabel)
  {
    $this->unitOfMeasurementLabel = $unitOfMeasurementLabel;
  }
  public function getUnitOfMeasurementLabel()
  {
    return $this->unitOfMeasurementLabel;
  }
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  public function getVideoId()
  {
    return $this->videoId;
  }
}
