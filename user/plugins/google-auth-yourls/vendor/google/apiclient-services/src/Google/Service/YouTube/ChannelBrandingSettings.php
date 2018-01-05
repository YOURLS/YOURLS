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

class Google_Service_YouTube_ChannelBrandingSettings extends Google_Collection
{
  protected $collection_key = 'hints';
  protected $channelType = 'Google_Service_YouTube_ChannelSettings';
  protected $channelDataType = '';
  protected $hintsType = 'Google_Service_YouTube_PropertyValue';
  protected $hintsDataType = 'array';
  protected $imageType = 'Google_Service_YouTube_ImageSettings';
  protected $imageDataType = '';
  protected $watchType = 'Google_Service_YouTube_WatchSettings';
  protected $watchDataType = '';

  /**
   * @param Google_Service_YouTube_ChannelSettings
   */
  public function setChannel(Google_Service_YouTube_ChannelSettings $channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return Google_Service_YouTube_ChannelSettings
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param Google_Service_YouTube_PropertyValue
   */
  public function setHints($hints)
  {
    $this->hints = $hints;
  }
  /**
   * @return Google_Service_YouTube_PropertyValue
   */
  public function getHints()
  {
    return $this->hints;
  }
  /**
   * @param Google_Service_YouTube_ImageSettings
   */
  public function setImage(Google_Service_YouTube_ImageSettings $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_YouTube_ImageSettings
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_YouTube_WatchSettings
   */
  public function setWatch(Google_Service_YouTube_WatchSettings $watch)
  {
    $this->watch = $watch;
  }
  /**
   * @return Google_Service_YouTube_WatchSettings
   */
  public function getWatch()
  {
    return $this->watch;
  }
}
