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

class Google_Service_YouTube_VideoFileDetails extends Google_Collection
{
  protected $collection_key = 'videoStreams';
  protected $audioStreamsType = 'Google_Service_YouTube_VideoFileDetailsAudioStream';
  protected $audioStreamsDataType = 'array';
  public $bitrateBps;
  public $container;
  public $creationTime;
  public $durationMs;
  public $fileName;
  public $fileSize;
  public $fileType;
  protected $videoStreamsType = 'Google_Service_YouTube_VideoFileDetailsVideoStream';
  protected $videoStreamsDataType = 'array';

  /**
   * @param Google_Service_YouTube_VideoFileDetailsAudioStream
   */
  public function setAudioStreams($audioStreams)
  {
    $this->audioStreams = $audioStreams;
  }
  /**
   * @return Google_Service_YouTube_VideoFileDetailsAudioStream
   */
  public function getAudioStreams()
  {
    return $this->audioStreams;
  }
  public function setBitrateBps($bitrateBps)
  {
    $this->bitrateBps = $bitrateBps;
  }
  public function getBitrateBps()
  {
    return $this->bitrateBps;
  }
  public function setContainer($container)
  {
    $this->container = $container;
  }
  public function getContainer()
  {
    return $this->container;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  public function getFileName()
  {
    return $this->fileName;
  }
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  public function getFileSize()
  {
    return $this->fileSize;
  }
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  public function getFileType()
  {
    return $this->fileType;
  }
  /**
   * @param Google_Service_YouTube_VideoFileDetailsVideoStream
   */
  public function setVideoStreams($videoStreams)
  {
    $this->videoStreams = $videoStreams;
  }
  /**
   * @return Google_Service_YouTube_VideoFileDetailsVideoStream
   */
  public function getVideoStreams()
  {
    return $this->videoStreams;
  }
}
