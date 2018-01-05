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

class Google_Service_Customsearch_Result extends Google_Collection
{
  protected $collection_key = 'labels';
  public $cacheId;
  public $displayLink;
  public $fileFormat;
  public $formattedUrl;
  public $htmlFormattedUrl;
  public $htmlSnippet;
  public $htmlTitle;
  protected $imageType = 'Google_Service_Customsearch_ResultImage';
  protected $imageDataType = '';
  public $kind;
  protected $labelsType = 'Google_Service_Customsearch_ResultLabels';
  protected $labelsDataType = 'array';
  public $link;
  public $mime;
  public $pagemap;
  public $snippet;
  public $title;

  public function setCacheId($cacheId)
  {
    $this->cacheId = $cacheId;
  }
  public function getCacheId()
  {
    return $this->cacheId;
  }
  public function setDisplayLink($displayLink)
  {
    $this->displayLink = $displayLink;
  }
  public function getDisplayLink()
  {
    return $this->displayLink;
  }
  public function setFileFormat($fileFormat)
  {
    $this->fileFormat = $fileFormat;
  }
  public function getFileFormat()
  {
    return $this->fileFormat;
  }
  public function setFormattedUrl($formattedUrl)
  {
    $this->formattedUrl = $formattedUrl;
  }
  public function getFormattedUrl()
  {
    return $this->formattedUrl;
  }
  public function setHtmlFormattedUrl($htmlFormattedUrl)
  {
    $this->htmlFormattedUrl = $htmlFormattedUrl;
  }
  public function getHtmlFormattedUrl()
  {
    return $this->htmlFormattedUrl;
  }
  public function setHtmlSnippet($htmlSnippet)
  {
    $this->htmlSnippet = $htmlSnippet;
  }
  public function getHtmlSnippet()
  {
    return $this->htmlSnippet;
  }
  public function setHtmlTitle($htmlTitle)
  {
    $this->htmlTitle = $htmlTitle;
  }
  public function getHtmlTitle()
  {
    return $this->htmlTitle;
  }
  /**
   * @param Google_Service_Customsearch_ResultImage
   */
  public function setImage(Google_Service_Customsearch_ResultImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Customsearch_ResultImage
   */
  public function getImage()
  {
    return $this->image;
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
   * @param Google_Service_Customsearch_ResultLabels
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_Customsearch_ResultLabels
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setMime($mime)
  {
    $this->mime = $mime;
  }
  public function getMime()
  {
    return $this->mime;
  }
  public function setPagemap($pagemap)
  {
    $this->pagemap = $pagemap;
  }
  public function getPagemap()
  {
    return $this->pagemap;
  }
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  public function getSnippet()
  {
    return $this->snippet;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
