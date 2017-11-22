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
 * The "scripts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $scriptService = new Google_Service_Script(...);
 *   $scripts = $scriptService->scripts;
 *  </code>
 */
class Google_Service_Script_Resource_Scripts extends Google_Service_Resource
{
  /**
   * Runs a function in an Apps Script project. The project must be deployed for
   * use with the Apps Script API.
   *
   * This method requires authorization with an OAuth 2.0 token that includes at
   * least one of the scopes listed in the [Authorization](#authorization)
   * section; script projects that do not require authorization cannot be executed
   * through this API. To find the correct scopes to include in the authentication
   * token, open the project in the script editor, then select **File > Project
   * properties** and click the **Scopes** tab. (scripts.run)
   *
   * @param string $scriptId The script ID of the script to be executed. To find
   * the script ID, open the project in the script editor and select **File >
   * Project properties**.
   * @param Google_Service_Script_ExecutionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Script_Operation
   */
  public function run($scriptId, Google_Service_Script_ExecutionRequest $postBody, $optParams = array())
  {
    $params = array('scriptId' => $scriptId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_Script_Operation");
  }
}
