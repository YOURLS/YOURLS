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

class Google_Service_Bigquery_ProjectListProjects extends Google_Model
{
  public $friendlyName;
  public $id;
  public $kind;
  public $numericId;
  protected $projectReferenceType = 'Google_Service_Bigquery_ProjectReference';
  protected $projectReferenceDataType = '';

  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNumericId($numericId)
  {
    $this->numericId = $numericId;
  }
  public function getNumericId()
  {
    return $this->numericId;
  }
  /**
   * @param Google_Service_Bigquery_ProjectReference
   */
  public function setProjectReference(Google_Service_Bigquery_ProjectReference $projectReference)
  {
    $this->projectReference = $projectReference;
  }
  /**
   * @return Google_Service_Bigquery_ProjectReference
   */
  public function getProjectReference()
  {
    return $this->projectReference;
  }
}
