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

class Google_Service_Blogger_Post extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $authorType = 'Google_Service_Blogger_PostAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_PostBlog';
  protected $blogDataType = '';
  public $content;
  public $customMetaData;
  public $etag;
  public $id;
  protected $imagesType = 'Google_Service_Blogger_PostImages';
  protected $imagesDataType = 'array';
  public $kind;
  public $labels;
  protected $locationType = 'Google_Service_Blogger_PostLocation';
  protected $locationDataType = '';
  public $published;
  public $readerComments;
  protected $repliesType = 'Google_Service_Blogger_PostReplies';
  protected $repliesDataType = '';
  public $selfLink;
  public $status;
  public $title;
  public $titleLink;
  public $updated;
  public $url;

  /**
   * @param Google_Service_Blogger_PostAuthor
   */
  public function setAuthor(Google_Service_Blogger_PostAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return Google_Service_Blogger_PostAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param Google_Service_Blogger_PostBlog
   */
  public function setBlog(Google_Service_Blogger_PostBlog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return Google_Service_Blogger_PostBlog
   */
  public function getBlog()
  {
    return $this->blog;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  public function getCustomMetaData()
  {
    return $this->customMetaData;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Blogger_PostImages
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return Google_Service_Blogger_PostImages
   */
  public function getImages()
  {
    return $this->images;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Blogger_PostLocation
   */
  public function setLocation(Google_Service_Blogger_PostLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Blogger_PostLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setReaderComments($readerComments)
  {
    $this->readerComments = $readerComments;
  }
  public function getReaderComments()
  {
    return $this->readerComments;
  }
  /**
   * @param Google_Service_Blogger_PostReplies
   */
  public function setReplies(Google_Service_Blogger_PostReplies $replies)
  {
    $this->replies = $replies;
  }
  /**
   * @return Google_Service_Blogger_PostReplies
   */
  public function getReplies()
  {
    return $this->replies;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTitleLink($titleLink)
  {
    $this->titleLink = $titleLink;
  }
  public function getTitleLink()
  {
    return $this->titleLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
