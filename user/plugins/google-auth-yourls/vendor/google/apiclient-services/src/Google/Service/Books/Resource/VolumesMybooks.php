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
 * The "mybooks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $mybooks = $booksService->mybooks;
 *  </code>
 */
class Google_Service_Books_Resource_VolumesMybooks extends Google_Service_Resource
{
  /**
   * Return a list of books in My Library. (mybooks.listVolumesMybooks)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string acquireMethod How the book was acquired
   * @opt_param string country ISO-3166-1 code to override the IP-based location.
   * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
   * Ex:'en_US'. Used for generating recommendations.
   * @opt_param string maxResults Maximum number of results to return.
   * @opt_param string processingState The processing state of the user uploaded
   * volumes to be returned. Applicable only if the UPLOADED is specified in the
   * acquireMethod.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startIndex Index of the first result to return (starts at
   * 0)
   * @return Google_Service_Books_Volumes
   */
  public function listVolumesMybooks($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Volumes");
  }
}
