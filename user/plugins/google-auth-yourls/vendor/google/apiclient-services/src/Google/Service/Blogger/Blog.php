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

class Google_Service_Blogger_Blog extends Google_Model
{
  public $customMetaData;
  public $description;
  public $id;
  public $kind;
  protected $localeType = 'Google_Service_Blogger_BlogLocale';
  protected $localeDataType = '';
  public $name;
  protected $pagesType = 'Google_Service_Blogger_BlogPages';
  protected $pagesDataType = '';
  protected $postsType = 'Google_Service_Blogger_BlogPosts';
  protected $postsDataType = '';
  public $published;
  public $selfLink;
  public $status;
  public $updated;
  public $url;

  public function setCustomMetaData($customMetaData)
  {
    $this->customMetaData = $customMetaData;
  }
  public function getCustomMetaData()
  {
    return $this->customMetaData;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  /**
   * @param Google_Service_Blogger_BlogLocale
   */
  public function setLocale(Google_Service_Blogger_BlogLocale $locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return Google_Service_Blogger_BlogLocale
   */
  public function getLocale()
  {
    return $this->locale;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Blogger_BlogPages
   */
  public function setPages(Google_Service_Blogger_BlogPages $pages)
  {
    $this->pages = $pages;
  }
  /**
   * @return Google_Service_Blogger_BlogPages
   */
  public function getPages()
  {
    return $this->pages;
  }
  /**
   * @param Google_Service_Blogger_BlogPosts
   */
  public function setPosts(Google_Service_Blogger_BlogPosts $posts)
  {
    $this->posts = $posts;
  }
  /**
   * @return Google_Service_Blogger_BlogPosts
   */
  public function getPosts()
  {
    return $this->posts;
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
