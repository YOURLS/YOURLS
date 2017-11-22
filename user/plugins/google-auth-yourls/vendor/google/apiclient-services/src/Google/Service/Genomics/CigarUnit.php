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

class Google_Service_Genomics_CigarUnit extends Google_Model
{
  public $operation;
  public $operationLength;
  public $referenceSequence;

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }
  public function getOperation()
  {
    return $this->operation;
  }
  public function setOperationLength($operationLength)
  {
    $this->operationLength = $operationLength;
  }
  public function getOperationLength()
  {
    return $this->operationLength;
  }
  public function setReferenceSequence($referenceSequence)
  {
    $this->referenceSequence = $referenceSequence;
  }
  public function getReferenceSequence()
  {
    return $this->referenceSequence;
  }
}
