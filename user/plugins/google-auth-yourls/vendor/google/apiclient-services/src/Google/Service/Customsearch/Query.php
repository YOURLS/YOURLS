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

class Google_Service_Customsearch_Query extends Google_Model
{
  public $count;
  public $cr;
  public $cx;
  public $dateRestrict;
  public $disableCnTwTranslation;
  public $exactTerms;
  public $excludeTerms;
  public $fileType;
  public $filter;
  public $gl;
  public $googleHost;
  public $highRange;
  public $hl;
  public $hq;
  public $imgColorType;
  public $imgDominantColor;
  public $imgSize;
  public $imgType;
  public $inputEncoding;
  public $language;
  public $linkSite;
  public $lowRange;
  public $orTerms;
  public $outputEncoding;
  public $relatedSite;
  public $rights;
  public $safe;
  public $searchTerms;
  public $searchType;
  public $siteSearch;
  public $siteSearchFilter;
  public $sort;
  public $startIndex;
  public $startPage;
  public $title;
  public $totalResults;

  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setCr($cr)
  {
    $this->cr = $cr;
  }
  public function getCr()
  {
    return $this->cr;
  }
  public function setCx($cx)
  {
    $this->cx = $cx;
  }
  public function getCx()
  {
    return $this->cx;
  }
  public function setDateRestrict($dateRestrict)
  {
    $this->dateRestrict = $dateRestrict;
  }
  public function getDateRestrict()
  {
    return $this->dateRestrict;
  }
  public function setDisableCnTwTranslation($disableCnTwTranslation)
  {
    $this->disableCnTwTranslation = $disableCnTwTranslation;
  }
  public function getDisableCnTwTranslation()
  {
    return $this->disableCnTwTranslation;
  }
  public function setExactTerms($exactTerms)
  {
    $this->exactTerms = $exactTerms;
  }
  public function getExactTerms()
  {
    return $this->exactTerms;
  }
  public function setExcludeTerms($excludeTerms)
  {
    $this->excludeTerms = $excludeTerms;
  }
  public function getExcludeTerms()
  {
    return $this->excludeTerms;
  }
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  public function getFileType()
  {
    return $this->fileType;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setGl($gl)
  {
    $this->gl = $gl;
  }
  public function getGl()
  {
    return $this->gl;
  }
  public function setGoogleHost($googleHost)
  {
    $this->googleHost = $googleHost;
  }
  public function getGoogleHost()
  {
    return $this->googleHost;
  }
  public function setHighRange($highRange)
  {
    $this->highRange = $highRange;
  }
  public function getHighRange()
  {
    return $this->highRange;
  }
  public function setHl($hl)
  {
    $this->hl = $hl;
  }
  public function getHl()
  {
    return $this->hl;
  }
  public function setHq($hq)
  {
    $this->hq = $hq;
  }
  public function getHq()
  {
    return $this->hq;
  }
  public function setImgColorType($imgColorType)
  {
    $this->imgColorType = $imgColorType;
  }
  public function getImgColorType()
  {
    return $this->imgColorType;
  }
  public function setImgDominantColor($imgDominantColor)
  {
    $this->imgDominantColor = $imgDominantColor;
  }
  public function getImgDominantColor()
  {
    return $this->imgDominantColor;
  }
  public function setImgSize($imgSize)
  {
    $this->imgSize = $imgSize;
  }
  public function getImgSize()
  {
    return $this->imgSize;
  }
  public function setImgType($imgType)
  {
    $this->imgType = $imgType;
  }
  public function getImgType()
  {
    return $this->imgType;
  }
  public function setInputEncoding($inputEncoding)
  {
    $this->inputEncoding = $inputEncoding;
  }
  public function getInputEncoding()
  {
    return $this->inputEncoding;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setLinkSite($linkSite)
  {
    $this->linkSite = $linkSite;
  }
  public function getLinkSite()
  {
    return $this->linkSite;
  }
  public function setLowRange($lowRange)
  {
    $this->lowRange = $lowRange;
  }
  public function getLowRange()
  {
    return $this->lowRange;
  }
  public function setOrTerms($orTerms)
  {
    $this->orTerms = $orTerms;
  }
  public function getOrTerms()
  {
    return $this->orTerms;
  }
  public function setOutputEncoding($outputEncoding)
  {
    $this->outputEncoding = $outputEncoding;
  }
  public function getOutputEncoding()
  {
    return $this->outputEncoding;
  }
  public function setRelatedSite($relatedSite)
  {
    $this->relatedSite = $relatedSite;
  }
  public function getRelatedSite()
  {
    return $this->relatedSite;
  }
  public function setRights($rights)
  {
    $this->rights = $rights;
  }
  public function getRights()
  {
    return $this->rights;
  }
  public function setSafe($safe)
  {
    $this->safe = $safe;
  }
  public function getSafe()
  {
    return $this->safe;
  }
  public function setSearchTerms($searchTerms)
  {
    $this->searchTerms = $searchTerms;
  }
  public function getSearchTerms()
  {
    return $this->searchTerms;
  }
  public function setSearchType($searchType)
  {
    $this->searchType = $searchType;
  }
  public function getSearchType()
  {
    return $this->searchType;
  }
  public function setSiteSearch($siteSearch)
  {
    $this->siteSearch = $siteSearch;
  }
  public function getSiteSearch()
  {
    return $this->siteSearch;
  }
  public function setSiteSearchFilter($siteSearchFilter)
  {
    $this->siteSearchFilter = $siteSearchFilter;
  }
  public function getSiteSearchFilter()
  {
    return $this->siteSearchFilter;
  }
  public function setSort($sort)
  {
    $this->sort = $sort;
  }
  public function getSort()
  {
    return $this->sort;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  public function setStartPage($startPage)
  {
    $this->startPage = $startPage;
  }
  public function getStartPage()
  {
    return $this->startPage;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  public function getTotalResults()
  {
    return $this->totalResults;
  }
}
