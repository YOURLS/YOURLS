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

class Google_Service_Dfareporting_CreativeAssignment extends Google_Collection
{
  protected $collection_key = 'richMediaExitOverrides';
  public $active;
  public $applyEventTags;
  protected $clickThroughUrlType = 'Google_Service_Dfareporting_ClickThroughUrl';
  protected $clickThroughUrlDataType = '';
  protected $companionCreativeOverridesType = 'Google_Service_Dfareporting_CompanionClickThroughOverride';
  protected $companionCreativeOverridesDataType = 'array';
  protected $creativeGroupAssignmentsType = 'Google_Service_Dfareporting_CreativeGroupAssignment';
  protected $creativeGroupAssignmentsDataType = 'array';
  public $creativeId;
  protected $creativeIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $creativeIdDimensionValueDataType = '';
  public $endTime;
  protected $richMediaExitOverridesType = 'Google_Service_Dfareporting_RichMediaExitOverride';
  protected $richMediaExitOverridesDataType = 'array';
  public $sequence;
  public $sslCompliant;
  public $startTime;
  public $weight;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setApplyEventTags($applyEventTags)
  {
    $this->applyEventTags = $applyEventTags;
  }
  public function getApplyEventTags()
  {
    return $this->applyEventTags;
  }
  /**
   * @param Google_Service_Dfareporting_ClickThroughUrl
   */
  public function setClickThroughUrl(Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  /**
   * @return Google_Service_Dfareporting_ClickThroughUrl
   */
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }
  /**
   * @param Google_Service_Dfareporting_CompanionClickThroughOverride
   */
  public function setCompanionCreativeOverrides($companionCreativeOverrides)
  {
    $this->companionCreativeOverrides = $companionCreativeOverrides;
  }
  /**
   * @return Google_Service_Dfareporting_CompanionClickThroughOverride
   */
  public function getCompanionCreativeOverrides()
  {
    return $this->companionCreativeOverrides;
  }
  /**
   * @param Google_Service_Dfareporting_CreativeGroupAssignment
   */
  public function setCreativeGroupAssignments($creativeGroupAssignments)
  {
    $this->creativeGroupAssignments = $creativeGroupAssignments;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeGroupAssignment
   */
  public function getCreativeGroupAssignments()
  {
    return $this->creativeGroupAssignments;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setCreativeIdDimensionValue(Google_Service_Dfareporting_DimensionValue $creativeIdDimensionValue)
  {
    $this->creativeIdDimensionValue = $creativeIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getCreativeIdDimensionValue()
  {
    return $this->creativeIdDimensionValue;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Dfareporting_RichMediaExitOverride
   */
  public function setRichMediaExitOverrides($richMediaExitOverrides)
  {
    $this->richMediaExitOverrides = $richMediaExitOverrides;
  }
  /**
   * @return Google_Service_Dfareporting_RichMediaExitOverride
   */
  public function getRichMediaExitOverrides()
  {
    return $this->richMediaExitOverrides;
  }
  public function setSequence($sequence)
  {
    $this->sequence = $sequence;
  }
  public function getSequence()
  {
    return $this->sequence;
  }
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
}
