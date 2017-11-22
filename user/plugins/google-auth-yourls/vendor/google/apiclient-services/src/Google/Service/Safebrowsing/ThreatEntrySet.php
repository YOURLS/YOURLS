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

class Google_Service_Safebrowsing_ThreatEntrySet extends Google_Model
{
  public $compressionType;
  protected $rawHashesType = 'Google_Service_Safebrowsing_RawHashes';
  protected $rawHashesDataType = '';
  protected $rawIndicesType = 'Google_Service_Safebrowsing_RawIndices';
  protected $rawIndicesDataType = '';
  protected $riceHashesType = 'Google_Service_Safebrowsing_RiceDeltaEncoding';
  protected $riceHashesDataType = '';
  protected $riceIndicesType = 'Google_Service_Safebrowsing_RiceDeltaEncoding';
  protected $riceIndicesDataType = '';

  public function setCompressionType($compressionType)
  {
    $this->compressionType = $compressionType;
  }
  public function getCompressionType()
  {
    return $this->compressionType;
  }
  /**
   * @param Google_Service_Safebrowsing_RawHashes
   */
  public function setRawHashes(Google_Service_Safebrowsing_RawHashes $rawHashes)
  {
    $this->rawHashes = $rawHashes;
  }
  /**
   * @return Google_Service_Safebrowsing_RawHashes
   */
  public function getRawHashes()
  {
    return $this->rawHashes;
  }
  /**
   * @param Google_Service_Safebrowsing_RawIndices
   */
  public function setRawIndices(Google_Service_Safebrowsing_RawIndices $rawIndices)
  {
    $this->rawIndices = $rawIndices;
  }
  /**
   * @return Google_Service_Safebrowsing_RawIndices
   */
  public function getRawIndices()
  {
    return $this->rawIndices;
  }
  /**
   * @param Google_Service_Safebrowsing_RiceDeltaEncoding
   */
  public function setRiceHashes(Google_Service_Safebrowsing_RiceDeltaEncoding $riceHashes)
  {
    $this->riceHashes = $riceHashes;
  }
  /**
   * @return Google_Service_Safebrowsing_RiceDeltaEncoding
   */
  public function getRiceHashes()
  {
    return $this->riceHashes;
  }
  /**
   * @param Google_Service_Safebrowsing_RiceDeltaEncoding
   */
  public function setRiceIndices(Google_Service_Safebrowsing_RiceDeltaEncoding $riceIndices)
  {
    $this->riceIndices = $riceIndices;
  }
  /**
   * @return Google_Service_Safebrowsing_RiceDeltaEncoding
   */
  public function getRiceIndices()
  {
    return $this->riceIndices;
  }
}
