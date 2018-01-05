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
 * Service definition for ToolResults (v1beta3).
 *
 * <p>
 * Reads and publishes results from Firebase Test Lab.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/test-lab/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ToolResults extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects;
  public $projects_histories;
  public $projects_histories_executions;
  public $projects_histories_executions_clusters;
  public $projects_histories_executions_steps;
  public $projects_histories_executions_steps_perfMetricsSummary;
  public $projects_histories_executions_steps_perfSampleSeries;
  public $projects_histories_executions_steps_perfSampleSeries_samples;
  public $projects_histories_executions_steps_thumbnails;
  
  /**
   * Constructs the internal representation of the ToolResults service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'toolresults/v1beta3/projects/';
    $this->version = 'v1beta3';
    $this->serviceName = 'toolresults';

    $this->projects = new Google_Service_ToolResults_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'getSettings' => array(
              'path' => '{projectId}/settings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'initializeSettings' => array(
              'path' => '{projectId}:initializeSettings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories = new Google_Service_ToolResults_Resource_ProjectsHistories(
        $this,
        $this->serviceName,
        'histories',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/histories',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => '{projectId}/histories/{historyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filterByName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutions(
        $this,
        $this->serviceName,
        'executions',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_clusters = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsClusters(
        $this,
        $this->serviceName,
        'clusters',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/clusters/{clusterId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_steps = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsSteps(
        $this,
        $this->serviceName,
        'steps',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getPerfMetricsSummary' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'publishXunitXmlFiles' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}:publishXunitXmlFiles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_steps_perfMetricsSummary = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfMetricsSummary(
        $this,
        $this->serviceName,
        'perfMetricsSummary',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_steps_perfSampleSeries = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfSampleSeries(
        $this,
        $this->serviceName,
        'perfSampleSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_steps_perfSampleSeries_samples = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfSampleSeriesSamples(
        $this,
        $this->serviceName,
        'samples',
        array(
          'methods' => array(
            'batchCreate' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_histories_executions_steps_thumbnails = new Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsThumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/thumbnails',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
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
