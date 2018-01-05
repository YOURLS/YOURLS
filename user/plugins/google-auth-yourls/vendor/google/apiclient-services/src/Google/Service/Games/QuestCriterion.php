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

class Google_Service_Games_QuestCriterion extends Google_Model
{
  protected $completionContributionType = 'Google_Service_Games_QuestContribution';
  protected $completionContributionDataType = '';
  protected $currentContributionType = 'Google_Service_Games_QuestContribution';
  protected $currentContributionDataType = '';
  public $eventId;
  protected $initialPlayerProgressType = 'Google_Service_Games_QuestContribution';
  protected $initialPlayerProgressDataType = '';
  public $kind;

  /**
   * @param Google_Service_Games_QuestContribution
   */
  public function setCompletionContribution(Google_Service_Games_QuestContribution $completionContribution)
  {
    $this->completionContribution = $completionContribution;
  }
  /**
   * @return Google_Service_Games_QuestContribution
   */
  public function getCompletionContribution()
  {
    return $this->completionContribution;
  }
  /**
   * @param Google_Service_Games_QuestContribution
   */
  public function setCurrentContribution(Google_Service_Games_QuestContribution $currentContribution)
  {
    $this->currentContribution = $currentContribution;
  }
  /**
   * @return Google_Service_Games_QuestContribution
   */
  public function getCurrentContribution()
  {
    return $this->currentContribution;
  }
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param Google_Service_Games_QuestContribution
   */
  public function setInitialPlayerProgress(Google_Service_Games_QuestContribution $initialPlayerProgress)
  {
    $this->initialPlayerProgress = $initialPlayerProgress;
  }
  /**
   * @return Google_Service_Games_QuestContribution
   */
  public function getInitialPlayerProgress()
  {
    return $this->initialPlayerProgress;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
