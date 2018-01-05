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
 * Service definition for IdentityToolkit (v3).
 *
 * <p>
 * Help the third party sites to implement federated login.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/identity-toolkit/v3/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_IdentityToolkit extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and administer all your Firebase data and settings. */
  const FIREBASE =
      "https://www.googleapis.com/auth/firebase";

  public $relyingparty;
  
  /**
   * Constructs the internal representation of the IdentityToolkit service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'identitytoolkit/v3/relyingparty/';
    $this->version = 'v3';
    $this->serviceName = 'identitytoolkit';

    $this->relyingparty = new Google_Service_IdentityToolkit_Resource_Relyingparty(
        $this,
        $this->serviceName,
        'relyingparty',
        array(
          'methods' => array(
            'createAuthUri' => array(
              'path' => 'createAuthUri',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'deleteAccount' => array(
              'path' => 'deleteAccount',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'downloadAccount' => array(
              'path' => 'downloadAccount',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'emailLinkSignin' => array(
              'path' => 'emailLinkSignin',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'getAccountInfo' => array(
              'path' => 'getAccountInfo',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'getOobConfirmationCode' => array(
              'path' => 'getOobConfirmationCode',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'getProjectConfig' => array(
              'path' => 'getProjectConfig',
              'httpMethod' => 'GET',
              'parameters' => array(
                'delegatedProjectNumber' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectNumber' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getPublicKeys' => array(
              'path' => 'publicKeys',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'getRecaptchaParam' => array(
              'path' => 'getRecaptchaParam',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'resetPassword' => array(
              'path' => 'resetPassword',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'sendVerificationCode' => array(
              'path' => 'sendVerificationCode',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'setAccountInfo' => array(
              'path' => 'setAccountInfo',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'setProjectConfig' => array(
              'path' => 'setProjectConfig',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'signOutUser' => array(
              'path' => 'signOutUser',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'signupNewUser' => array(
              'path' => 'signupNewUser',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'uploadAccount' => array(
              'path' => 'uploadAccount',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'verifyAssertion' => array(
              'path' => 'verifyAssertion',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'verifyCustomToken' => array(
              'path' => 'verifyCustomToken',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'verifyPassword' => array(
              'path' => 'verifyPassword',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'verifyPhoneNumber' => array(
              'path' => 'verifyPhoneNumber',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
