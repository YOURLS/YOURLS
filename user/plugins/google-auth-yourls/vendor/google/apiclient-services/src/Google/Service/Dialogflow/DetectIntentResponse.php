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

class Google_Service_Dialogflow_DetectIntentResponse extends Google_Model
{
  protected $queryResultType = 'Google_Service_Dialogflow_QueryResult';
  protected $queryResultDataType = '';
  public $responseId;
  protected $webhookStatusType = 'Google_Service_Dialogflow_Status';
  protected $webhookStatusDataType = '';

  /**
   * @param Google_Service_Dialogflow_QueryResult
   */
  public function setQueryResult(Google_Service_Dialogflow_QueryResult $queryResult)
  {
    $this->queryResult = $queryResult;
  }
  /**
   * @return Google_Service_Dialogflow_QueryResult
   */
  public function getQueryResult()
  {
    return $this->queryResult;
  }
  public function setResponseId($responseId)
  {
    $this->responseId = $responseId;
  }
  public function getResponseId()
  {
    return $this->responseId;
  }
  /**
   * @param Google_Service_Dialogflow_Status
   */
  public function setWebhookStatus(Google_Service_Dialogflow_Status $webhookStatus)
  {
    $this->webhookStatus = $webhookStatus;
  }
  /**
   * @return Google_Service_Dialogflow_Status
   */
  public function getWebhookStatus()
  {
    return $this->webhookStatus;
  }
}
