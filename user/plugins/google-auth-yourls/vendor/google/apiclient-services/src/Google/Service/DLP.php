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
 * Service definition for DLP (v2beta1).
 *
 * <p>
 * The Google Data Loss Prevention API provides methods for detection of
 * privacy-sensitive fragments in text, images, and Google Cloud Platform
 * storage repositories.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/dlp/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_DLP extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $content;
  public $dataSource;
  public $inspect_operations;
  public $inspect_results_findings;
  public $riskAnalysis_operations;
  public $rootCategories;
  public $rootCategories_infoTypes;
  
  /**
   * Constructs the internal representation of the DLP service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://dlp.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v2beta1';
    $this->serviceName = 'dlp';

    $this->content = new Google_Service_DLP_Resource_Content(
        $this,
        $this->serviceName,
        'content',
        array(
          'methods' => array(
            'deidentify' => array(
              'path' => 'v2beta1/content:deidentify',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'inspect' => array(
              'path' => 'v2beta1/content:inspect',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'redact' => array(
              'path' => 'v2beta1/content:redact',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->dataSource = new Google_Service_DLP_Resource_DataSource(
        $this,
        $this->serviceName,
        'dataSource',
        array(
          'methods' => array(
            'analyze' => array(
              'path' => 'v2beta1/dataSource:analyze',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->inspect_operations = new Google_Service_DLP_Resource_InspectOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v2beta1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v2beta1/inspect/operations',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->inspect_results_findings = new Google_Service_DLP_Resource_InspectResultsFindings(
        $this,
        $this->serviceName,
        'findings',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/{+name}/findings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->riskAnalysis_operations = new Google_Service_DLP_Resource_RiskAnalysisOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v2beta1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->rootCategories = new Google_Service_DLP_Resource_RootCategories(
        $this,
        $this->serviceName,
        'rootCategories',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/rootCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->rootCategories_infoTypes = new Google_Service_DLP_Resource_RootCategoriesInfoTypes(
        $this,
        $this->serviceName,
        'infoTypes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2beta1/rootCategories/{+category}/infoTypes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'category' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'languageCode' => array(
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
