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

class Google_Service_Genomics_VariantCall extends Google_Collection
{
  protected $collection_key = 'genotypeLikelihood';
  public $callSetId;
  public $callSetName;
  public $genotype;
  public $genotypeLikelihood;
  public $info;
  public $phaseset;

  public function setCallSetId($callSetId)
  {
    $this->callSetId = $callSetId;
  }
  public function getCallSetId()
  {
    return $this->callSetId;
  }
  public function setCallSetName($callSetName)
  {
    $this->callSetName = $callSetName;
  }
  public function getCallSetName()
  {
    return $this->callSetName;
  }
  public function setGenotype($genotype)
  {
    $this->genotype = $genotype;
  }
  public function getGenotype()
  {
    return $this->genotype;
  }
  public function setGenotypeLikelihood($genotypeLikelihood)
  {
    $this->genotypeLikelihood = $genotypeLikelihood;
  }
  public function getGenotypeLikelihood()
  {
    return $this->genotypeLikelihood;
  }
  public function setInfo($info)
  {
    $this->info = $info;
  }
  public function getInfo()
  {
    return $this->info;
  }
  public function setPhaseset($phaseset)
  {
    $this->phaseset = $phaseset;
  }
  public function getPhaseset()
  {
    return $this->phaseset;
  }
}
