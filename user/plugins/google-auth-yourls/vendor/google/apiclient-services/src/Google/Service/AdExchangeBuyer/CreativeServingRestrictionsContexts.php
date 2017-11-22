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

class Google_Service_AdExchangeBuyer_CreativeServingRestrictionsContexts extends Google_Collection
{
  protected $collection_key = 'platform';
  public $auctionType;
  public $contextType;
  public $geoCriteriaId;
  public $platform;

  public function setAuctionType($auctionType)
  {
    $this->auctionType = $auctionType;
  }
  public function getAuctionType()
  {
    return $this->auctionType;
  }
  public function setContextType($contextType)
  {
    $this->contextType = $contextType;
  }
  public function getContextType()
  {
    return $this->contextType;
  }
  public function setGeoCriteriaId($geoCriteriaId)
  {
    $this->geoCriteriaId = $geoCriteriaId;
  }
  public function getGeoCriteriaId()
  {
    return $this->geoCriteriaId;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
}
