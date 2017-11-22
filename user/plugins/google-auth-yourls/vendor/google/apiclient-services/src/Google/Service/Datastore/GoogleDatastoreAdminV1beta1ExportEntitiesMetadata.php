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

class Google_Service_Datastore_GoogleDatastoreAdminV1beta1ExportEntitiesMetadata extends Google_Model
{
  protected $commonType = 'Google_Service_Datastore_GoogleDatastoreAdminV1beta1CommonMetadata';
  protected $commonDataType = '';
  protected $entityFilterType = 'Google_Service_Datastore_GoogleDatastoreAdminV1beta1EntityFilter';
  protected $entityFilterDataType = '';
  public $outputUrlPrefix;
  protected $progressBytesType = 'Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress';
  protected $progressBytesDataType = '';
  protected $progressEntitiesType = 'Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress';
  protected $progressEntitiesDataType = '';

  /**
   * @param Google_Service_Datastore_GoogleDatastoreAdminV1beta1CommonMetadata
   */
  public function setCommon(Google_Service_Datastore_GoogleDatastoreAdminV1beta1CommonMetadata $common)
  {
    $this->common = $common;
  }
  /**
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1beta1CommonMetadata
   */
  public function getCommon()
  {
    return $this->common;
  }
  /**
   * @param Google_Service_Datastore_GoogleDatastoreAdminV1beta1EntityFilter
   */
  public function setEntityFilter(Google_Service_Datastore_GoogleDatastoreAdminV1beta1EntityFilter $entityFilter)
  {
    $this->entityFilter = $entityFilter;
  }
  /**
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1beta1EntityFilter
   */
  public function getEntityFilter()
  {
    return $this->entityFilter;
  }
  public function setOutputUrlPrefix($outputUrlPrefix)
  {
    $this->outputUrlPrefix = $outputUrlPrefix;
  }
  public function getOutputUrlPrefix()
  {
    return $this->outputUrlPrefix;
  }
  /**
   * @param Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress
   */
  public function setProgressBytes(Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress $progressBytes)
  {
    $this->progressBytes = $progressBytes;
  }
  /**
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress
   */
  public function getProgressBytes()
  {
    return $this->progressBytes;
  }
  /**
   * @param Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress
   */
  public function setProgressEntities(Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress $progressEntities)
  {
    $this->progressEntities = $progressEntities;
  }
  /**
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1beta1Progress
   */
  public function getProgressEntities()
  {
    return $this->progressEntities;
  }
}
