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

class Google_Service_Dialogflow_Intent extends Google_Collection
{
  protected $collection_key = 'trainingPhrases';
  public $action;
  public $defaultResponsePlatforms;
  public $displayName;
  public $events;
  protected $followupIntentInfoType = 'Google_Service_Dialogflow_IntentFollowupIntentInfo';
  protected $followupIntentInfoDataType = 'array';
  public $inputContextNames;
  public $isFallback;
  protected $messagesType = 'Google_Service_Dialogflow_IntentMessage';
  protected $messagesDataType = 'array';
  public $mlEnabled;
  public $name;
  protected $outputContextsType = 'Google_Service_Dialogflow_Context';
  protected $outputContextsDataType = 'array';
  protected $parametersType = 'Google_Service_Dialogflow_IntentParameter';
  protected $parametersDataType = 'array';
  public $parentFollowupIntentName;
  public $priority;
  public $resetContexts;
  public $rootFollowupIntentName;
  protected $trainingPhrasesType = 'Google_Service_Dialogflow_IntentTrainingPhrase';
  protected $trainingPhrasesDataType = 'array';
  public $webhookState;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setDefaultResponsePlatforms($defaultResponsePlatforms)
  {
    $this->defaultResponsePlatforms = $defaultResponsePlatforms;
  }
  public function getDefaultResponsePlatforms()
  {
    return $this->defaultResponsePlatforms;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEvents($events)
  {
    $this->events = $events;
  }
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param Google_Service_Dialogflow_IntentFollowupIntentInfo
   */
  public function setFollowupIntentInfo($followupIntentInfo)
  {
    $this->followupIntentInfo = $followupIntentInfo;
  }
  /**
   * @return Google_Service_Dialogflow_IntentFollowupIntentInfo
   */
  public function getFollowupIntentInfo()
  {
    return $this->followupIntentInfo;
  }
  public function setInputContextNames($inputContextNames)
  {
    $this->inputContextNames = $inputContextNames;
  }
  public function getInputContextNames()
  {
    return $this->inputContextNames;
  }
  public function setIsFallback($isFallback)
  {
    $this->isFallback = $isFallback;
  }
  public function getIsFallback()
  {
    return $this->isFallback;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessage
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessage
   */
  public function getMessages()
  {
    return $this->messages;
  }
  public function setMlEnabled($mlEnabled)
  {
    $this->mlEnabled = $mlEnabled;
  }
  public function getMlEnabled()
  {
    return $this->mlEnabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
  /**
   * @param Google_Service_Dialogflow_IntentParameter
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_Dialogflow_IntentParameter
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setParentFollowupIntentName($parentFollowupIntentName)
  {
    $this->parentFollowupIntentName = $parentFollowupIntentName;
  }
  public function getParentFollowupIntentName()
  {
    return $this->parentFollowupIntentName;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setResetContexts($resetContexts)
  {
    $this->resetContexts = $resetContexts;
  }
  public function getResetContexts()
  {
    return $this->resetContexts;
  }
  public function setRootFollowupIntentName($rootFollowupIntentName)
  {
    $this->rootFollowupIntentName = $rootFollowupIntentName;
  }
  public function getRootFollowupIntentName()
  {
    return $this->rootFollowupIntentName;
  }
  /**
   * @param Google_Service_Dialogflow_IntentTrainingPhrase
   */
  public function setTrainingPhrases($trainingPhrases)
  {
    $this->trainingPhrases = $trainingPhrases;
  }
  /**
   * @return Google_Service_Dialogflow_IntentTrainingPhrase
   */
  public function getTrainingPhrases()
  {
    return $this->trainingPhrases;
  }
  public function setWebhookState($webhookState)
  {
    $this->webhookState = $webhookState;
  }
  public function getWebhookState()
  {
    return $this->webhookState;
  }
}
