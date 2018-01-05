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

class Google_Service_ShoppingContent_InventoryCustomBatchRequestEntry extends Google_Model
{
  public $batchId;
  protected $inventoryType = 'Google_Service_ShoppingContent_Inventory';
  protected $inventoryDataType = '';
  public $merchantId;
  public $productId;
  public $storeCode;

  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  /**
   * @param Google_Service_ShoppingContent_Inventory
   */
  public function setInventory(Google_Service_ShoppingContent_Inventory $inventory)
  {
    $this->inventory = $inventory;
  }
  /**
   * @return Google_Service_ShoppingContent_Inventory
   */
  public function getInventory()
  {
    return $this->inventory;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  public function getStoreCode()
  {
    return $this->storeCode;
  }
}
