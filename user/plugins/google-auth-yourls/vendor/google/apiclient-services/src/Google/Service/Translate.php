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
 * Service definition for Translate (v2).
 *
 * <p>
 * The Google Cloud Translation API lets websites and programs integrate with
 * Google Translate programmatically.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://code.google.com/apis/language/translate/v2/getting_started.html" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Translate extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Translate text from one language to another using Google Translate. */
  const CLOUD_TRANSLATION =
      "https://www.googleapis.com/auth/cloud-translation";

  public $detections;
  public $languages;
  public $translations;
  
  /**
   * Constructs the internal representation of the Translate service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://translation.googleapis.com/';
    $this->servicePath = 'language/translate/';
    $this->version = 'v2';
    $this->serviceName = 'translate';

    $this->detections = new Google_Service_Translate_Resource_Detections(
        $this,
        $this->serviceName,
        'detections',
        array(
          'methods' => array(
            'detect' => array(
              'path' => 'v2/detect',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'v2/detect',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->languages = new Google_Service_Translate_Resource_Languages(
        $this,
        $this->serviceName,
        'languages',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/languages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'target' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->translations = new Google_Service_Translate_Resource_Translations(
        $this,
        $this->serviceName,
        'translations',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2',
              'httpMethod' => 'GET',
              'parameters' => array(
                'q' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ),
                'target' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'model' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'source' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'cid' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'format' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'translate' => array(
              'path' => 'v2',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
