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
 * Service definition for Vault (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://apps.google.com/products/vault/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Vault extends Google_Service
{


  public $matters;
  public $matters_holds;
  public $matters_holds_accounts;
  
  /**
   * Constructs the internal representation of the Vault service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://vault.googleapis.com/';
    $this->servicePath = '';
    $this->version = 'v1';
    $this->serviceName = 'vault';

    $this->matters = new Google_Service_Vault_Resource_Matters(
        $this,
        $this->serviceName,
        'matters',
        array(
          'methods' => array(
            'addPermissions' => array(
              'path' => 'v1/matters/{matterId}:addPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'close' => array(
              'path' => 'v1/matters/{matterId}:close',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/matters',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'removePermissions' => array(
              'path' => 'v1/matters/{matterId}:removePermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'reopen' => array(
              'path' => 'v1/matters/{matterId}:reopen',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'v1/matters/{matterId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->matters_holds = new Google_Service_Vault_Resource_MattersHolds(
        $this,
        $this->serviceName,
        'holds',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'update' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->matters_holds_accounts = new Google_Service_Vault_Resource_MattersHoldsAccounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts/{accountId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
