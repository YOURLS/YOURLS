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
 * The "controlwidgets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $controlwidgets = $devprojectsService->controlwidgets;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Controlwidgets extends Google_Service_Resource
{
  /**
   * Get embedding parameters for a control widget (controlwidgets.embed)
   *
   * @param string $projectId Project that might be relevant to the widget.
   * @param string $widgetId The definition ID of the control widget.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string kv Column separated key value parameters
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_EmbeddingParameters
   */
  public function embed($projectId, $widgetId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'widgetId' => $widgetId);
    $params = array_merge($params, $optParams);
    return $this->call('embed', array($params), "Google_Service_Devprojects_EmbeddingParameters");
  }
}
