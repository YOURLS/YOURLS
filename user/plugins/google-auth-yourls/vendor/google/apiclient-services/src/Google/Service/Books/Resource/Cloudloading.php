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
 * The "cloudloading" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $cloudloading = $booksService->cloudloading;
 *  </code>
 */
class Google_Service_Books_Resource_Cloudloading extends Google_Service_Resource
{
  /**
   * (cloudloading.addBook)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string drive_document_id A drive document id. The
   * upload_client_token must not be set.
   * @opt_param string mime_type The document MIME type. It can be set only if the
   * drive_document_id is set.
   * @opt_param string name The document name. It can be set only if the
   * drive_document_id is set.
   * @opt_param string upload_client_token
   * @return Google_Service_Books_BooksCloudloadingResource
   */
  public function addBook($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('addBook', array($params), "Google_Service_Books_BooksCloudloadingResource");
  }
  /**
   * Remove the book and its contents (cloudloading.deleteBook)
   *
   * @param string $volumeId The id of the book to be removed.
   * @param array $optParams Optional parameters.
   */
  public function deleteBook($volumeId, $optParams = array())
  {
    $params = array('volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('deleteBook', array($params));
  }
  /**
   * (cloudloading.updateBook)
   *
   * @param Google_Service_Books_BooksCloudloadingResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Books_BooksCloudloadingResource
   */
  public function updateBook(Google_Service_Books_BooksCloudloadingResource $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateBook', array($params), "Google_Service_Books_BooksCloudloadingResource");
  }
}
