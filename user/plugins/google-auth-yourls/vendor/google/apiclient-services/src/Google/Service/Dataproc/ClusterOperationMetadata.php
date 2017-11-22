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

class Google_Service_Dataproc_ClusterOperationMetadata extends Google_Collection
{
  protected $collection_key = 'warnings';
  public $clusterName;
  public $clusterUuid;
  public $description;
  public $labels;
  public $operationType;
  protected $statusType = 'Google_Service_Dataproc_ClusterOperationStatus';
  protected $statusDataType = '';
  protected $statusHistoryType = 'Google_Service_Dataproc_ClusterOperationStatus';
  protected $statusHistoryDataType = 'array';
  public $warnings;

  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  public function setClusterUuid($clusterUuid)
  {
    $this->clusterUuid = $clusterUuid;
  }
  public function getClusterUuid()
  {
    return $this->clusterUuid;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param Google_Service_Dataproc_ClusterOperationStatus
   */
  public function setStatus(Google_Service_Dataproc_ClusterOperationStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_Dataproc_ClusterOperationStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_Dataproc_ClusterOperationStatus
   */
  public function setStatusHistory($statusHistory)
  {
    $this->statusHistory = $statusHistory;
  }
  /**
   * @return Google_Service_Dataproc_ClusterOperationStatus
   */
  public function getStatusHistory()
  {
    return $this->statusHistory;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}
