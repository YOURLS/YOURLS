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
 * The "recommended" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $recommended = $booksService->recommended;
 *  </code>
 */
class Google_Service_Books_Resource_VolumesRecommended extends Google_Service_Resource
{
  /**
   * Return a list of recommended books for the current user.
   * (recommended.listVolumesRecommended)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
   * 'en_US'. Used for generating recommendations.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned recommendations. Books with a higher maturity rating are
   * filtered out.
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Volumes
   */
  public function listVolumesRecommended($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Volumes");
  }
  /**
   * Rate a recommended book for the current user. (recommended.rate)
   *
   * @param string $rating Rating to be given to the volume.
   * @param string $volumeId ID of the source volume.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
   * 'en_US'. Used for generating recommendations.
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_BooksVolumesRecommendedRateResponse
   */
  public function rate($rating, $volumeId, $optParams = array())
  {
    $params = array('rating' => $rating, 'volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('rate', array($params), "Google_Service_Books_BooksVolumesRecommendedRateResponse");
  }
}
