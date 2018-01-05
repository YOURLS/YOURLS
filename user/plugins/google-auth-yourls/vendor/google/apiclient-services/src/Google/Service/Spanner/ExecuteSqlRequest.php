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

class Google_Service_Spanner_ExecuteSqlRequest extends Google_Model
{
  protected $paramTypesType = 'Google_Service_Spanner_Type';
  protected $paramTypesDataType = 'map';
  public $params;
  public $queryMode;
  public $resumeToken;
  public $sql;
  protected $transactionType = 'Google_Service_Spanner_TransactionSelector';
  protected $transactionDataType = '';

  /**
   * @param Google_Service_Spanner_Type
   */
  public function setParamTypes($paramTypes)
  {
    $this->paramTypes = $paramTypes;
  }
  /**
   * @return Google_Service_Spanner_Type
   */
  public function getParamTypes()
  {
    return $this->paramTypes;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
  public function setQueryMode($queryMode)
  {
    $this->queryMode = $queryMode;
  }
  public function getQueryMode()
  {
    return $this->queryMode;
  }
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  public function setSql($sql)
  {
    $this->sql = $sql;
  }
  public function getSql()
  {
    return $this->sql;
  }
  /**
   * @param Google_Service_Spanner_TransactionSelector
   */
  public function setTransaction(Google_Service_Spanner_TransactionSelector $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return Google_Service_Spanner_TransactionSelector
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}
