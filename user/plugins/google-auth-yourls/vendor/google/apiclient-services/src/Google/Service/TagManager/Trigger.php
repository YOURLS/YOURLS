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

class Google_Service_TagManager_Trigger extends Google_Collection
{
  protected $collection_key = 'parameter';
  public $accountId;
  protected $autoEventFilterType = 'Google_Service_TagManager_Condition';
  protected $autoEventFilterDataType = 'array';
  protected $checkValidationType = 'Google_Service_TagManager_Parameter';
  protected $checkValidationDataType = '';
  public $containerId;
  protected $continuousTimeMinMillisecondsType = 'Google_Service_TagManager_Parameter';
  protected $continuousTimeMinMillisecondsDataType = '';
  protected $customEventFilterType = 'Google_Service_TagManager_Condition';
  protected $customEventFilterDataType = 'array';
  protected $eventNameType = 'Google_Service_TagManager_Parameter';
  protected $eventNameDataType = '';
  protected $filterType = 'Google_Service_TagManager_Condition';
  protected $filterDataType = 'array';
  public $fingerprint;
  protected $horizontalScrollPercentageListType = 'Google_Service_TagManager_Parameter';
  protected $horizontalScrollPercentageListDataType = '';
  protected $intervalType = 'Google_Service_TagManager_Parameter';
  protected $intervalDataType = '';
  protected $intervalSecondsType = 'Google_Service_TagManager_Parameter';
  protected $intervalSecondsDataType = '';
  protected $limitType = 'Google_Service_TagManager_Parameter';
  protected $limitDataType = '';
  protected $maxTimerLengthSecondsType = 'Google_Service_TagManager_Parameter';
  protected $maxTimerLengthSecondsDataType = '';
  public $name;
  public $notes;
  protected $parameterType = 'Google_Service_TagManager_Parameter';
  protected $parameterDataType = 'array';
  public $parentFolderId;
  public $path;
  protected $selectorType = 'Google_Service_TagManager_Parameter';
  protected $selectorDataType = '';
  public $tagManagerUrl;
  protected $totalTimeMinMillisecondsType = 'Google_Service_TagManager_Parameter';
  protected $totalTimeMinMillisecondsDataType = '';
  public $triggerId;
  public $type;
  protected $uniqueTriggerIdType = 'Google_Service_TagManager_Parameter';
  protected $uniqueTriggerIdDataType = '';
  protected $verticalScrollPercentageListType = 'Google_Service_TagManager_Parameter';
  protected $verticalScrollPercentageListDataType = '';
  protected $visibilitySelectorType = 'Google_Service_TagManager_Parameter';
  protected $visibilitySelectorDataType = '';
  protected $visiblePercentageMaxType = 'Google_Service_TagManager_Parameter';
  protected $visiblePercentageMaxDataType = '';
  protected $visiblePercentageMinType = 'Google_Service_TagManager_Parameter';
  protected $visiblePercentageMinDataType = '';
  protected $waitForTagsType = 'Google_Service_TagManager_Parameter';
  protected $waitForTagsDataType = '';
  protected $waitForTagsTimeoutType = 'Google_Service_TagManager_Parameter';
  protected $waitForTagsTimeoutDataType = '';
  public $workspaceId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_TagManager_Condition
   */
  public function setAutoEventFilter($autoEventFilter)
  {
    $this->autoEventFilter = $autoEventFilter;
  }
  /**
   * @return Google_Service_TagManager_Condition
   */
  public function getAutoEventFilter()
  {
    return $this->autoEventFilter;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setCheckValidation(Google_Service_TagManager_Parameter $checkValidation)
  {
    $this->checkValidation = $checkValidation;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getCheckValidation()
  {
    return $this->checkValidation;
  }
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setContinuousTimeMinMilliseconds(Google_Service_TagManager_Parameter $continuousTimeMinMilliseconds)
  {
    $this->continuousTimeMinMilliseconds = $continuousTimeMinMilliseconds;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getContinuousTimeMinMilliseconds()
  {
    return $this->continuousTimeMinMilliseconds;
  }
  /**
   * @param Google_Service_TagManager_Condition
   */
  public function setCustomEventFilter($customEventFilter)
  {
    $this->customEventFilter = $customEventFilter;
  }
  /**
   * @return Google_Service_TagManager_Condition
   */
  public function getCustomEventFilter()
  {
    return $this->customEventFilter;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setEventName(Google_Service_TagManager_Parameter $eventName)
  {
    $this->eventName = $eventName;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getEventName()
  {
    return $this->eventName;
  }
  /**
   * @param Google_Service_TagManager_Condition
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Google_Service_TagManager_Condition
   */
  public function getFilter()
  {
    return $this->filter;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setHorizontalScrollPercentageList(Google_Service_TagManager_Parameter $horizontalScrollPercentageList)
  {
    $this->horizontalScrollPercentageList = $horizontalScrollPercentageList;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getHorizontalScrollPercentageList()
  {
    return $this->horizontalScrollPercentageList;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setInterval(Google_Service_TagManager_Parameter $interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setIntervalSeconds(Google_Service_TagManager_Parameter $intervalSeconds)
  {
    $this->intervalSeconds = $intervalSeconds;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getIntervalSeconds()
  {
    return $this->intervalSeconds;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setLimit(Google_Service_TagManager_Parameter $limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setMaxTimerLengthSeconds(Google_Service_TagManager_Parameter $maxTimerLengthSeconds)
  {
    $this->maxTimerLengthSeconds = $maxTimerLengthSeconds;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getMaxTimerLengthSeconds()
  {
    return $this->maxTimerLengthSeconds;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getParameter()
  {
    return $this->parameter;
  }
  public function setParentFolderId($parentFolderId)
  {
    $this->parentFolderId = $parentFolderId;
  }
  public function getParentFolderId()
  {
    return $this->parentFolderId;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setSelector(Google_Service_TagManager_Parameter $selector)
  {
    $this->selector = $selector;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getSelector()
  {
    return $this->selector;
  }
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setTotalTimeMinMilliseconds(Google_Service_TagManager_Parameter $totalTimeMinMilliseconds)
  {
    $this->totalTimeMinMilliseconds = $totalTimeMinMilliseconds;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getTotalTimeMinMilliseconds()
  {
    return $this->totalTimeMinMilliseconds;
  }
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setUniqueTriggerId(Google_Service_TagManager_Parameter $uniqueTriggerId)
  {
    $this->uniqueTriggerId = $uniqueTriggerId;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getUniqueTriggerId()
  {
    return $this->uniqueTriggerId;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setVerticalScrollPercentageList(Google_Service_TagManager_Parameter $verticalScrollPercentageList)
  {
    $this->verticalScrollPercentageList = $verticalScrollPercentageList;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getVerticalScrollPercentageList()
  {
    return $this->verticalScrollPercentageList;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setVisibilitySelector(Google_Service_TagManager_Parameter $visibilitySelector)
  {
    $this->visibilitySelector = $visibilitySelector;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getVisibilitySelector()
  {
    return $this->visibilitySelector;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setVisiblePercentageMax(Google_Service_TagManager_Parameter $visiblePercentageMax)
  {
    $this->visiblePercentageMax = $visiblePercentageMax;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getVisiblePercentageMax()
  {
    return $this->visiblePercentageMax;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setVisiblePercentageMin(Google_Service_TagManager_Parameter $visiblePercentageMin)
  {
    $this->visiblePercentageMin = $visiblePercentageMin;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getVisiblePercentageMin()
  {
    return $this->visiblePercentageMin;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setWaitForTags(Google_Service_TagManager_Parameter $waitForTags)
  {
    $this->waitForTags = $waitForTags;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getWaitForTags()
  {
    return $this->waitForTags;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setWaitForTagsTimeout(Google_Service_TagManager_Parameter $waitForTagsTimeout)
  {
    $this->waitForTagsTimeout = $waitForTagsTimeout;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getWaitForTagsTimeout()
  {
    return $this->waitForTagsTimeout;
  }
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
}
