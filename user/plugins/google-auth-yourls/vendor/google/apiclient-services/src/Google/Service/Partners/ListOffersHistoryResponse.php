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

class Google_Service_Partners_ListOffersHistoryResponse extends Google_Collection
{
  protected $collection_key = 'offers';
  public $canShowEntireCompany;
  public $nextPageToken;
  protected $offersType = 'Google_Service_Partners_HistoricalOffer';
  protected $offersDataType = 'array';
  protected $responseMetadataType = 'Google_Service_Partners_ResponseMetadata';
  protected $responseMetadataDataType = '';
  public $showingEntireCompany;
  public $totalResults;

  public function setCanShowEntireCompany($canShowEntireCompany)
  {
    $this->canShowEntireCompany = $canShowEntireCompany;
  }
  public function getCanShowEntireCompany()
  {
    return $this->canShowEntireCompany;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param Google_Service_Partners_HistoricalOffer
   */
  public function setOffers($offers)
  {
    $this->offers = $offers;
  }
  /**
   * @return Google_Service_Partners_HistoricalOffer
   */
  public function getOffers()
  {
    return $this->offers;
  }
  /**
   * @param Google_Service_Partners_ResponseMetadata
   */
  public function setResponseMetadata(Google_Service_Partners_ResponseMetadata $responseMetadata)
  {
    $this->responseMetadata = $responseMetadata;
  }
  /**
   * @return Google_Service_Partners_ResponseMetadata
   */
  public function getResponseMetadata()
  {
    return $this->responseMetadata;
  }
  public function setShowingEntireCompany($showingEntireCompany)
  {
    $this->showingEntireCompany = $showingEntireCompany;
  }
  public function getShowingEntireCompany()
  {
    return $this->showingEntireCompany;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
}
