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

class Google_Service_Logging_BucketOptions extends Google_Model
{
  protected $explicitBucketsType = 'Google_Service_Logging_Explicit';
  protected $explicitBucketsDataType = '';
  protected $exponentialBucketsType = 'Google_Service_Logging_Exponential';
  protected $exponentialBucketsDataType = '';
  protected $linearBucketsType = 'Google_Service_Logging_Linear';
  protected $linearBucketsDataType = '';

  /**
   * @param Google_Service_Logging_Explicit
   */
  public function setExplicitBuckets(Google_Service_Logging_Explicit $explicitBuckets)
  {
    $this->explicitBuckets = $explicitBuckets;
  }
  /**
   * @return Google_Service_Logging_Explicit
   */
  public function getExplicitBuckets()
  {
    return $this->explicitBuckets;
  }
  /**
   * @param Google_Service_Logging_Exponential
   */
  public function setExponentialBuckets(Google_Service_Logging_Exponential $exponentialBuckets)
  {
    $this->exponentialBuckets = $exponentialBuckets;
  }
  /**
   * @return Google_Service_Logging_Exponential
   */
  public function getExponentialBuckets()
  {
    return $this->exponentialBuckets;
  }
  /**
   * @param Google_Service_Logging_Linear
   */
  public function setLinearBuckets(Google_Service_Logging_Linear $linearBuckets)
  {
    $this->linearBuckets = $linearBuckets;
  }
  /**
   * @return Google_Service_Logging_Linear
   */
  public function getLinearBuckets()
  {
    return $this->linearBuckets;
  }
}
