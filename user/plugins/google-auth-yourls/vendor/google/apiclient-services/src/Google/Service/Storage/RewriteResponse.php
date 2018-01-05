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

class Google_Service_Storage_RewriteResponse extends Google_Model
{
  public $done;
  public $kind;
  public $objectSize;
  protected $resourceType = 'Google_Service_Storage_StorageObject';
  protected $resourceDataType = '';
  public $rewriteToken;
  public $totalBytesRewritten;

  public function setDone($done)
  {
    $this->done = $done;
  }
  public function getDone()
  {
    return $this->done;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setObjectSize($objectSize)
  {
    $this->objectSize = $objectSize;
  }
  public function getObjectSize()
  {
    return $this->objectSize;
  }
  /**
   * @param Google_Service_Storage_StorageObject
   */
  public function setResource(Google_Service_Storage_StorageObject $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_Storage_StorageObject
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setRewriteToken($rewriteToken)
  {
    $this->rewriteToken = $rewriteToken;
  }
  public function getRewriteToken()
  {
    return $this->rewriteToken;
  }
  public function setTotalBytesRewritten($totalBytesRewritten)
  {
    $this->totalBytesRewritten = $totalBytesRewritten;
  }
  public function getTotalBytesRewritten()
  {
    return $this->totalBytesRewritten;
  }
}
