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

class Google_Service_QPXExpress_FreeBaggageAllowance extends Google_Collection
{
  protected $collection_key = 'bagDescriptor';
  protected $bagDescriptorType = 'Google_Service_QPXExpress_BagDescriptor';
  protected $bagDescriptorDataType = 'array';
  public $kilos;
  public $kilosPerPiece;
  public $kind;
  public $pieces;
  public $pounds;

  /**
   * @param Google_Service_QPXExpress_BagDescriptor
   */
  public function setBagDescriptor($bagDescriptor)
  {
    $this->bagDescriptor = $bagDescriptor;
  }
  /**
   * @return Google_Service_QPXExpress_BagDescriptor
   */
  public function getBagDescriptor()
  {
    return $this->bagDescriptor;
  }
  public function setKilos($kilos)
  {
    $this->kilos = $kilos;
  }
  public function getKilos()
  {
    return $this->kilos;
  }
  public function setKilosPerPiece($kilosPerPiece)
  {
    $this->kilosPerPiece = $kilosPerPiece;
  }
  public function getKilosPerPiece()
  {
    return $this->kilosPerPiece;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPieces($pieces)
  {
    $this->pieces = $pieces;
  }
  public function getPieces()
  {
    return $this->pieces;
  }
  public function setPounds($pounds)
  {
    $this->pounds = $pounds;
  }
  public function getPounds()
  {
    return $this->pounds;
  }
}
