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

class Google_Service_Books_AnnotationLayerSummary extends Google_Model
{
  public $allowedCharacterCount;
  public $limitType;
  public $remainingCharacterCount;

  public function setAllowedCharacterCount($allowedCharacterCount)
  {
    $this->allowedCharacterCount = $allowedCharacterCount;
  }
  public function getAllowedCharacterCount()
  {
    return $this->allowedCharacterCount;
  }
  public function setLimitType($limitType)
  {
    $this->limitType = $limitType;
  }
  public function getLimitType()
  {
    return $this->limitType;
  }
  public function setRemainingCharacterCount($remainingCharacterCount)
  {
    $this->remainingCharacterCount = $remainingCharacterCount;
  }
  public function getRemainingCharacterCount()
  {
    return $this->remainingCharacterCount;
  }
}
