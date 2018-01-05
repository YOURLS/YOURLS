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

class Google_Service_AndroidManagement_PasswordRequirements extends Google_Model
{
  public $maximumFailedPasswordsForWipe;
  public $passwordExpirationTimeout;
  public $passwordHistoryLength;
  public $passwordMinimumLength;
  public $passwordMinimumLetters;
  public $passwordMinimumLowerCase;
  public $passwordMinimumNonLetter;
  public $passwordMinimumNumeric;
  public $passwordMinimumSymbols;
  public $passwordMinimumUpperCase;
  public $passwordQuality;

  public function setMaximumFailedPasswordsForWipe($maximumFailedPasswordsForWipe)
  {
    $this->maximumFailedPasswordsForWipe = $maximumFailedPasswordsForWipe;
  }
  public function getMaximumFailedPasswordsForWipe()
  {
    return $this->maximumFailedPasswordsForWipe;
  }
  public function setPasswordExpirationTimeout($passwordExpirationTimeout)
  {
    $this->passwordExpirationTimeout = $passwordExpirationTimeout;
  }
  public function getPasswordExpirationTimeout()
  {
    return $this->passwordExpirationTimeout;
  }
  public function setPasswordHistoryLength($passwordHistoryLength)
  {
    $this->passwordHistoryLength = $passwordHistoryLength;
  }
  public function getPasswordHistoryLength()
  {
    return $this->passwordHistoryLength;
  }
  public function setPasswordMinimumLength($passwordMinimumLength)
  {
    $this->passwordMinimumLength = $passwordMinimumLength;
  }
  public function getPasswordMinimumLength()
  {
    return $this->passwordMinimumLength;
  }
  public function setPasswordMinimumLetters($passwordMinimumLetters)
  {
    $this->passwordMinimumLetters = $passwordMinimumLetters;
  }
  public function getPasswordMinimumLetters()
  {
    return $this->passwordMinimumLetters;
  }
  public function setPasswordMinimumLowerCase($passwordMinimumLowerCase)
  {
    $this->passwordMinimumLowerCase = $passwordMinimumLowerCase;
  }
  public function getPasswordMinimumLowerCase()
  {
    return $this->passwordMinimumLowerCase;
  }
  public function setPasswordMinimumNonLetter($passwordMinimumNonLetter)
  {
    $this->passwordMinimumNonLetter = $passwordMinimumNonLetter;
  }
  public function getPasswordMinimumNonLetter()
  {
    return $this->passwordMinimumNonLetter;
  }
  public function setPasswordMinimumNumeric($passwordMinimumNumeric)
  {
    $this->passwordMinimumNumeric = $passwordMinimumNumeric;
  }
  public function getPasswordMinimumNumeric()
  {
    return $this->passwordMinimumNumeric;
  }
  public function setPasswordMinimumSymbols($passwordMinimumSymbols)
  {
    $this->passwordMinimumSymbols = $passwordMinimumSymbols;
  }
  public function getPasswordMinimumSymbols()
  {
    return $this->passwordMinimumSymbols;
  }
  public function setPasswordMinimumUpperCase($passwordMinimumUpperCase)
  {
    $this->passwordMinimumUpperCase = $passwordMinimumUpperCase;
  }
  public function getPasswordMinimumUpperCase()
  {
    return $this->passwordMinimumUpperCase;
  }
  public function setPasswordQuality($passwordQuality)
  {
    $this->passwordQuality = $passwordQuality;
  }
  public function getPasswordQuality()
  {
    return $this->passwordQuality;
  }
}
