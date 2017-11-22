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

class Google_Service_AdExchangeBuyerII_ImpressionMetricsRow extends Google_Model
{
  protected $availableImpressionsType = 'Google_Service_AdExchangeBuyerII_MetricValue';
  protected $availableImpressionsDataType = '';
  protected $bidRequestsType = 'Google_Service_AdExchangeBuyerII_MetricValue';
  protected $bidRequestsDataType = '';
  protected $inventoryMatchesType = 'Google_Service_AdExchangeBuyerII_MetricValue';
  protected $inventoryMatchesDataType = '';
  protected $responsesWithBidsType = 'Google_Service_AdExchangeBuyerII_MetricValue';
  protected $responsesWithBidsDataType = '';
  protected $rowDimensionsType = 'Google_Service_AdExchangeBuyerII_RowDimensions';
  protected $rowDimensionsDataType = '';
  protected $successfulResponsesType = 'Google_Service_AdExchangeBuyerII_MetricValue';
  protected $successfulResponsesDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function setAvailableImpressions(Google_Service_AdExchangeBuyerII_MetricValue $availableImpressions)
  {
    $this->availableImpressions = $availableImpressions;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function getAvailableImpressions()
  {
    return $this->availableImpressions;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function setBidRequests(Google_Service_AdExchangeBuyerII_MetricValue $bidRequests)
  {
    $this->bidRequests = $bidRequests;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function getBidRequests()
  {
    return $this->bidRequests;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function setInventoryMatches(Google_Service_AdExchangeBuyerII_MetricValue $inventoryMatches)
  {
    $this->inventoryMatches = $inventoryMatches;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function getInventoryMatches()
  {
    return $this->inventoryMatches;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function setResponsesWithBids(Google_Service_AdExchangeBuyerII_MetricValue $responsesWithBids)
  {
    $this->responsesWithBids = $responsesWithBids;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function getResponsesWithBids()
  {
    return $this->responsesWithBids;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_RowDimensions
   */
  public function setRowDimensions(Google_Service_AdExchangeBuyerII_RowDimensions $rowDimensions)
  {
    $this->rowDimensions = $rowDimensions;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_RowDimensions
   */
  public function getRowDimensions()
  {
    return $this->rowDimensions;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function setSuccessfulResponses(Google_Service_AdExchangeBuyerII_MetricValue $successfulResponses)
  {
    $this->successfulResponses = $successfulResponses;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_MetricValue
   */
  public function getSuccessfulResponses()
  {
    return $this->successfulResponses;
  }
}
