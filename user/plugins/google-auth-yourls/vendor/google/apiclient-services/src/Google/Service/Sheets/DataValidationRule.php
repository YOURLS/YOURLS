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

class Google_Service_Sheets_DataValidationRule extends Google_Model
{
  protected $conditionType = 'Google_Service_Sheets_BooleanCondition';
  protected $conditionDataType = '';
  public $inputMessage;
  public $showCustomUi;
  public $strict;

  /**
   * @param Google_Service_Sheets_BooleanCondition
   */
  public function setCondition(Google_Service_Sheets_BooleanCondition $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_Sheets_BooleanCondition
   */
  public function getCondition()
  {
    return $this->condition;
  }
  public function setInputMessage($inputMessage)
  {
    $this->inputMessage = $inputMessage;
  }
  public function getInputMessage()
  {
    return $this->inputMessage;
  }
  public function setShowCustomUi($showCustomUi)
  {
    $this->showCustomUi = $showCustomUi;
  }
  public function getShowCustomUi()
  {
    return $this->showCustomUi;
  }
  public function setStrict($strict)
  {
    $this->strict = $strict;
  }
  public function getStrict()
  {
    return $this->strict;
  }
}
