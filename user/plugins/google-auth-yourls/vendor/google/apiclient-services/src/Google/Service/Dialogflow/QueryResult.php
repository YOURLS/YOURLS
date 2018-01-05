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

class Google_Service_Dialogflow_QueryResult extends Google_Collection
{
  protected $collection_key = 'outputContexts';
  public $action;
  public $allRequiredParamsPresent;
  public $diagnosticInfo;
  protected $fulfillmentMessagesType = 'Google_Service_Dialogflow_IntentMessage';
  protected $fulfillmentMessagesDataType = 'array';
  public $fulfillmentText;
  protected $intentType = 'Google_Service_Dialogflow_Intent';
  protected $intentDataType = '';
  public $intentDetectionConfidence;
  public $languageCode;
  protected $outputContextsType = 'Google_Service_Dialogflow_Context';
  protected $outputContextsDataType = 'array';
  public $parameters;
  public $queryText;
  public $speechRecognitionConfidence;
  public $webhookPayload;
  public $webhookSource;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setAllRequiredParamsPresent($allRequiredParamsPresent)
  {
    $this->allRequiredParamsPresent = $allRequiredParamsPresent;
  }
  public function getAllRequiredParamsPresent()
  {
    return $this->allRequiredParamsPresent;
  }
  public function setDiagnosticInfo($diagnosticInfo)
  {
    $this->diagnosticInfo = $diagnosticInfo;
  }
  public function getDiagnosticInfo()
  {
    return $this->diagnosticInfo;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessage
   */
  public function setFulfillmentMessages($fulfillmentMessages)
  {
    $this->fulfillmentMessages = $fulfillmentMessages;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessage
   */
  public function getFulfillmentMessages()
  {
    return $this->fulfillmentMessages;
  }
  public function setFulfillmentText($fulfillmentText)
  {
    $this->fulfillmentText = $fulfillmentText;
  }
  public function getFulfillmentText()
  {
    return $this->fulfillmentText;
  }
  /**
   * @param Google_Service_Dialogflow_Intent
   */
  public function setIntent(Google_Service_Dialogflow_Intent $intent)
  {
    $this->intent = $intent;
  }
  /**
   * @return Google_Service_Dialogflow_Intent
   */
  public function getIntent()
  {
    return $this->intent;
  }
  public function setIntentDetectionConfidence($intentDetectionConfidence)
  {
    $this->intentDetectionConfidence = $intentDetectionConfidence;
  }
  public function getIntentDetectionConfidence()
  {
    return $this->intentDetectionConfidence;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_Dialogflow_Context
   */
  public function setOutputContexts($outputContexts)
  {
    $this->outputContexts = $outputContexts;
  }
  /**
   * @return Google_Service_Dialogflow_Context
   */
  public function getOutputContexts()
  {
    return $this->outputContexts;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setQueryText($queryText)
  {
    $this->queryText = $queryText;
  }
  public function getQueryText()
  {
    return $this->queryText;
  }
  public function setSpeechRecognitionConfidence($speechRecognitionConfidence)
  {
    $this->speechRecognitionConfidence = $speechRecognitionConfidence;
  }
  public function getSpeechRecognitionConfidence()
  {
    return $this->speechRecognitionConfidence;
  }
  public function setWebhookPayload($webhookPayload)
  {
    $this->webhookPayload = $webhookPayload;
  }
  public function getWebhookPayload()
  {
    return $this->webhookPayload;
  }
  public function setWebhookSource($webhookSource)
  {
    $this->webhookSource = $webhookSource;
  }
  public function getWebhookSource()
  {
    return $this->webhookSource;
  }
}
