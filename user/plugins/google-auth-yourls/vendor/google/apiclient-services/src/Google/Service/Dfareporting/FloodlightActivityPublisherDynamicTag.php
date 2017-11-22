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

class Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag extends Google_Model
{
  public $clickThrough;
  public $directorySiteId;
  protected $dynamicTagType = 'Google_Service_Dfareporting_FloodlightActivityDynamicTag';
  protected $dynamicTagDataType = '';
  public $siteId;
  protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $siteIdDimensionValueDataType = '';
  public $viewThrough;

  public function setClickThrough($clickThrough)
  {
    $this->clickThrough = $clickThrough;
  }
  public function getClickThrough()
  {
    return $this->clickThrough;
  }
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param Google_Service_Dfareporting_FloodlightActivityDynamicTag
   */
  public function setDynamicTag(Google_Service_Dfareporting_FloodlightActivityDynamicTag $dynamicTag)
  {
    $this->dynamicTag = $dynamicTag;
  }
  /**
   * @return Google_Service_Dfareporting_FloodlightActivityDynamicTag
   */
  public function getDynamicTag()
  {
    return $this->dynamicTag;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setSiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue)
  {
    $this->siteIdDimensionValue = $siteIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getSiteIdDimensionValue()
  {
    return $this->siteIdDimensionValue;
  }
  public function setViewThrough($viewThrough)
  {
    $this->viewThrough = $viewThrough;
  }
  public function getViewThrough()
  {
    return $this->viewThrough;
  }
}
