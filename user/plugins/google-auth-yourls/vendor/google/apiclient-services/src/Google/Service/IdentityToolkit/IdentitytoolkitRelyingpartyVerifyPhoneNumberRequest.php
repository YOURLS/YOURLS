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

class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest extends Google_Model
{
  public $code;
  public $idToken;
  public $operation;
  public $phoneNumber;
  public $sessionInfo;
  public $temporaryProof;
  public $verificationProof;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setSessionInfo($sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
  public function setTemporaryProof($temporaryProof)
  {
    $this->temporaryProof = $temporaryProof;
  }
  public function getTemporaryProof()
  {
    return $this->temporaryProof;
  }
  public function setVerificationProof($verificationProof)
  {
    $this->verificationProof = $verificationProof;
  }
  public function getVerificationProof()
  {
    return $this->verificationProof;
  }
}
