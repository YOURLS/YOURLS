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
 * The "template" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $template = $fusiontablesService->template;
 *  </code>
 */
class Google_Service_Fusiontables_Resource_Template extends Google_Service_Resource
{
  /**
   * Deletes a template (template.delete)
   *
   * @param string $tableId Table from which the template is being deleted
   * @param int $templateId Identifier for the template which is being deleted
   * @param array $optParams Optional parameters.
   */
  public function delete($tableId, $templateId, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'templateId' => $templateId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a specific template by its id (template.get)
   *
   * @param string $tableId Table to which the template belongs
   * @param int $templateId Identifier for the template that is being requested
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Template
   */
  public function get($tableId, $templateId, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'templateId' => $templateId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Fusiontables_Template");
  }
  /**
   * Creates a new template for the table. (template.insert)
   *
   * @param string $tableId Table for which a new template is being created
   * @param Google_Service_Fusiontables_Template $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Template
   */
  public function insert($tableId, Google_Service_Fusiontables_Template $postBody, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Fusiontables_Template");
  }
  /**
   * Retrieves a list of templates. (template.listTemplate)
   *
   * @param string $tableId Identifier for the table whose templates are being
   * requested
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of templates to return. Optional.
   * Default is 5.
   * @opt_param string pageToken Continuation token specifying which results page
   * to return. Optional.
   * @return Google_Service_Fusiontables_TemplateList
   */
  public function listTemplate($tableId, $optParams = array())
  {
    $params = array('tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Fusiontables_TemplateList");
  }
  /**
   * Updates an existing template. This method supports patch semantics.
   * (template.patch)
   *
   * @param string $tableId Table to which the updated template belongs
   * @param int $templateId Identifier for the template that is being updated
   * @param Google_Service_Fusiontables_Template $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Template
   */
  public function patch($tableId, $templateId, Google_Service_Fusiontables_Template $postBody, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'templateId' => $templateId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Fusiontables_Template");
  }
  /**
   * Updates an existing template (template.update)
   *
   * @param string $tableId Table to which the updated template belongs
   * @param int $templateId Identifier for the template that is being updated
   * @param Google_Service_Fusiontables_Template $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Fusiontables_Template
   */
  public function update($tableId, $templateId, Google_Service_Fusiontables_Template $postBody, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'templateId' => $templateId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Fusiontables_Template");
  }
}
