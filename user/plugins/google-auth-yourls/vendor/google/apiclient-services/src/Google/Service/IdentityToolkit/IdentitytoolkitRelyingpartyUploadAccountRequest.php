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

class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest extends Google_Collection
{
  protected $collection_key = 'users';
  public $allowOverwrite;
  public $blockSize;
  public $cpuMemCost;
  public $delegatedProjectNumber;
  public $dkLen;
  public $hashAlgorithm;
  public $memoryCost;
  public $parallelization;
  public $rounds;
  public $saltSeparator;
  public $sanityCheck;
  public $signerKey;
  public $targetProjectId;
  protected $usersType = 'Google_Service_IdentityToolkit_UserInfo';
  protected $usersDataType = 'array';

  public function setAllowOverwrite($allowOverwrite)
  {
    $this->allowOverwrite = $allowOverwrite;
  }
  public function getAllowOverwrite()
  {
    return $this->allowOverwrite;
  }
  public function setBlockSize($blockSize)
  {
    $this->blockSize = $blockSize;
  }
  public function getBlockSize()
  {
    return $this->blockSize;
  }
  public function setCpuMemCost($cpuMemCost)
  {
    $this->cpuMemCost = $cpuMemCost;
  }
  public function getCpuMemCost()
  {
    return $this->cpuMemCost;
  }
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  public function setDkLen($dkLen)
  {
    $this->dkLen = $dkLen;
  }
  public function getDkLen()
  {
    return $this->dkLen;
  }
  public function setHashAlgorithm($hashAlgorithm)
  {
    $this->hashAlgorithm = $hashAlgorithm;
  }
  public function getHashAlgorithm()
  {
    return $this->hashAlgorithm;
  }
  public function setMemoryCost($memoryCost)
  {
    $this->memoryCost = $memoryCost;
  }
  public function getMemoryCost()
  {
    return $this->memoryCost;
  }
  public function setParallelization($parallelization)
  {
    $this->parallelization = $parallelization;
  }
  public function getParallelization()
  {
    return $this->parallelization;
  }
  public function setRounds($rounds)
  {
    $this->rounds = $rounds;
  }
  public function getRounds()
  {
    return $this->rounds;
  }
  public function setSaltSeparator($saltSeparator)
  {
    $this->saltSeparator = $saltSeparator;
  }
  public function getSaltSeparator()
  {
    return $this->saltSeparator;
  }
  public function setSanityCheck($sanityCheck)
  {
    $this->sanityCheck = $sanityCheck;
  }
  public function getSanityCheck()
  {
    return $this->sanityCheck;
  }
  public function setSignerKey($signerKey)
  {
    $this->signerKey = $signerKey;
  }
  public function getSignerKey()
  {
    return $this->signerKey;
  }
  public function setTargetProjectId($targetProjectId)
  {
    $this->targetProjectId = $targetProjectId;
  }
  public function getTargetProjectId()
  {
    return $this->targetProjectId;
  }
  /**
   * @param Google_Service_IdentityToolkit_UserInfo
   */
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return Google_Service_IdentityToolkit_UserInfo
   */
  public function getUsers()
  {
    return $this->users;
  }
}
