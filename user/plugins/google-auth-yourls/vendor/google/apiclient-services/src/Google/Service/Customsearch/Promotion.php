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

class Google_Service_Customsearch_Promotion extends Google_Collection
{
  protected $collection_key = 'bodyLines';
  protected $bodyLinesType = 'Google_Service_Customsearch_PromotionBodyLines';
  protected $bodyLinesDataType = 'array';
  public $displayLink;
  public $htmlTitle;
  protected $imageType = 'Google_Service_Customsearch_PromotionImage';
  protected $imageDataType = '';
  public $link;
  public $title;

  /**
   * @param Google_Service_Customsearch_PromotionBodyLines
   */
  public function setBodyLines($bodyLines)
  {
    $this->bodyLines = $bodyLines;
  }
  /**
   * @return Google_Service_Customsearch_PromotionBodyLines
   */
  public function getBodyLines()
  {
    return $this->bodyLines;
  }
  public function setDisplayLink($displayLink)
  {
    $this->displayLink = $displayLink;
  }
  public function getDisplayLink()
  {
    return $this->displayLink;
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
   * @param Google_Service_Customsearch_PromotionImage
   */
  public function setImage(Google_Service_Customsearch_PromotionImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Customsearch_PromotionImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
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
