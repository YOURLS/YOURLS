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

class Google_Service_Spanner_CommitRequest extends Google_Collection
{
  protected $collection_key = 'mutations';
  protected $mutationsType = 'Google_Service_Spanner_Mutation';
  protected $mutationsDataType = 'array';
  protected $singleUseTransactionType = 'Google_Service_Spanner_TransactionOptions';
  protected $singleUseTransactionDataType = '';
  public $transactionId;

  /**
   * @param Google_Service_Spanner_Mutation
   */
  public function setMutations($mutations)
  {
    $this->mutations = $mutations;
  }
  /**
   * @return Google_Service_Spanner_Mutation
   */
  public function getMutations()
  {
    return $this->mutations;
  }
  /**
   * @param Google_Service_Spanner_TransactionOptions
   */
  public function setSingleUseTransaction(Google_Service_Spanner_TransactionOptions $singleUseTransaction)
  {
    $this->singleUseTransaction = $singleUseTransaction;
  }
  /**
   * @return Google_Service_Spanner_TransactionOptions
   */
  public function getSingleUseTransaction()
  {
    return $this->singleUseTransaction;
  }
  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  public function getTransactionId()
  {
    return $this->transactionId;
  }
}
