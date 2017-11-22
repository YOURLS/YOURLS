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

class Google_Service_Webmasters_UrlCrawlErrorsSample extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "firstDetected" => "first_detected",
        "lastCrawled" => "last_crawled",
  );
  public $firstDetected;
  public $lastCrawled;
  public $pageUrl;
  public $responseCode;
  protected $urlDetailsType = 'Google_Service_Webmasters_UrlSampleDetails';
  protected $urlDetailsDataType = '';

  public function setFirstDetected($firstDetected)
  {
    $this->firstDetected = $firstDetected;
  }
  public function getFirstDetected()
  {
    return $this->firstDetected;
  }
  public function setLastCrawled($lastCrawled)
  {
    $this->lastCrawled = $lastCrawled;
  }
  public function getLastCrawled()
  {
    return $this->lastCrawled;
  }
  public function setPageUrl($pageUrl)
  {
    $this->pageUrl = $pageUrl;
  }
  public function getPageUrl()
  {
    return $this->pageUrl;
  }
  public function setResponseCode($responseCode)
  {
    $this->responseCode = $responseCode;
  }
  public function getResponseCode()
  {
    return $this->responseCode;
  }
  /**
   * @param Google_Service_Webmasters_UrlSampleDetails
   */
  public function setUrlDetails(Google_Service_Webmasters_UrlSampleDetails $urlDetails)
  {
    $this->urlDetails = $urlDetails;
  }
  /**
   * @return Google_Service_Webmasters_UrlSampleDetails
   */
  public function getUrlDetails()
  {
    return $this->urlDetails;
  }
}
