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

class Google_Service_Dfareporting_ReportCriteria extends Google_Collection
{
  protected $collection_key = 'metricNames';
  protected $activitiesType = 'Google_Service_Dfareporting_Activities';
  protected $activitiesDataType = '';
  protected $customRichMediaEventsType = 'Google_Service_Dfareporting_CustomRichMediaEvents';
  protected $customRichMediaEventsDataType = '';
  protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
  protected $dateRangeDataType = '';
  protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
  protected $dimensionFiltersDataType = 'array';
  protected $dimensionsType = 'Google_Service_Dfareporting_SortedDimension';
  protected $dimensionsDataType = 'array';
  public $metricNames;

  /**
   * @param Google_Service_Dfareporting_Activities
   */
  public function setActivities(Google_Service_Dfareporting_Activities $activities)
  {
    $this->activities = $activities;
  }
  /**
   * @return Google_Service_Dfareporting_Activities
   */
  public function getActivities()
  {
    return $this->activities;
  }
  /**
   * @param Google_Service_Dfareporting_CustomRichMediaEvents
   */
  public function setCustomRichMediaEvents(Google_Service_Dfareporting_CustomRichMediaEvents $customRichMediaEvents)
  {
    $this->customRichMediaEvents = $customRichMediaEvents;
  }
  /**
   * @return Google_Service_Dfareporting_CustomRichMediaEvents
   */
  public function getCustomRichMediaEvents()
  {
    return $this->customRichMediaEvents;
  }
  /**
   * @param Google_Service_Dfareporting_DateRange
   */
  public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_Dfareporting_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  /**
   * @param Google_Service_Dfareporting_SortedDimension
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_Dfareporting_SortedDimension
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  public function getMetricNames()
  {
    return $this->metricNames;
  }
}
