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
 * The "photos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $streetviewpublishService = new Google_Service_StreetViewPublish(...);
 *   $photos = $streetviewpublishService->photos;
 *  </code>
 */
class Google_Service_StreetViewPublish_Resource_Photos extends Google_Service_Resource
{
  /**
   * Deletes a list of Photos and their metadata.
   *
   * Note that if BatchDeletePhotos fails, either critical fields are missing or
   * there was an authentication error. Even if BatchDeletePhotos succeeds, there
   * may have been failures for single photos in the batch. These failures will be
   * specified in each PhotoResponse.status in BatchDeletePhotosResponse.results.
   * See DeletePhoto for specific failures that can occur per photo.
   * (photos.batchDelete)
   *
   * @param Google_Service_StreetViewPublish_BatchDeletePhotosRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_StreetViewPublish_BatchDeletePhotosResponse
   */
  public function batchDelete(Google_Service_StreetViewPublish_BatchDeletePhotosRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_StreetViewPublish_BatchDeletePhotosResponse");
  }
  /**
   * Gets the metadata of the specified Photo batch.
   *
   * Note that if BatchGetPhotos fails, either critical fields are missing or
   * there was an authentication error. Even if BatchGetPhotos succeeds, there may
   * have been failures for single photos in the batch. These failures will be
   * specified in each PhotoResponse.status in BatchGetPhotosResponse.results. See
   * GetPhoto for specific failures that can occur per photo. (photos.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string photoIds Required. IDs of the Photos. For HTTP GET
   * requests, the URL query parameter should be `photoIds==&...`.
   * @opt_param string view Specifies if a download URL for the photo bytes should
   * be returned in the Photo response.
   * @return Google_Service_StreetViewPublish_BatchGetPhotosResponse
   */
  public function batchGet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_StreetViewPublish_BatchGetPhotosResponse");
  }
  /**
   * Updates the metadata of Photos, such as pose, place association, connections,
   * etc. Changing the pixels of photos is not supported.
   *
   * Note that if BatchUpdatePhotos fails, either critical fields are missing or
   * there was an authentication error. Even if BatchUpdatePhotos succeeds, there
   * may have been failures for single photos in the batch. These failures will be
   * specified in each PhotoResponse.status in BatchUpdatePhotosResponse.results.
   * See UpdatePhoto for specific failures that can occur per photo.
   *
   * Only the fields specified in updateMask field are used. If `updateMask` is
   * not present, the update applies to all fields.
   *
   * Note: To update Pose.altitude, Pose.latLngPair has to be filled as well.
   * Otherwise, the request will fail. (photos.batchUpdate)
   *
   * @param Google_Service_StreetViewPublish_BatchUpdatePhotosRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_StreetViewPublish_BatchUpdatePhotosResponse
   */
  public function batchUpdate(Google_Service_StreetViewPublish_BatchUpdatePhotosRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_StreetViewPublish_BatchUpdatePhotosResponse");
  }
  /**
   * Lists all the Photos that belong to the user. (photos.listPhotos)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The nextPageToken value returned from a previous
   * ListPhotos request, if any.
   * @opt_param int pageSize The maximum number of photos to return. `pageSize`
   * must be non-negative. If `pageSize` is zero or is not provided, the default
   * page size of 100 will be used. The number of photos returned in the response
   * may be less than `pageSize` if the number of photos that belong to the user
   * is less than `pageSize`.
   * @opt_param string view Specifies if a download URL for the photos bytes
   * should be returned in the Photos response.
   * @opt_param string filter The filter expression. For example:
   * `placeId=ChIJj61dQgK6j4AR4GeTYWZsKWw`.
   *
   * The only filter supported at the moment is `placeId`.
   * @return Google_Service_StreetViewPublish_ListPhotosResponse
   */
  public function listPhotos($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_StreetViewPublish_ListPhotosResponse");
  }
}
