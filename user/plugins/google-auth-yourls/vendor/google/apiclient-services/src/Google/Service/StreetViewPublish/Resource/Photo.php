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
 * The "photo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $streetviewpublishService = new Google_Service_StreetViewPublish(...);
 *   $photo = $streetviewpublishService->photo;
 *  </code>
 */
class Google_Service_StreetViewPublish_Resource_Photo extends Google_Service_Resource
{
  /**
   * After the client finishes uploading the photo with the returned UploadRef,
   * CreatePhoto publishes the uploaded Photo to Street View on Google Maps.
   *
   * Currently, the only way to set heading, pitch, and roll in CreatePhoto is
   * through the [Photo Sphere XMP
   * metadata](https://developers.google.com/streetview/spherical-metadata) in the
   * photo bytes. The `pose.heading`, `pose.pitch`, `pose.roll`, `pose.altitude`,
   * and `pose.level` fields in Pose are ignored for CreatePhoto.
   *
   * This method returns the following error codes:
   *
   * * google.rpc.Code.INVALID_ARGUMENT if the request is malformed or if the
   * uploaded photo is not a 360 photo. * google.rpc.Code.NOT_FOUND if the upload
   * reference does not exist. * google.rpc.Code.RESOURCE_EXHAUSTED if the account
   * has reached the storage limit. (photo.create)
   *
   * @param Google_Service_StreetViewPublish_Photo $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_StreetViewPublish_Photo
   */
  public function create(Google_Service_StreetViewPublish_Photo $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_StreetViewPublish_Photo");
  }
  /**
   * Deletes a Photo and its metadata.
   *
   * This method returns the following error codes:
   *
   * * google.rpc.Code.PERMISSION_DENIED if the requesting user did not create the
   * requested photo. * google.rpc.Code.NOT_FOUND if the photo ID does not exist.
   * (photo.delete)
   *
   * @param string $photoId Required. ID of the Photo.
   * @param array $optParams Optional parameters.
   * @return Google_Service_StreetViewPublish_StreetviewpublishEmpty
   */
  public function delete($photoId, $optParams = array())
  {
    $params = array('photoId' => $photoId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_StreetViewPublish_StreetviewpublishEmpty");
  }
  /**
   * Gets the metadata of the specified Photo.
   *
   * This method returns the following error codes:
   *
   * * google.rpc.Code.PERMISSION_DENIED if the requesting user did not create the
   * requested Photo. * google.rpc.Code.NOT_FOUND if the requested Photo does not
   * exist. (photo.get)
   *
   * @param string $photoId Required. ID of the Photo.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies if a download URL for the photo bytes should
   * be returned in the Photo response.
   * @return Google_Service_StreetViewPublish_Photo
   */
  public function get($photoId, $optParams = array())
  {
    $params = array('photoId' => $photoId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_StreetViewPublish_Photo");
  }
  /**
   * Creates an upload session to start uploading photo bytes. The upload URL of
   * the returned UploadRef is used to upload the bytes for the Photo.
   *
   * In addition to the photo requirements shown in
   * https://support.google.com/maps/answer/7012050?hl=en_topic=6275604, the photo
   * must also meet the following requirements:
   *
   * * Photo Sphere XMP metadata must be included in the photo medadata. See
   * https://developers.google.com/streetview/spherical-metadata for the required
   * fields. * The pixel size of the photo must meet the size requirements listed
   * in https://support.google.com/maps/answer/7012050?hl=en_topic=6275604, and
   * the photo must be a full 360 horizontally.
   *
   * After the upload is complete, the UploadRef is used with CreatePhoto to
   * create the Photo object entry. (photo.startUpload)
   *
   * @param Google_Service_StreetViewPublish_StreetviewpublishEmpty $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_StreetViewPublish_UploadRef
   */
  public function startUpload(Google_Service_StreetViewPublish_StreetviewpublishEmpty $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startUpload', array($params), "Google_Service_StreetViewPublish_UploadRef");
  }
  /**
   * Updates the metadata of a Photo, such as pose, place association,
   * connections, etc. Changing the pixels of a photo is not supported.
   *
   * Only the fields specified in the updateMask field are used. If `updateMask`
   * is not present, the update applies to all fields.
   *
   * Note: To update Pose.altitude, Pose.latLngPair has to be filled as well.
   * Otherwise, the request will fail.
   *
   * This method returns the following error codes:
   *
   * * google.rpc.Code.PERMISSION_DENIED if the requesting user did not create the
   * requested photo. * google.rpc.Code.INVALID_ARGUMENT if the request is
   * malformed. * google.rpc.Code.NOT_FOUND if the requested photo does not exist.
   * (photo.update)
   *
   * @param string $id Required. A unique identifier for a photo.
   * @param Google_Service_StreetViewPublish_Photo $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies fields on the photo
   * metadata to update. If not present, the old Photo metadata will be entirely
   * replaced with the new Photo metadata in this request. The update fails if
   * invalid fields are specified. Multiple fields can be specified in a comma-
   * delimited list.
   *
   * The following fields are valid:
   *
   * * `pose.heading` * `pose.latLngPair` * `pose.pitch` * `pose.roll` *
   * `pose.level` * `pose.altitude` * `connections` * `places`
   *
   * Note: Repeated fields in updateMask mean the entire set of repeated values
   * will be replaced with the new contents. For example, if updateMask contains
   * `connections` and `UpdatePhotoRequest.photo.connections` is empty, all
   * connections will be removed.
   * @return Google_Service_StreetViewPublish_Photo
   */
  public function update($id, Google_Service_StreetViewPublish_Photo $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_StreetViewPublish_Photo");
  }
}
