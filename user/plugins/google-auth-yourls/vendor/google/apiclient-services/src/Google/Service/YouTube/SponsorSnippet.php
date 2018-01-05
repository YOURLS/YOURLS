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

class Google_Service_YouTube_SponsorSnippet extends Google_Model
{
  public $channelId;
  protected $sponsorDetailsType = 'Google_Service_YouTube_ChannelProfileDetails';
  protected $sponsorDetailsDataType = '';
  public $sponsorSince;

  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param Google_Service_YouTube_ChannelProfileDetails
   */
  public function setSponsorDetails(Google_Service_YouTube_ChannelProfileDetails $sponsorDetails)
  {
    $this->sponsorDetails = $sponsorDetails;
  }
  /**
   * @return Google_Service_YouTube_ChannelProfileDetails
   */
  public function getSponsorDetails()
  {
    return $this->sponsorDetails;
  }
  public function setSponsorSince($sponsorSince)
  {
    $this->sponsorSince = $sponsorSince;
  }
  public function getSponsorSince()
  {
    return $this->sponsorSince;
  }
}
