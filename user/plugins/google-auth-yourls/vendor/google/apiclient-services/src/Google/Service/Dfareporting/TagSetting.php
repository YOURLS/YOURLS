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

class Google_Service_Dfareporting_TagSetting extends Google_Model
{
  public $additionalKeyValues;
  public $includeClickThroughUrls;
  public $includeClickTracking;
  public $keywordOption;

  public function setAdditionalKeyValues($additionalKeyValues)
  {
    $this->additionalKeyValues = $additionalKeyValues;
  }
  public function getAdditionalKeyValues()
  {
    return $this->additionalKeyValues;
  }
  public function setIncludeClickThroughUrls($includeClickThroughUrls)
  {
    $this->includeClickThroughUrls = $includeClickThroughUrls;
  }
  public function getIncludeClickThroughUrls()
  {
    return $this->includeClickThroughUrls;
  }
  public function setIncludeClickTracking($includeClickTracking)
  {
    $this->includeClickTracking = $includeClickTracking;
  }
  public function getIncludeClickTracking()
  {
    return $this->includeClickTracking;
  }
  public function setKeywordOption($keywordOption)
  {
    $this->keywordOption = $keywordOption;
  }
  public function getKeywordOption()
  {
    return $this->keywordOption;
  }
}
