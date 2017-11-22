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

/**
 * The "ampUrls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $acceleratedmobilepageurlService = new Google_Service_Acceleratedmobilepageurl(...);
 *   $ampUrls = $acceleratedmobilepageurlService->ampUrls;
 *  </code>
 */
class Google_Service_Acceleratedmobilepageurl_Resource_AmpUrls extends Google_Service_Resource
{
  /**
   * Returns AMP URL(s) and equivalent [AMP Cache URL(s)](/amp/cache/overview#amp-
   * cache-url-format). (ampUrls.batchGet)
   *
   * @param Google_Service_Acceleratedmobilepageurl_BatchGetAmpUrlsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Acceleratedmobilepageurl_BatchGetAmpUrlsResponse
   */
  public function batchGet(Google_Service_Acceleratedmobilepageurl_BatchGetAmpUrlsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_Acceleratedmobilepageurl_BatchGetAmpUrlsResponse");
  }
}
