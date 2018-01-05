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

class Google_Service_Firestore_RunQueryRequest extends Google_Model
{
  protected $newTransactionType = 'Google_Service_Firestore_TransactionOptions';
  protected $newTransactionDataType = '';
  public $readTime;
  protected $structuredQueryType = 'Google_Service_Firestore_StructuredQuery';
  protected $structuredQueryDataType = '';
  public $transaction;

  /**
   * @param Google_Service_Firestore_TransactionOptions
   */
  public function setNewTransaction(Google_Service_Firestore_TransactionOptions $newTransaction)
  {
    $this->newTransaction = $newTransaction;
  }
  /**
   * @return Google_Service_Firestore_TransactionOptions
   */
  public function getNewTransaction()
  {
    return $this->newTransaction;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  /**
   * @param Google_Service_Firestore_StructuredQuery
   */
  public function setStructuredQuery(Google_Service_Firestore_StructuredQuery $structuredQuery)
  {
    $this->structuredQuery = $structuredQuery;
  }
  /**
   * @return Google_Service_Firestore_StructuredQuery
   */
  public function getStructuredQuery()
  {
    return $this->structuredQuery;
  }
  public function setTransaction($transaction)
  {
    $this->transaction = $transaction;
  }
  public function getTransaction()
  {
    return $this->transaction;
  }
}
