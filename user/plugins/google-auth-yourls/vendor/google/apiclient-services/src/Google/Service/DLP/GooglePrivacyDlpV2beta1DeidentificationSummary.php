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

class Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentificationSummary extends Google_Collection
{
  protected $collection_key = 'transformationSummaries';
  protected $transformationSummariesType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1TransformationSummary';
  protected $transformationSummariesDataType = 'array';
  public $transformedBytes;

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1TransformationSummary
   */
  public function setTransformationSummaries($transformationSummaries)
  {
    $this->transformationSummaries = $transformationSummaries;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1TransformationSummary
   */
  public function getTransformationSummaries()
  {
    return $this->transformationSummaries;
  }
  public function setTransformedBytes($transformedBytes)
  {
    $this->transformedBytes = $transformedBytes;
  }
  public function getTransformedBytes()
  {
    return $this->transformedBytes;
  }
}
