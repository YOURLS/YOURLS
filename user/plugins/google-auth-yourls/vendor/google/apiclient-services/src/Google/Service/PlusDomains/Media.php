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

class Google_Service_PlusDomains_Media extends Google_Collection
{
  protected $collection_key = 'streams';
  protected $authorType = 'Google_Service_PlusDomains_MediaAuthor';
  protected $authorDataType = '';
  public $displayName;
  public $etag;
  protected $exifType = 'Google_Service_PlusDomains_MediaExif';
  protected $exifDataType = '';
  public $height;
  public $id;
  public $kind;
  public $mediaCreatedTime;
  public $mediaUrl;
  public $published;
  public $sizeBytes;
  protected $streamsType = 'Google_Service_PlusDomains_Videostream';
  protected $streamsDataType = 'array';
  public $summary;
  public $updated;
  public $url;
  public $videoDuration;
  public $videoStatus;
  public $width;

  /**
   * @param Google_Service_PlusDomains_MediaAuthor
   */
  public function setAuthor(Google_Service_PlusDomains_MediaAuthor $author)
  {
    $this->author = $author;
  }
  /**
   * @return Google_Service_PlusDomains_MediaAuthor
   */
  public function getAuthor()
  {
    return $this->author;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_PlusDomains_MediaExif
   */
  public function setExif(Google_Service_PlusDomains_MediaExif $exif)
  {
    $this->exif = $exif;
  }
  /**
   * @return Google_Service_PlusDomains_MediaExif
   */
  public function getExif()
  {
    return $this->exif;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
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
  public function setMediaCreatedTime($mediaCreatedTime)
  {
    $this->mediaCreatedTime = $mediaCreatedTime;
  }
  public function getMediaCreatedTime()
  {
    return $this->mediaCreatedTime;
  }
  public function setMediaUrl($mediaUrl)
  {
    $this->mediaUrl = $mediaUrl;
  }
  public function getMediaUrl()
  {
    return $this->mediaUrl;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
  /**
   * @param Google_Service_PlusDomains_Videostream
   */
  public function setStreams($streams)
  {
    $this->streams = $streams;
  }
  /**
   * @return Google_Service_PlusDomains_Videostream
   */
  public function getStreams()
  {
    return $this->streams;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
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
  public function setVideoDuration($videoDuration)
  {
    $this->videoDuration = $videoDuration;
  }
  public function getVideoDuration()
  {
    return $this->videoDuration;
  }
  public function setVideoStatus($videoStatus)
  {
    $this->videoStatus = $videoStatus;
  }
  public function getVideoStatus()
  {
    return $this->videoStatus;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
