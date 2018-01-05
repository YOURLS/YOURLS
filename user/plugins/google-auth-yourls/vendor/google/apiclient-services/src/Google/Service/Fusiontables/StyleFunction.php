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

class Google_Service_Fusiontables_StyleFunction extends Google_Collection
{
  protected $collection_key = 'buckets';
  protected $bucketsType = 'Google_Service_Fusiontables_Bucket';
  protected $bucketsDataType = 'array';
  public $columnName;
  protected $gradientType = 'Google_Service_Fusiontables_StyleFunctionGradient';
  protected $gradientDataType = '';
  public $kind;

  /**
   * @param Google_Service_Fusiontables_Bucket
   */
  public function setBuckets($buckets)
  {
    $this->buckets = $buckets;
  }
  /**
   * @return Google_Service_Fusiontables_Bucket
   */
  public function getBuckets()
  {
    return $this->buckets;
  }
  public function setColumnName($columnName)
  {
    $this->columnName = $columnName;
  }
  public function getColumnName()
  {
    return $this->columnName;
  }
  /**
   * @param Google_Service_Fusiontables_StyleFunctionGradient
   */
  public function setGradient(Google_Service_Fusiontables_StyleFunctionGradient $gradient)
  {
    $this->gradient = $gradient;
  }
  /**
   * @return Google_Service_Fusiontables_StyleFunctionGradient
   */
  public function getGradient()
  {
    return $this->gradient;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
