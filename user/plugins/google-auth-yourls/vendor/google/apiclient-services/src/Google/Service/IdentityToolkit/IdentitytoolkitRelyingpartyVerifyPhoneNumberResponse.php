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

class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse extends Google_Model
{
  public $expiresIn;
  public $idToken;
  public $isNewUser;
  public $localId;
  public $phoneNumber;
  public $refreshToken;
  public $temporaryProof;
  public $temporaryProofExpiresIn;
  public $verificationProof;
  public $verificationProofExpiresIn;

  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
  public function setIsNewUser($isNewUser)
  {
    $this->isNewUser = $isNewUser;
  }
  public function getIsNewUser()
  {
    return $this->isNewUser;
  }
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  public function getLocalId()
  {
    return $this->localId;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setRefreshToken($refreshToken)
  {
    $this->refreshToken = $refreshToken;
  }
  public function getRefreshToken()
  {
    return $this->refreshToken;
  }
  public function setTemporaryProof($temporaryProof)
  {
    $this->temporaryProof = $temporaryProof;
  }
  public function getTemporaryProof()
  {
    return $this->temporaryProof;
  }
  public function setTemporaryProofExpiresIn($temporaryProofExpiresIn)
  {
    $this->temporaryProofExpiresIn = $temporaryProofExpiresIn;
  }
  public function getTemporaryProofExpiresIn()
  {
    return $this->temporaryProofExpiresIn;
  }
  public function setVerificationProof($verificationProof)
  {
    $this->verificationProof = $verificationProof;
  }
  public function getVerificationProof()
  {
    return $this->verificationProof;
  }
  public function setVerificationProofExpiresIn($verificationProofExpiresIn)
  {
    $this->verificationProofExpiresIn = $verificationProofExpiresIn;
  }
  public function getVerificationProofExpiresIn()
  {
    return $this->verificationProofExpiresIn;
  }
}
