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
 * Service definition for CloudDebugger (v2).
 *
 * <p>
 * Examines the call stack and variables of a running application without
 * stopping or slowing it down.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://cloud.google.com/debugger" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudDebugger extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage cloud debugger. */
  const CLOUD_DEBUGGER =
      "https://www.googleapis.com/auth/cloud_debugger";

  public $controller_debuggees;
  public $controller_debuggees_breakpoints;
  public $debugger_debuggees;
  public $debugger_debuggees_breakpoints;
  
  /**
   * Constructs the internal representation of the CloudDebugger service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://clouddebugger.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2';
    $this->serviceName = 'clouddebugger';

    $this->controller_debuggees = new Google_Service_CloudDebugger_Resource_ControllerDebuggees(
        $this,
        $this->serviceName,
        'debuggees',
        array(
          'methods' => array(
            'register' => array(
              'path' => 'v2/controller/debuggees/register',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->controller_debuggees_breakpoints = new Google_Service_CloudDebugger_Resource_ControllerDebuggeesBreakpoints(
        $this,
        $this->serviceName,
        'breakpoints',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/controller/debuggees/{debuggeeId}/breakpoints',
              'httpMethod' => 'GET',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'successOnTimeout' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'waitToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'v2/controller/debuggees/{debuggeeId}/breakpoints/{id}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->debugger_debuggees = new Google_Service_CloudDebugger_Resource_DebuggerDebuggees(
        $this,
        $this->serviceName,
        'debuggees',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/debugger/debuggees',
              'httpMethod' => 'GET',
              'parameters' => array(
                'includeInactive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'project' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->debugger_debuggees_breakpoints = new Google_Service_CloudDebugger_Resource_DebuggerDebuggeesBreakpoints(
        $this,
        $this->serviceName,
        'breakpoints',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/{breakpointId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'breakpointId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/{breakpointId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'breakpointId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints',
              'httpMethod' => 'GET',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'waitToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'action.value' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeInactive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'includeAllUsers' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'stripResults' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'set' => array(
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/set',
              'httpMethod' => 'POST',
              'parameters' => array(
                'debuggeeId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientVersion' => array(
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
