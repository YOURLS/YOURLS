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

class Google_Service_Books_Review extends Google_Model
{
  protected $authorType = 'Google_Service_Books_ReviewAuthor';
  protected $authorDataType = '';
  public $content;
  public $date;
  public $fullTextUrl;
  public $kind;
  public $rating;
  protected $sourceType = 'Google_Service_Books_ReviewSource';
  protected $sourceDataType = '';
  public $title;
  public $type;
  public $volumeId;

  /**
   * @param Google_Service_Books_ReviewAuthor
   */
  public function setAuthor(Google_Service_Books_ReviewAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return Google_Service_Books_ReviewAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setFullTextUrl($fullTextUrl)
  {
    $this->fullTextUrl = $fullTextUrl;
  }
  public function getFullTextUrl()
  {
    return $this->fullTextUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRating($rating)
  {
    $this->rating = $rating;
  }
  public function getRating()
  {
    return $this->rating;
  }
  /**
   * @param Google_Service_Books_ReviewSource
   */
  public function setSource(Google_Service_Books_ReviewSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Books_ReviewSource
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}
