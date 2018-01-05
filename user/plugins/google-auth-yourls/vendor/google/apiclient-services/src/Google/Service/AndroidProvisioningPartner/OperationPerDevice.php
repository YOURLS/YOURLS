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

class Google_Service_AndroidProvisioningPartner_OperationPerDevice extends Google_Model
{
  protected $claimType = 'Google_Service_AndroidProvisioningPartner_PartnerClaim';
  protected $claimDataType = '';
  protected $resultType = 'Google_Service_AndroidProvisioningPartner_PerDeviceStatusInBatch';
  protected $resultDataType = '';
  protected $unclaimType = 'Google_Service_AndroidProvisioningPartner_PartnerUnclaim';
  protected $unclaimDataType = '';
  protected $updateMetadataType = 'Google_Service_AndroidProvisioningPartner_UpdateMetadataArguments';
  protected $updateMetadataDataType = '';

  /**
   * @param Google_Service_AndroidProvisioningPartner_PartnerClaim
   */
  public function setClaim(Google_Service_AndroidProvisioningPartner_PartnerClaim $claim)
  {
    $this->claim = $claim;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_PartnerClaim
   */
  public function getClaim()
  {
    return $this->claim;
  }
  /**
   * @param Google_Service_AndroidProvisioningPartner_PerDeviceStatusInBatch
   */
  public function setResult(Google_Service_AndroidProvisioningPartner_PerDeviceStatusInBatch $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_PerDeviceStatusInBatch
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param Google_Service_AndroidProvisioningPartner_PartnerUnclaim
   */
  public function setUnclaim(Google_Service_AndroidProvisioningPartner_PartnerUnclaim $unclaim)
  {
    $this->unclaim = $unclaim;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_PartnerUnclaim
   */
  public function getUnclaim()
  {
    return $this->unclaim;
  }
  /**
   * @param Google_Service_AndroidProvisioningPartner_UpdateMetadataArguments
   */
  public function setUpdateMetadata(Google_Service_AndroidProvisioningPartner_UpdateMetadataArguments $updateMetadata)
  {
    $this->updateMetadata = $updateMetadata;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_UpdateMetadataArguments
   */
  public function getUpdateMetadata()
  {
    return $this->updateMetadata;
  }
}
