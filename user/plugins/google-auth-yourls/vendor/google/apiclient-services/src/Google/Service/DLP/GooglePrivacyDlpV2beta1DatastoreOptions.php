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

class Google_Service_DLP_GooglePrivacyDlpV2beta1DatastoreOptions extends Google_Collection
{
  protected $collection_key = 'projection';
  protected $kindType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1KindExpression';
  protected $kindDataType = '';
  protected $partitionIdType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1PartitionId';
  protected $partitionIdDataType = '';
  protected $projectionType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1Projection';
  protected $projectionDataType = 'array';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1KindExpression
   */
  public function setKind(Google_Service_DLP_GooglePrivacyDlpV2beta1KindExpression $kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1KindExpression
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1PartitionId
   */
  public function setPartitionId(Google_Service_DLP_GooglePrivacyDlpV2beta1PartitionId $partitionId)
  {
    $this->partitionId = $partitionId;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1PartitionId
   */
  public function getPartitionId()
  {
    return $this->partitionId;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1Projection
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1Projection
   */
  public function getProjection()
  {
    return $this->projection;
  }
}
