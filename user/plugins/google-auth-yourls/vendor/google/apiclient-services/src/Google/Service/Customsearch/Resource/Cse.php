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
 * The "cse" collection of methods.
 * Typical usage is:
 *  <code>
 *   $customsearchService = new Google_Service_Customsearch(...);
 *   $cse = $customsearchService->cse;
 *  </code>
 */
class Google_Service_Customsearch_Resource_Cse extends Google_Service_Resource
{
  /**
   * Returns metadata about the search performed, metadata about the custom search
   * engine used for the search, and the search results. (cse.listCse)
   *
   * @param string $q Query
   * @param array $optParams Optional parameters.
   *
   * @opt_param string c2coff Turns off the translation between zh-CN and zh-TW.
   * @opt_param string cr Country restrict(s).
   * @opt_param string cx The custom search engine ID to scope this search query
   * @opt_param string dateRestrict Specifies all search results are from a time
   * period
   * @opt_param string exactTerms Identifies a phrase that all documents in the
   * search results must contain
   * @opt_param string excludeTerms Identifies a word or phrase that should not
   * appear in any documents in the search results
   * @opt_param string fileType Returns images of a specified type. Some of the
   * allowed values are: bmp, gif, png, jpg, svg, pdf, ...
   * @opt_param string filter Controls turning on or off the duplicate content
   * filter.
   * @opt_param string gl Geolocation of end user.
   * @opt_param string googlehost The local Google domain to use to perform the
   * search.
   * @opt_param string highRange Creates a range in form as_nlo value..as_nhi
   * value and attempts to append it to query
   * @opt_param string hl Sets the user interface language.
   * @opt_param string hq Appends the extra query terms to the query.
   * @opt_param string imgColorType Returns black and white, grayscale, or color
   * images: mono, gray, and color.
   * @opt_param string imgDominantColor Returns images of a specific dominant
   * color: yellow, green, teal, blue, purple, pink, white, gray, black and brown.
   * @opt_param string imgSize Returns images of a specified size, where size can
   * be one of: icon, small, medium, large, xlarge, xxlarge, and huge.
   * @opt_param string imgType Returns images of a type, which can be one of:
   * clipart, face, lineart, news, and photo.
   * @opt_param string linkSite Specifies that all search results should contain a
   * link to a particular URL
   * @opt_param string lowRange Creates a range in form as_nlo value..as_nhi value
   * and attempts to append it to query
   * @opt_param string lr The language restriction for the search results
   * @opt_param string num Number of search results to return
   * @opt_param string orTerms Provides additional search terms to check for in a
   * document, where each document in the search results must contain at least one
   * of the additional search terms
   * @opt_param string relatedSite Specifies that all search results should be
   * pages that are related to the specified URL
   * @opt_param string rights Filters based on licensing. Supported values
   * include: cc_publicdomain, cc_attribute, cc_sharealike, cc_noncommercial,
   * cc_nonderived and combinations of these.
   * @opt_param string safe Search safety level
   * @opt_param string searchType Specifies the search type: image.
   * @opt_param string siteSearch Specifies all search results should be pages
   * from a given site
   * @opt_param string siteSearchFilter Controls whether to include or exclude
   * results from the site named in the as_sitesearch parameter
   * @opt_param string sort The sort expression to apply to the results
   * @opt_param string start The index of the first result to return
   * @return Google_Service_Customsearch_Search
   */
  public function listCse($q, $optParams = array())
  {
    $params = array('q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Customsearch_Search");
  }
}
