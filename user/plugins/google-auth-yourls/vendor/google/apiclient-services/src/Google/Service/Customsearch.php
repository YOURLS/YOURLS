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
 * Service definition for Customsearch (v1).
 *
 * <p>
 * Searches over a website or collection of websites</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/custom-search/v1/using_rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Customsearch extends Google_Service
{


  public $cse;
  public $cse_siterestrict;
  
  /**
   * Constructs the internal representation of the Customsearch service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'customsearch/';
    $this->version = 'v1';
    $this->serviceName = 'customsearch';

    $this->cse = new Google_Service_Customsearch_Resource_Cse(
        $this,
        $this->serviceName,
        'cse',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'c2coff' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'cr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'cx' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'exactTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'excludeTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fileType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'gl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'googlehost' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'highRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hq' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgColorType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgDominantColor' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgSize' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'linkSite' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'lowRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'lr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'num' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relatedSite' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'rights' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'safe' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteSearch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteSearchFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sort' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'start' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->cse_siterestrict = new Google_Service_Customsearch_Resource_CseSiterestrict(
        $this,
        $this->serviceName,
        'siterestrict',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/siterestrict',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'c2coff' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'cr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'cx' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRestrict' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'exactTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'excludeTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fileType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'gl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'googlehost' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'highRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hl' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'hq' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgColorType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgDominantColor' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgSize' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'imgType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'linkSite' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'lowRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'lr' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'num' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orTerms' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'relatedSite' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'rights' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'safe' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteSearch' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteSearchFilter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sort' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'start' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
