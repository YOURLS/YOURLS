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
 * Service definition for Fusiontables (v2).
 *
 * <p>
 * API for working with Fusion Tables data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fusiontables" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Fusiontables extends Google_Service
{
  /** Manage your Fusion Tables. */
  const FUSIONTABLES =
      "https://www.googleapis.com/auth/fusiontables";
  /** View your Fusion Tables. */
  const FUSIONTABLES_READONLY =
      "https://www.googleapis.com/auth/fusiontables.readonly";

  public $column;
  public $query;
  public $style;
  public $table;
  public $task;
  public $template;
  
  /**
   * Constructs the internal representation of the Fusiontables service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'fusiontables/v2/';
    $this->version = 'v2';
    $this->serviceName = 'fusiontables';

    $this->column = new Google_Service_Fusiontables_Resource_Column(
        $this,
        $this->serviceName,
        'column',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tables/{tableId}/columns/{columnId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'columnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/columns/{columnId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'columnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'tables/{tableId}/columns',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{tableId}/columns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tables/{tableId}/columns/{columnId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'columnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tables/{tableId}/columns/{columnId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'columnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->query = new Google_Service_Fusiontables_Resource_Query(
        $this,
        $this->serviceName,
        'query',
        array(
          'methods' => array(
            'sql' => array(
              'path' => 'query',
              'httpMethod' => 'POST',
              'parameters' => array(
                'sql' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hdrs' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'typed' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'sqlGet' => array(
              'path' => 'query',
              'httpMethod' => 'GET',
              'parameters' => array(
                'sql' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'hdrs' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'typed' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->style = new Google_Service_Fusiontables_Resource_Style(
        $this,
        $this->serviceName,
        'style',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tables/{tableId}/styles/{styleId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'styleId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/styles/{styleId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'styleId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'tables/{tableId}/styles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{tableId}/styles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tables/{tableId}/styles/{styleId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'styleId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tables/{tableId}/styles/{styleId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'styleId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->table = new Google_Service_Fusiontables_Resource_Table(
        $this,
        $this->serviceName,
        'table',
        array(
          'methods' => array(
            'copy' => array(
              'path' => 'tables/{tableId}/copy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'copyPresentation' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'tables/{tableId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'importRows' => array(
              'path' => 'tables/{tableId}/import',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'delimiter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'encoding' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endLine' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'isStrict' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'startLine' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'importTable' => array(
              'path' => 'tables/import',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'delimiter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'encoding' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'tables',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'tables',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tables/{tableId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replaceViewDefinition' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'replaceRows' => array(
              'path' => 'tables/{tableId}/replace',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'delimiter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'encoding' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endLine' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'isStrict' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'startLine' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'update' => array(
              'path' => 'tables/{tableId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replaceViewDefinition' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->task = new Google_Service_Fusiontables_Resource_Task(
        $this,
        $this->serviceName,
        'task',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tables/{tableId}/tasks/{taskId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/tasks/{taskId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{tableId}/tasks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->template = new Google_Service_Fusiontables_Resource_Template(
        $this,
        $this->serviceName,
        'template',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tables/{tableId}/templates/{templateId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'templateId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/templates/{templateId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'templateId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'tables/{tableId}/templates',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{tableId}/templates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tables/{tableId}/templates/{templateId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'templateId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tables/{tableId}/templates/{templateId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'templateId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
