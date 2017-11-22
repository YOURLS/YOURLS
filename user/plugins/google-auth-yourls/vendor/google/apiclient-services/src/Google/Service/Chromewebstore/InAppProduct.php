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

class Google_Service_Chromewebstore_InAppProduct extends Google_Collection
{
  protected $collection_key = 'prices';
  protected $internal_gapi_mappings = array(
        "itemId" => "item_id",
  );
  public $itemId;
  public $kind;
  protected $localeDataType = 'Google_Service_Chromewebstore_InAppProductLocaleData';
  protected $localeDataDataType = 'array';
  protected $pricesType = 'Google_Service_Chromewebstore_InAppProductPrices';
  protected $pricesDataType = 'array';
  public $sku;
  public $state;
  public $type;

  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  public function getItemId()
  {
    return $this->itemId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocaleData($localeData)
  {
    $this->localeData = $localeData;
  }
  public function getLocaleData()
  {
    return $this->localeData;
  }
  public function setPrices($prices)
  {
    $this->prices = $prices;
  }
  public function getPrices()
  {
    return $this->prices;
  }
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  public function getSku()
  {
    return $this->sku;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
