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
 * Service definition for Devprojects (v1).
 *
 * <p>
 * This API enables programmatic access to various capabilities exposed in the
 * Google APIs Console (aka DevConsole), including project, team, and auth
 * management.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://goto.google.com/devconsoleapi/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Devprojects extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Compute Engine resources. */
  const COMPUTE =
      "https://www.googleapis.com/auth/compute";

  public $activationLinks;
  public $apiconsumers;
  public $apis;
  public $controlwidgets;
  public $domains;
  public $projects;
  public $toses;
  public $users;
  
  /**
   * Constructs the internal representation of the Devprojects service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'devprojects/v1/';
    $this->version = 'v1';
    $this->serviceName = 'devprojects';

    $this->activationLinks = new Google_Service_Devprojects_Resource_ActivationLinks(
        $this,
        $this->serviceName,
        'activationLinks',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'activationLinks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'user' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'validate' => array(
              'path' => 'activationLinks/validate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->apiconsumers = new Google_Service_Devprojects_Resource_Apiconsumers(
        $this,
        $this->serviceName,
        'apiconsumers',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'apiconsumers',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'apiIdToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'consumerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'producerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'apiconsumers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'apiconsumers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'apiIdToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'producerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'apiconsumers',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->apis = new Google_Service_Devprojects_Resource_Apis(
        $this,
        $this->serviceName,
        'apis',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'apis/{apisId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'apisId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'apis',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listconsumed' => array(
              'path' => 'apis/consumed',
              'httpMethod' => 'GET',
              'parameters' => array(
                'consumerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listproduced' => array(
              'path' => 'apis/produced',
              'httpMethod' => 'GET',
              'parameters' => array(
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'producerProjectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->controlwidgets = new Google_Service_Devprojects_Resource_Controlwidgets(
        $this,
        $this->serviceName,
        'controlwidgets',
        array(
          'methods' => array(
            'embed' => array(
              'path' => 'controlwidgets/{projectId}/{widgetId}/embed',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'widgetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'kv' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->domains = new Google_Service_Devprojects_Resource_Domains(
        $this,
        $this->serviceName,
        'domains',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'domains/{domainsId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'domainsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'domains',
              'httpMethod' => 'POST',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'domains/{domainsId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'domainsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'domains/{domainsId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'domainsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_Devprojects_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'projects/{projectId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'disableAuthorizationCheck' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'developerkeytoprojectid' => array(
              'path' => 'projects/developerkey/{developerKey}/toprojectid',
              'httpMethod' => 'GET',
              'parameters' => array(
                'developerKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'projects/{projectId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'retrieveCurrentUserRole' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getprojectclientstructure' => array(
              'path' => 'projects/getprojectclientstructure',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'insert' => array(
              'path' => 'projects',
              'httpMethod' => 'POST',
              'parameters' => array(
                'initialOwner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'retryRequest' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'projects',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fillSection' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'includeNonActive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includedShard' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requiredApiId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'requiredSection' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'retrieveCurrentUserRole' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'user' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'notifyowners' => array(
              'path' => 'projects/{projectsId}/notifyowners',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectsId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'projects/{projectId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'user' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'stringidtonumericid' => array(
              'path' => 'projects/stringid/{project}/tonumericid',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'undelete' => array(
              'path' => 'projects/{projectId}/undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'projects/{projectId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'user' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->toses = new Google_Service_Devprojects_Resource_Toses(
        $this,
        $this->serviceName,
        'toses',
        array(
          'methods' => array(
            'accept' => array(
              'path' => 'toses/accept',
              'httpMethod' => 'POST',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'check' => array(
              'path' => 'toses/check',
              'httpMethod' => 'POST',
              'parameters' => array(
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'toses/{tosId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tosId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'toses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'apiKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'user' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_Devprojects_Resource_Users(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'users/{userId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'users/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'section' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'whitelistId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
