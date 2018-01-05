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

class Google_Service_Plus_ActivityObjectAttachments extends Google_Collection
{
  protected $collection_key = 'thumbnails';
  public $content;
  public $displayName;
  protected $embedType = 'Google_Service_Plus_ActivityObjectAttachmentsEmbed';
  protected $embedDataType = '';
  protected $fullImageType = 'Google_Service_Plus_ActivityObjectAttachmentsFullImage';
  protected $fullImageDataType = '';
  public $id;
  protected $imageType = 'Google_Service_Plus_ActivityObjectAttachmentsImage';
  protected $imageDataType = '';
  public $objectType;
  protected $thumbnailsType = 'Google_Service_Plus_ActivityObjectAttachmentsThumbnails';
  protected $thumbnailsDataType = 'array';
  public $url;

  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectAttachmentsEmbed
   */
  public function setEmbed(Google_Service_Plus_ActivityObjectAttachmentsEmbed $embed)
  {
    $this->embed = $embed;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectAttachmentsEmbed
   */
  public function getEmbed()
  {
    return $this->embed;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectAttachmentsFullImage
   */
  public function setFullImage(Google_Service_Plus_ActivityObjectAttachmentsFullImage $fullImage)
  {
    $this->fullImage = $fullImage;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectAttachmentsFullImage
   */
  public function getFullImage()
  {
    return $this->fullImage;
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
   * @param Google_Service_Plus_ActivityObjectAttachmentsImage
   */
  public function setImage(Google_Service_Plus_ActivityObjectAttachmentsImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectAttachmentsImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectAttachmentsThumbnails
   */
  public function setThumbnails($thumbnails)
  {
    $this->thumbnails = $thumbnails;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectAttachmentsThumbnails
   */
  public function getThumbnails()
  {
    return $this->thumbnails;
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
