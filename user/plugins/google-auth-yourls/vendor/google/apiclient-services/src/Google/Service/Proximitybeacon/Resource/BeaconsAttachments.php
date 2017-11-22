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
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $attachments = $proximitybeaconService->attachments;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_BeaconsAttachments extends Google_Service_Resource
{
  /**
   * Deletes multiple attachments on a given beacon. This operation is permanent
   * and cannot be undone.
   *
   * You can optionally specify `namespacedType` to choose which attachments
   * should be deleted. If you do not specify `namespacedType`,  all your
   * attachments on the given beacon will be deleted. You also may explicitly
   * specify `*` to delete all.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (attachments.batchDelete)
   *
   * @param string $beaconName The beacon whose attachments should be deleted. A
   * beacon name has the format "beacons/N!beaconId" where the beaconId is the
   * base16 ID broadcast by the beacon and N is a code for the beacon's type.
   * Possible values are `3` for Eddystone-UID, `4` for Eddystone-EID, `1` for
   * iBeacon, or `5` for AltBeacon. For Eddystone-EID beacons, you may use either
   * the current EID or the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string namespacedType Specifies the namespace and type of
   * attachments to delete in `namespace/type` format. Accepts `*` to specify "all
   * types in all namespaces". Optional.
   * @opt_param string projectId The project id to delete beacon attachments
   * under. This field can be used when "*" is specified to mean all attachment
   * namespaces. Projects may have multiple attachments with multiple namespaces.
   * If "*" is specified and the projectId string is empty, then the project
   * making the request is used. Optional.
   * @return Google_Service_Proximitybeacon_DeleteAttachmentsResponse
   */
  public function batchDelete($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_Proximitybeacon_DeleteAttachmentsResponse");
  }
  /**
   * Associates the given data with the specified beacon. Attachment data must
   * contain two parts:
   *
   * A namespaced type. The actual attachment data itself.
   *
   * The namespaced type consists of two parts, the namespace and the type. The
   * namespace must be one of the values returned by the `namespaces` endpoint,
   * while the type can be a string of any characters except for the forward slash
   * (`/`) up to 100 characters in length.
   *
   * Attachment data can be up to 1024 bytes long.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (attachments.create)
   *
   * @param string $beaconName Beacon on which the attachment should be created. A
   * beacon name has the format "beacons/N!beaconId" where the beaconId is the
   * base16 ID broadcast by the beacon and N is a code for the beacon's type.
   * Possible values are `3` for Eddystone-UID, `4` for Eddystone-EID, `1` for
   * iBeacon, or `5` for AltBeacon. For Eddystone-EID beacons, you may use either
   * the current EID or the beacon's "stable" UID. Required.
   * @param Google_Service_Proximitybeacon_BeaconAttachment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the project the attachment will
   * belong to. If the project id is not specified then the project making the
   * request is used. Optional.
   * @return Google_Service_Proximitybeacon_BeaconAttachment
   */
  public function create($beaconName, Google_Service_Proximitybeacon_BeaconAttachment $postBody, $optParams = array())
  {
    $params = array('beaconName' => $beaconName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Proximitybeacon_BeaconAttachment");
  }
  /**
   * Deletes the specified attachment for the given beacon. Each attachment has a
   * unique attachment name (`attachmentName`) which is returned when you fetch
   * the attachment data via this API. You specify this with the delete request to
   * control which attachment is removed. This operation cannot be undone.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (attachments.delete)
   *
   * @param string $attachmentName The attachment name (`attachmentName`) of the
   * attachment to remove. For example:
   * `beacons/3!893737abc9/attachments/c5e937-af0-494-959-ec49d12738`. For
   * Eddystone-EID beacons, the beacon ID portion (`3!893737abc9`) may be the
   * beacon's current EID, or its "stable" Eddystone-UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the attachment to delete. If
   * not provided, the project that is making the request is used. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconEmpty
   */
  public function delete($attachmentName, $optParams = array())
  {
    $params = array('attachmentName' => $attachmentName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Proximitybeacon_ProximitybeaconEmpty");
  }
  /**
   * Returns the attachments for the specified beacon that match the specified
   * namespaced-type pattern.
   *
   * To control which namespaced types are returned, you add the `namespacedType`
   * query parameter to the request. You must either use `*`, to return all
   * attachments, or the namespace must be one of the ones returned from the
   * `namespaces` endpoint.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **viewer**, **Is owner** or **Can edit** permissions in
   * the Google Developers Console project. (attachments.listBeaconsAttachments)
   *
   * @param string $beaconName Beacon whose attachments should be fetched. A
   * beacon name has the format "beacons/N!beaconId" where the beaconId is the
   * base16 ID broadcast by the beacon and N is a code for the beacon's type.
   * Possible values are `3` for Eddystone-UID, `4` for Eddystone-EID, `1` for
   * iBeacon, or `5` for AltBeacon. For Eddystone-EID beacons, you may use either
   * the current EID or the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id to list beacon attachments under.
   * This field can be used when "*" is specified to mean all attachment
   * namespaces. Projects may have multiple attachments with multiple namespaces.
   * If "*" is specified and the projectId string is empty, then the project
   * making the request is used. Optional.
   * @opt_param string namespacedType Specifies the namespace and type of
   * attachment to include in response in namespace/type format. Accepts `*` to
   * specify "all types in all namespaces".
   * @return Google_Service_Proximitybeacon_ListBeaconAttachmentsResponse
   */
  public function listBeaconsAttachments($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Proximitybeacon_ListBeaconAttachmentsResponse");
  }
}
