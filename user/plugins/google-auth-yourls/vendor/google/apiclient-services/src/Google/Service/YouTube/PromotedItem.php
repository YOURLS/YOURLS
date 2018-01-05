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

class Google_Service_YouTube_PromotedItem extends Google_Model
{
  public $customMessage;
  protected $idType = 'Google_Service_YouTube_PromotedItemId';
  protected $idDataType = '';
  public $promotedByContentOwner;
  protected $timingType = 'Google_Service_YouTube_InvideoTiming';
  protected $timingDataType = '';

  public function setCustomMessage($customMessage)
  {
    $this->customMessage = $customMessage;
  }
  public function getCustomMessage()
  {
    return $this->customMessage;
  }
  /**
   * @param Google_Service_YouTube_PromotedItemId
   */
  public function setId(Google_Service_YouTube_PromotedItemId $id)
  {
    $this->id = $id;
  }
  /**
   * @return Google_Service_YouTube_PromotedItemId
   */
  public function getId()
  {
    return $this->id;
  }
  public function setPromotedByContentOwner($promotedByContentOwner)
  {
    $this->promotedByContentOwner = $promotedByContentOwner;
  }
  public function getPromotedByContentOwner()
  {
    return $this->promotedByContentOwner;
  }
  /**
   * @param Google_Service_YouTube_InvideoTiming
   */
  public function setTiming(Google_Service_YouTube_InvideoTiming $timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return Google_Service_YouTube_InvideoTiming
   */
  public function getTiming()
  {
    return $this->timing;
  }
}
