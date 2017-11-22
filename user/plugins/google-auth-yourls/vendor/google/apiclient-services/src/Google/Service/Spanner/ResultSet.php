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

class Google_Service_Spanner_ResultSet extends Google_Collection
{
  protected $collection_key = 'rows';
  protected $metadataType = 'Google_Service_Spanner_ResultSetMetadata';
  protected $metadataDataType = '';
  public $rows;
  protected $statsType = 'Google_Service_Spanner_ResultSetStats';
  protected $statsDataType = '';

  /**
   * @param Google_Service_Spanner_ResultSetMetadata
   */
  public function setMetadata(Google_Service_Spanner_ResultSetMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Spanner_ResultSetMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param Google_Service_Spanner_ResultSetStats
   */
  public function setStats(Google_Service_Spanner_ResultSetStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return Google_Service_Spanner_ResultSetStats
   */
  public function getStats()
  {
    return $this->stats;
  }
}
