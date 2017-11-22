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
 * The "content" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $content = $dlpService->content;
 *  </code>
 */
class Google_Service_DLP_Resource_Content extends Google_Service_Resource
{
  /**
   * De-identifies potentially sensitive info from a list of strings. This method
   * has limits on input size and output size. (content.deidentify)
   *
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyContentResponse
   */
  public function deidentify(Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyContentRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deidentify', array($params), "Google_Service_DLP_GooglePrivacyDlpV2beta1DeidentifyContentResponse");
  }
  /**
   * Finds potentially sensitive info in a list of strings. This method has limits
   * on input size, processing time, and output size. (content.inspect)
   *
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1InspectContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1InspectContentResponse
   */
  public function inspect(Google_Service_DLP_GooglePrivacyDlpV2beta1InspectContentRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('inspect', array($params), "Google_Service_DLP_GooglePrivacyDlpV2beta1InspectContentResponse");
  }
  /**
   * Redacts potentially sensitive info from a list of strings. This method has
   * limits on input size, processing time, and output size. (content.redact)
   *
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1RedactContentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1RedactContentResponse
   */
  public function redact(Google_Service_DLP_GooglePrivacyDlpV2beta1RedactContentRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('redact', array($params), "Google_Service_DLP_GooglePrivacyDlpV2beta1RedactContentResponse");
  }
}
