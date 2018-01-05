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
 * Service definition for CloudNaturalLanguageAPI (v1beta1).
 *
 * <p>
 * Google Cloud Natural Language API provides natural language understanding
 * technologies to developers. Examples include sentiment analysis, entity
 * recognition, and text annotations.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/natural-language/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudNaturalLanguageAPI extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $documents;
  
  /**
   * Constructs the internal representation of the CloudNaturalLanguageAPI
   * service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://language.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1beta1';
    $this->serviceName = 'language';

    $this->documents = new Google_Service_CloudNaturalLanguageAPI_Resource_Documents(
        $this,
        $this->serviceName,
        'documents',
        array(
          'methods' => array(
            'analyzeEntities' => array(
              'path' => 'v1beta1/documents:analyzeEntities',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'analyzeSentiment' => array(
              'path' => 'v1beta1/documents:analyzeSentiment',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'annotateText' => array(
              'path' => 'v1beta1/documents:annotateText',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
