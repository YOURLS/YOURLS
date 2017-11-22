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

class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocks extends Google_Collection
{
  protected $collection_key = 'urls';
  protected $headerType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
  protected $headerDataType = '';
  protected $urlsType = 'Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls';
  protected $urlsDataType = 'array';

  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function setHeader(Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls
   */
  public function setUrls($urls)
  {
    $this->urls = $urls;
  }
  /**
   * @return Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls
   */
  public function getUrls()
  {
    return $this->urls;
  }
}
