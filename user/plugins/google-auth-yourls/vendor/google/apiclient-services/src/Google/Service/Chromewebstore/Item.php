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

class Google_Service_Chromewebstore_Item extends Google_Collection
{
  protected $collection_key = 'statusDetail';
  protected $internal_gapi_mappings = array(
        "itemId" => "item_id",
  );
  public $crxVersion;
  public $id;
  public $itemError;
  public $itemId;
  public $kind;
  public $publicKey;
  public $status;
  public $statusDetail;
  public $uploadState;

  public function setCrxVersion($crxVersion)
  {
    $this->crxVersion = $crxVersion;
  }
  public function getCrxVersion()
  {
    return $this->crxVersion;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setItemError($itemError)
  {
    $this->itemError = $itemError;
  }
  public function getItemError()
  {
    return $this->itemError;
  }
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
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusDetail($statusDetail)
  {
    $this->statusDetail = $statusDetail;
  }
  public function getStatusDetail()
  {
    return $this->statusDetail;
  }
  public function setUploadState($uploadState)
  {
    $this->uploadState = $uploadState;
  }
  public function getUploadState()
  {
    return $this->uploadState;
  }
}
