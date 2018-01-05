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
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $images = $androidpublisherService->images;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsImages extends Google_Service_Resource
{
  /**
   * Deletes the image (specified by id) from the edit. (images.delete)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing whose images are to read or modified. For example, to
   * select Austrian German, pass "de-AT".
   * @param string $imageType
   * @param string $imageId Unique identifier an image within the set of images
   * attached to this edit.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $language, $imageType, $imageId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType, 'imageId' => $imageId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Deletes all images for the specified language and image type.
   * (images.deleteall)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing whose images are to read or modified. For example, to
   * select Austrian German, pass "de-AT".
   * @param string $imageType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ImagesDeleteAllResponse
   */
  public function deleteall($packageName, $editId, $language, $imageType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType);
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', array($params), "Google_Service_AndroidPublisher_ImagesDeleteAllResponse");
  }
  /**
   * Lists all images for the specified language and image type.
   * (images.listEditsImages)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing whose images are to read or modified. For example, to
   * select Austrian German, pass "de-AT".
   * @param string $imageType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ImagesListResponse
   */
  public function listEditsImages($packageName, $editId, $language, $imageType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_ImagesListResponse");
  }
  /**
   * Uploads a new image and adds it to the list of images for the specified
   * language and image type. (images.upload)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing whose images are to read or modified. For example, to
   * select Austrian German, pass "de-AT".
   * @param string $imageType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ImagesUploadResponse
   */
  public function upload($packageName, $editId, $language, $imageType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_AndroidPublisher_ImagesUploadResponse");
  }
}
