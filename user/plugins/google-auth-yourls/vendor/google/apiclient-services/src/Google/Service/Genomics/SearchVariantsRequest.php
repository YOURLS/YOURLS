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

class Google_Service_Genomics_SearchVariantsRequest extends Google_Collection
{
  protected $collection_key = 'variantSetIds';
  public $callSetIds;
  public $end;
  public $maxCalls;
  public $pageSize;
  public $pageToken;
  public $referenceName;
  public $start;
  public $variantName;
  public $variantSetIds;

  public function setCallSetIds($callSetIds)
  {
    $this->callSetIds = $callSetIds;
  }
  public function getCallSetIds()
  {
    return $this->callSetIds;
  }
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setMaxCalls($maxCalls)
  {
    $this->maxCalls = $maxCalls;
  }
  public function getMaxCalls()
  {
    return $this->maxCalls;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
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
  public function setVariantName($variantName)
  {
    $this->variantName = $variantName;
  }
  public function getVariantName()
  {
    return $this->variantName;
  }
  public function setVariantSetIds($variantSetIds)
  {
    $this->variantSetIds = $variantSetIds;
  }
  public function getVariantSetIds()
  {
    return $this->variantSetIds;
  }
}
