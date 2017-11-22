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

class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls extends Google_Collection
{
  protected $collection_key = 'details';
  protected $detailsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
  protected $detailsDataType = 'array';
  protected $resultType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
  protected $resultDataType = '';

  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function setResult(Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function getResult()
  {
    return $this->result;
  }
}
