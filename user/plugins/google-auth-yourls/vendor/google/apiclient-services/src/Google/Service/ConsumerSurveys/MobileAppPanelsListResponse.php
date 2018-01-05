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

class Google_Service_ConsumerSurveys_MobileAppPanelsListResponse extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $pageInfoType = 'Google_Service_ConsumerSurveys_PageInfo';
  protected $pageInfoDataType = '';
  public $requestId;
  protected $resourcesType = 'Google_Service_ConsumerSurveys_MobileAppPanel';
  protected $resourcesDataType = 'array';
  protected $tokenPaginationType = 'Google_Service_ConsumerSurveys_TokenPagination';
  protected $tokenPaginationDataType = '';

  /**
   * @param Google_Service_ConsumerSurveys_PageInfo
   */
  public function setPageInfo(Google_Service_ConsumerSurveys_PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return Google_Service_ConsumerSurveys_PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param Google_Service_ConsumerSurveys_MobileAppPanel
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_ConsumerSurveys_MobileAppPanel
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param Google_Service_ConsumerSurveys_TokenPagination
   */
  public function setTokenPagination(Google_Service_ConsumerSurveys_TokenPagination $tokenPagination)
  {
    $this->tokenPagination = $tokenPagination;
  }
  /**
   * @return Google_Service_ConsumerSurveys_TokenPagination
   */
  public function getTokenPagination()
  {
    return $this->tokenPagination;
  }
}
