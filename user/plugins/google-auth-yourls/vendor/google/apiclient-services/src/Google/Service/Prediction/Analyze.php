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

class Google_Service_Prediction_Analyze extends Google_Collection
{
  protected $collection_key = 'errors';
  protected $dataDescriptionType = 'Google_Service_Prediction_AnalyzeDataDescription';
  protected $dataDescriptionDataType = '';
  public $errors;
  public $id;
  public $kind;
  protected $modelDescriptionType = 'Google_Service_Prediction_AnalyzeModelDescription';
  protected $modelDescriptionDataType = '';
  public $selfLink;

  /**
   * @param Google_Service_Prediction_AnalyzeDataDescription
   */
  public function setDataDescription(Google_Service_Prediction_AnalyzeDataDescription $dataDescription)
  {
    $this->dataDescription = $dataDescription;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeDataDescription
   */
  public function getDataDescription()
  {
    return $this->dataDescription;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
   * @param Google_Service_Prediction_AnalyzeModelDescription
   */
  public function setModelDescription(Google_Service_Prediction_AnalyzeModelDescription $modelDescription)
  {
    $this->modelDescription = $modelDescription;
  }
  /**
   * @return Google_Service_Prediction_AnalyzeModelDescription
   */
  public function getModelDescription()
  {
    return $this->modelDescription;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}
