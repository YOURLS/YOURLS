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

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $devices = $androiddeviceprovisioningService->devices;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_PartnersDevices extends Google_Service_Resource
{
  /**
   * Claim the device identified by device identifier. (devices.claim)
   *
   * @param string $partnerId ID of the partner.
   * @param Google_Service_AndroidProvisioningPartner_ClaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_ClaimDeviceResponse
   */
  public function claim($partnerId, Google_Service_AndroidProvisioningPartner_ClaimDeviceRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('claim', array($params), "Google_Service_AndroidProvisioningPartner_ClaimDeviceResponse");
  }
  /**
   * Claim devices asynchronously. (devices.claimAsync)
   *
   * @param string $partnerId Partner ID.
   * @param Google_Service_AndroidProvisioningPartner_ClaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function claimAsync($partnerId, Google_Service_AndroidProvisioningPartner_ClaimDevicesRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('claimAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
  /**
   * Find devices by device identifier. (devices.findByIdentifier)
   *
   * @param string $partnerId ID of the partner.
   * @param Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierResponse
   */
  public function findByIdentifier($partnerId, Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findByIdentifier', array($params), "Google_Service_AndroidProvisioningPartner_FindDevicesByDeviceIdentifierResponse");
  }
  /**
   * Find devices by ownership. (devices.findByOwner)
   *
   * @param string $partnerId ID of the partner.
   * @param Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerResponse
   */
  public function findByOwner($partnerId, Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('findByOwner', array($params), "Google_Service_AndroidProvisioningPartner_FindDevicesByOwnerResponse");
  }
  /**
   * Get a device. (devices.get)
   *
   * @param string $name Resource name in
   * `partners/[PARTNER_ID]/devices/[DEVICE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidProvisioningPartner_Device");
  }
  /**
   * Update the metadata. (devices.metadata)
   *
   * @param string $metadataOwnerId The owner of the newly set metadata. Set this
   * to the partner ID.
   * @param string $deviceId ID of the partner.
   * @param Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_DeviceMetadata
   */
  public function metadata($metadataOwnerId, $deviceId, Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataRequest $postBody, $optParams = array())
  {
    $params = array('metadataOwnerId' => $metadataOwnerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('metadata', array($params), "Google_Service_AndroidProvisioningPartner_DeviceMetadata");
  }
  /**
   * Unclaim the device identified by the `device_id` or the `deviceIdentifier`.
   * (devices.unclaim)
   *
   * @param string $partnerId ID of the partner.
   * @param Google_Service_AndroidProvisioningPartner_UnclaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function unclaim($partnerId, Google_Service_AndroidProvisioningPartner_UnclaimDeviceRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unclaim', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
  /**
   * Unclaim devices asynchronously. (devices.unclaimAsync)
   *
   * @param string $partnerId Partner ID.
   * @param Google_Service_AndroidProvisioningPartner_UnclaimDevicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function unclaimAsync($partnerId, Google_Service_AndroidProvisioningPartner_UnclaimDevicesRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unclaimAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
  /**
   * Set metadata in batch asynchronously. (devices.updateMetadataAsync)
   *
   * @param string $partnerId Partner ID.
   * @param Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataInBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Operation
   */
  public function updateMetadataAsync($partnerId, Google_Service_AndroidProvisioningPartner_UpdateDeviceMetadataInBatchRequest $postBody, $optParams = array())
  {
    $params = array('partnerId' => $partnerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateMetadataAsync', array($params), "Google_Service_AndroidProvisioningPartner_Operation");
  }
}
