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

class Google_Service_Blogger_Page extends Google_Model
{
  protected $authorType = 'Google_Service_Blogger_PageAuthor';
  protected $authorDataType = '';
  protected $blogType = 'Google_Service_Blogger_PageBlog';
  protected $blogDataType = '';
  public $content;
  public $etag;
  public $id;
  public $kind;
  public $published;
  public $selfLink;
  public $status;
  public $title;
  public $updated;
  public $url;

  /**
   * @param Google_Service_Blogger_PageAuthor
   */
  public function setAuthor(Google_Service_Blogger_PageAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return Google_Service_Blogger_PageAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param Google_Service_Blogger_PageBlog
   */
  public function setBlog(Google_Service_Blogger_PageBlog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return Google_Service_Blogger_PageBlog
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
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
