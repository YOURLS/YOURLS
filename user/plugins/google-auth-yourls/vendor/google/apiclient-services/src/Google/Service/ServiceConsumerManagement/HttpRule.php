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

class Google_Service_ServiceConsumerManagement_HttpRule extends Google_Collection
{
  protected $collection_key = 'authorizations';
  protected $additionalBindingsType = 'Google_Service_ServiceConsumerManagement_HttpRule';
  protected $additionalBindingsDataType = 'array';
  protected $authorizationsType = 'Google_Service_ServiceConsumerManagement_AuthorizationRule';
  protected $authorizationsDataType = 'array';
  public $body;
  protected $customType = 'Google_Service_ServiceConsumerManagement_CustomHttpPattern';
  protected $customDataType = '';
  public $delete;
  public $get;
  protected $mediaDownloadType = 'Google_Service_ServiceConsumerManagement_MediaDownload';
  protected $mediaDownloadDataType = '';
  protected $mediaUploadType = 'Google_Service_ServiceConsumerManagement_MediaUpload';
  protected $mediaUploadDataType = '';
  public $patch;
  public $post;
  public $put;
  public $responseBody;
  public $restCollection;
  public $restMethodName;
  public $selector;

  /**
   * @param Google_Service_ServiceConsumerManagement_HttpRule
   */
  public function setAdditionalBindings($additionalBindings)
  {
    $this->additionalBindings = $additionalBindings;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_HttpRule
   */
  public function getAdditionalBindings()
  {
    return $this->additionalBindings;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_AuthorizationRule
   */
  public function setAuthorizations($authorizations)
  {
    $this->authorizations = $authorizations;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_AuthorizationRule
   */
  public function getAuthorizations()
  {
    return $this->authorizations;
  }
  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_CustomHttpPattern
   */
  public function setCustom(Google_Service_ServiceConsumerManagement_CustomHttpPattern $custom)
  {
    $this->custom = $custom;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_CustomHttpPattern
   */
  public function getCustom()
  {
    return $this->custom;
  }
  public function setDelete($delete)
  {
    $this->delete = $delete;
  }
  public function getDelete()
  {
    return $this->delete;
  }
  public function setGet($get)
  {
    $this->get = $get;
  }
  public function getGet()
  {
    return $this->get;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_MediaDownload
   */
  public function setMediaDownload(Google_Service_ServiceConsumerManagement_MediaDownload $mediaDownload)
  {
    $this->mediaDownload = $mediaDownload;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_MediaDownload
   */
  public function getMediaDownload()
  {
    return $this->mediaDownload;
  }
  /**
   * @param Google_Service_ServiceConsumerManagement_MediaUpload
   */
  public function setMediaUpload(Google_Service_ServiceConsumerManagement_MediaUpload $mediaUpload)
  {
    $this->mediaUpload = $mediaUpload;
  }
  /**
   * @return Google_Service_ServiceConsumerManagement_MediaUpload
   */
  public function getMediaUpload()
  {
    return $this->mediaUpload;
  }
  public function setPatch($patch)
  {
    $this->patch = $patch;
  }
  public function getPatch()
  {
    return $this->patch;
  }
  public function setPost($post)
  {
    $this->post = $post;
  }
  public function getPost()
  {
    return $this->post;
  }
  public function setPut($put)
  {
    $this->put = $put;
  }
  public function getPut()
  {
    return $this->put;
  }
  public function setResponseBody($responseBody)
  {
    $this->responseBody = $responseBody;
  }
  public function getResponseBody()
  {
    return $this->responseBody;
  }
  public function setRestCollection($restCollection)
  {
    $this->restCollection = $restCollection;
  }
  public function getRestCollection()
  {
    return $this->restCollection;
  }
  public function setRestMethodName($restMethodName)
  {
    $this->restMethodName = $restMethodName;
  }
  public function getRestMethodName()
  {
    return $this->restMethodName;
  }
  public function setSelector($selector)
  {
    $this->selector = $selector;
  }
  public function getSelector()
  {
    return $this->selector;
  }
}
