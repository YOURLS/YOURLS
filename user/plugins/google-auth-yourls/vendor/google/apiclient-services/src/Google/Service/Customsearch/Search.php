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

class Google_Service_Customsearch_Search extends Google_Collection
{
  protected $collection_key = 'promotions';
  protected $contextType = 'Google_Service_Customsearch_Context';
  protected $contextDataType = '';
  protected $itemsType = 'Google_Service_Customsearch_Result';
  protected $itemsDataType = 'array';
  public $kind;
  protected $promotionsType = 'Google_Service_Customsearch_Promotion';
  protected $promotionsDataType = 'array';
  protected $queriesType = 'Google_Service_Customsearch_Query';
  protected $queriesDataType = 'map';
  protected $searchInformationType = 'Google_Service_Customsearch_SearchSearchInformation';
  protected $searchInformationDataType = '';
  protected $spellingType = 'Google_Service_Customsearch_SearchSpelling';
  protected $spellingDataType = '';
  protected $urlType = 'Google_Service_Customsearch_SearchUrl';
  protected $urlDataType = '';

  /**
   * @param Google_Service_Customsearch_Context
   */
  public function setContext(Google_Service_Customsearch_Context $context)
  {
    $this->context = $context;
  }
  /**
   * @return Google_Service_Customsearch_Context
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param Google_Service_Customsearch_Result
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_Customsearch_Result
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Customsearch_Promotion
   */
  public function setPromotions($promotions)
  {
    $this->promotions = $promotions;
  }
  /**
   * @return Google_Service_Customsearch_Promotion
   */
  public function getPromotions()
  {
    return $this->promotions;
  }
  /**
   * @param Google_Service_Customsearch_Query
   */
  public function setQueries($queries)
  {
    $this->queries = $queries;
  }
  /**
   * @return Google_Service_Customsearch_Query
   */
  public function getQueries()
  {
    return $this->queries;
  }
  /**
   * @param Google_Service_Customsearch_SearchSearchInformation
   */
  public function setSearchInformation(Google_Service_Customsearch_SearchSearchInformation $searchInformation)
  {
    $this->searchInformation = $searchInformation;
  }
  /**
   * @return Google_Service_Customsearch_SearchSearchInformation
   */
  public function getSearchInformation()
  {
    return $this->searchInformation;
  }
  /**
   * @param Google_Service_Customsearch_SearchSpelling
   */
  public function setSpelling(Google_Service_Customsearch_SearchSpelling $spelling)
  {
    $this->spelling = $spelling;
  }
  /**
   * @return Google_Service_Customsearch_SearchSpelling
   */
  public function getSpelling()
  {
    return $this->spelling;
  }
  /**
   * @param Google_Service_Customsearch_SearchUrl
   */
  public function setUrl(Google_Service_Customsearch_SearchUrl $url)
  {
    $this->url = $url;
  }
  /**
   * @return Google_Service_Customsearch_SearchUrl
   */
  public function getUrl()
  {
    return $this->url;
  }
}
