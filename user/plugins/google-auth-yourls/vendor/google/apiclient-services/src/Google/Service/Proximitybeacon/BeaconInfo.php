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

class Google_Service_Proximitybeacon_BeaconInfo extends Google_Collection
{
  protected $collection_key = 'attachments';
  protected $advertisedIdType = 'Google_Service_Proximitybeacon_AdvertisedId';
  protected $advertisedIdDataType = '';
  protected $attachmentsType = 'Google_Service_Proximitybeacon_AttachmentInfo';
  protected $attachmentsDataType = 'array';
  public $beaconName;

  /**
   * @param Google_Service_Proximitybeacon_AdvertisedId
   */
  public function setAdvertisedId(Google_Service_Proximitybeacon_AdvertisedId $advertisedId)
  {
    $this->advertisedId = $advertisedId;
  }
  /**
   * @return Google_Service_Proximitybeacon_AdvertisedId
   */
  public function getAdvertisedId()
  {
    return $this->advertisedId;
  }
  /**
   * @param Google_Service_Proximitybeacon_AttachmentInfo
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Google_Service_Proximitybeacon_AttachmentInfo
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  public function setBeaconName($beaconName)
  {
    $this->beaconName = $beaconName;
  }
  public function getBeaconName()
  {
    return $this->beaconName;
  }
}
