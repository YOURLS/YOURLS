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

class Google_Service_Genomics_Variant extends Google_Collection
{
  protected $collection_key = 'names';
  public $alternateBases;
  protected $callsType = 'Google_Service_Genomics_VariantCall';
  protected $callsDataType = 'array';
  public $created;
  public $end;
  public $filter;
  public $id;
  public $info;
  public $names;
  public $quality;
  public $referenceBases;
  public $referenceName;
  public $start;
  public $variantSetId;

  public function setAlternateBases($alternateBases)
  {
    $this->alternateBases = $alternateBases;
  }
  public function getAlternateBases()
  {
    return $this->alternateBases;
  }
  /**
   * @param Google_Service_Genomics_VariantCall
   */
  public function setCalls($calls)
  {
    $this->calls = $calls;
  }
  /**
   * @return Google_Service_Genomics_VariantCall
   */
  public function getCalls()
  {
    return $this->calls;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInfo($info)
  {
    $this->info = $info;
  }
  public function getInfo()
  {
    return $this->info;
  }
  public function setNames($names)
  {
    $this->names = $names;
  }
  public function getNames()
  {
    return $this->names;
  }
  public function setQuality($quality)
  {
    $this->quality = $quality;
  }
  public function getQuality()
  {
    return $this->quality;
  }
  public function setReferenceBases($referenceBases)
  {
    $this->referenceBases = $referenceBases;
  }
  public function getReferenceBases()
  {
    return $this->referenceBases;
  }
  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }
  public function getReferenceName()
  {
    return $this->referenceName;
  }
  public function setStart($start)
  {
    $this->start = $start;
  }
  public function getStart()
  {
    return $this->start;
  }
  public function setVariantSetId($variantSetId)
  {
    $this->variantSetId = $variantSetId;
  }
  public function getVariantSetId()
  {
    return $this->variantSetId;
  }
}
