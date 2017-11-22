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

class Google_Service_AndroidPublisher_ReviewsListResponse extends Google_Collection
{
  protected $collection_key = 'reviews';
  protected $pageInfoType = 'Google_Service_AndroidPublisher_PageInfo';
  protected $pageInfoDataType = '';
  protected $reviewsType = 'Google_Service_AndroidPublisher_Review';
  protected $reviewsDataType = 'array';
  protected $tokenPaginationType = 'Google_Service_AndroidPublisher_TokenPagination';
  protected $tokenPaginationDataType = '';

  /**
   * @param Google_Service_AndroidPublisher_PageInfo
   */
  public function setPageInfo(Google_Service_AndroidPublisher_PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return Google_Service_AndroidPublisher_PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  /**
   * @param Google_Service_AndroidPublisher_Review
   */
  public function setReviews($reviews)
  {
    $this->reviews = $reviews;
  }
  /**
   * @return Google_Service_AndroidPublisher_Review
   */
  public function getReviews()
  {
    return $this->reviews;
  }
  /**
   * @param Google_Service_AndroidPublisher_TokenPagination
   */
  public function setTokenPagination(Google_Service_AndroidPublisher_TokenPagination $tokenPagination)
  {
    $this->tokenPagination = $tokenPagination;
  }
  /**
   * @return Google_Service_AndroidPublisher_TokenPagination
   */
  public function getTokenPagination()
  {
    return $this->tokenPagination;
  }
}
