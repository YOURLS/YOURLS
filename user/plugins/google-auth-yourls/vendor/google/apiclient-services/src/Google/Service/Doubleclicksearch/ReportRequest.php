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

class Google_Service_Doubleclicksearch_ReportRequest extends Google_Collection
{
  protected $collection_key = 'orderBy';
  protected $columnsType = 'Google_Service_Doubleclicksearch_ReportApiColumnSpec';
  protected $columnsDataType = 'array';
  public $downloadFormat;
  protected $filtersType = 'Google_Service_Doubleclicksearch_ReportRequestFilters';
  protected $filtersDataType = 'array';
  public $includeDeletedEntities;
  public $includeRemovedEntities;
  public $maxRowsPerFile;
  protected $orderByType = 'Google_Service_Doubleclicksearch_ReportRequestOrderBy';
  protected $orderByDataType = 'array';
  protected $reportScopeType = 'Google_Service_Doubleclicksearch_ReportRequestReportScope';
  protected $reportScopeDataType = '';
  public $reportType;
  public $rowCount;
  public $startRow;
  public $statisticsCurrency;
  protected $timeRangeType = 'Google_Service_Doubleclicksearch_ReportRequestTimeRange';
  protected $timeRangeDataType = '';
  public $verifySingleTimeZone;

  /**
   * @param Google_Service_Doubleclicksearch_ReportApiColumnSpec
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportApiColumnSpec
   */
  public function getColumns()
  {
    return $this->columns;
  }
  public function setDownloadFormat($downloadFormat)
  {
    $this->downloadFormat = $downloadFormat;
  }
  public function getDownloadFormat()
  {
    return $this->downloadFormat;
  }
  /**
   * @param Google_Service_Doubleclicksearch_ReportRequestFilters
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportRequestFilters
   */
  public function getFilters()
  {
    return $this->filters;
  }
  public function setIncludeDeletedEntities($includeDeletedEntities)
  {
    $this->includeDeletedEntities = $includeDeletedEntities;
  }
  public function getIncludeDeletedEntities()
  {
    return $this->includeDeletedEntities;
  }
  public function setIncludeRemovedEntities($includeRemovedEntities)
  {
    $this->includeRemovedEntities = $includeRemovedEntities;
  }
  public function getIncludeRemovedEntities()
  {
    return $this->includeRemovedEntities;
  }
  public function setMaxRowsPerFile($maxRowsPerFile)
  {
    $this->maxRowsPerFile = $maxRowsPerFile;
  }
  public function getMaxRowsPerFile()
  {
    return $this->maxRowsPerFile;
  }
  /**
   * @param Google_Service_Doubleclicksearch_ReportRequestOrderBy
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportRequestOrderBy
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param Google_Service_Doubleclicksearch_ReportRequestReportScope
   */
  public function setReportScope(Google_Service_Doubleclicksearch_ReportRequestReportScope $reportScope)
  {
    $this->reportScope = $reportScope;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportRequestReportScope
   */
  public function getReportScope()
  {
    return $this->reportScope;
  }
  public function setReportType($reportType)
  {
    $this->reportType = $reportType;
  }
  public function getReportType()
  {
    return $this->reportType;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  public function getStartRow()
  {
    return $this->startRow;
  }
  public function setStatisticsCurrency($statisticsCurrency)
  {
    $this->statisticsCurrency = $statisticsCurrency;
  }
  public function getStatisticsCurrency()
  {
    return $this->statisticsCurrency;
  }
  /**
   * @param Google_Service_Doubleclicksearch_ReportRequestTimeRange
   */
  public function setTimeRange(Google_Service_Doubleclicksearch_ReportRequestTimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportRequestTimeRange
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
  public function setVerifySingleTimeZone($verifySingleTimeZone)
  {
    $this->verifySingleTimeZone = $verifySingleTimeZone;
  }
  public function getVerifySingleTimeZone()
  {
    return $this->verifySingleTimeZone;
  }
}
