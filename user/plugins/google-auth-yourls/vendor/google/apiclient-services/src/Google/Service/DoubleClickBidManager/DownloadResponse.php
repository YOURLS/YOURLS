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

class Google_Service_DoubleClickBidManager_DownloadResponse extends Google_Model
{
  public $adGroups;
  public $ads;
  public $insertionOrders;
  public $lineItems;

  public function setAdGroups($adGroups)
  {
    $this->adGroups = $adGroups;
  }
  public function getAdGroups()
  {
    return $this->adGroups;
  }
  public function setAds($ads)
  {
    $this->ads = $ads;
  }
  public function getAds()
  {
    return $this->ads;
  }
  public function setInsertionOrders($insertionOrders)
  {
    $this->insertionOrders = $insertionOrders;
  }
  public function getInsertionOrders()
  {
    return $this->insertionOrders;
  }
  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }
  public function getLineItems()
  {
    return $this->lineItems;
  }
}
