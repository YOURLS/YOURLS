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

class Google_Service_Firestore_BatchGetDocumentsRequest extends Google_Collection
{
  protected $collection_key = 'documents';
  public $documents;
  protected $maskType = 'Google_Service_Firestore_DocumentMask';
  protected $maskDataType = '';
  protected $newTransactionType = 'Google_Service_Firestore_TransactionOptions';
  protected $newTransactionDataType = '';
  public $readTime;
  public $transaction;

  public function setDocuments($documents)
  {
    $this->documents = $documents;
  }
  public function getDocuments()
  {
    return $this->documents;
  }
  /**
   * @param Google_Service_Firestore_DocumentMask
   */
  public function setMask(Google_Service_Firestore_DocumentMask $mask)
  {
    $this->mask = $mask;
  }
  /**
   * @return Google_Service_Firestore_DocumentMask
   */
  public function getMask()
  {
    return $this->mask;
  }
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
  public function setTransaction($transaction)
  {
    $this->transaction = $transaction;
  }
  public function getTransaction()
  {
    return $this->transaction;
  }
}
