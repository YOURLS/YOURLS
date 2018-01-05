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
 * Service definition for Taskqueue (v1beta2).
 *
 * <p>
 * Accesses a Google App Engine Pull Task Queue over REST.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/appengine/docs/python/taskqueue/rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Taskqueue extends Google_Service
{
  /** Manage your Tasks and Taskqueues. */
  const TASKQUEUE =
      "https://www.googleapis.com/auth/taskqueue";
  /** Consume Tasks from your Taskqueues. */
  const TASKQUEUE_CONSUMER =
      "https://www.googleapis.com/auth/taskqueue.consumer";

  public $taskqueues;
  public $tasks;
  
  /**
   * Constructs the internal representation of the Taskqueue service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'taskqueue/v1beta2/projects/';
    $this->version = 'v1beta2';
    $this->serviceName = 'taskqueue';

    $this->taskqueues = new Google_Service_Taskqueue_Resource_Taskqueues(
        $this,
        $this->serviceName,
        'taskqueues',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{project}/taskqueues/{taskqueue}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'getStats' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->tasks = new Google_Service_Taskqueue_Resource_Tasks(
        $this,
        $this->serviceName,
        'tasks',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'lease' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks/lease',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'numTasks' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'leaseSecs' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
                'groupByTag' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'tag' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'newLeaseSeconds' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'taskqueue' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'newLeaseSeconds' => array(
                  'location' => 'query',
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
