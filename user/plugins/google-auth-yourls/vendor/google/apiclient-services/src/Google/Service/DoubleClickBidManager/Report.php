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

class Google_Service_DoubleClickBidManager_Report extends Google_Model
{
  protected $keyType = 'Google_Service_DoubleClickBidManager_ReportKey';
  protected $keyDataType = '';
  protected $metadataType = 'Google_Service_DoubleClickBidManager_ReportMetadata';
  protected $metadataDataType = '';
  protected $paramsType = 'Google_Service_DoubleClickBidManager_Parameters';
  protected $paramsDataType = '';

  /**
   * @param Google_Service_DoubleClickBidManager_ReportKey
   */
  public function setKey(Google_Service_DoubleClickBidManager_ReportKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_ReportKey
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_ReportMetadata
   */
  public function setMetadata(Google_Service_DoubleClickBidManager_ReportMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_ReportMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_DoubleClickBidManager_Parameters
   */
  public function setParams(Google_Service_DoubleClickBidManager_Parameters $params)
  {
    $this->params = $params;
  }
  /**
   * @return Google_Service_DoubleClickBidManager_Parameters
   */
  public function getParams()
  {
    return $this->params;
  }
}
