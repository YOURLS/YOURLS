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

class Google_Service_Partners_ExamStatus extends Google_Model
{
  public $examType;
  public $expiration;
  public $lastPassed;
  public $passed;
  public $taken;
  public $warning;

  public function setExamType($examType)
  {
    $this->examType = $examType;
  }
  public function getExamType()
  {
    return $this->examType;
  }
  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }
  public function getExpiration()
  {
    return $this->expiration;
  }
  public function setLastPassed($lastPassed)
  {
    $this->lastPassed = $lastPassed;
  }
  public function getLastPassed()
  {
    return $this->lastPassed;
  }
  public function setPassed($passed)
  {
    $this->passed = $passed;
  }
  public function getPassed()
  {
    return $this->passed;
  }
  public function setTaken($taken)
  {
    $this->taken = $taken;
  }
  public function getTaken()
  {
    return $this->taken;
  }
  public function setWarning($warning)
  {
    $this->warning = $warning;
  }
  public function getWarning()
  {
    return $this->warning;
  }
}
