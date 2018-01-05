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

class Google_Service_AdExchangeBuyer_UpdatePrivateAuctionProposalRequest extends Google_Model
{
  public $externalDealId;
  protected $noteType = 'Google_Service_AdExchangeBuyer_MarketplaceNote';
  protected $noteDataType = '';
  public $proposalRevisionNumber;
  public $updateAction;

  public function setExternalDealId($externalDealId)
  {
    $this->externalDealId = $externalDealId;
  }
  public function getExternalDealId()
  {
    return $this->externalDealId;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_MarketplaceNote
   */
  public function setNote(Google_Service_AdExchangeBuyer_MarketplaceNote $note)
  {
    $this->note = $note;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_MarketplaceNote
   */
  public function getNote()
  {
    return $this->note;
  }
  public function setProposalRevisionNumber($proposalRevisionNumber)
  {
    $this->proposalRevisionNumber = $proposalRevisionNumber;
  }
  public function getProposalRevisionNumber()
  {
    return $this->proposalRevisionNumber;
  }
  public function setUpdateAction($updateAction)
  {
    $this->updateAction = $updateAction;
  }
  public function getUpdateAction()
  {
    return $this->updateAction;
  }
}
