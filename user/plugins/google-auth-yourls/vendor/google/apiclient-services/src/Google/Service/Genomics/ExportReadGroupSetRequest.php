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

class Google_Service_Genomics_ExportReadGroupSetRequest extends Google_Collection
{
  protected $collection_key = 'referenceNames';
  public $exportUri;
  public $projectId;
  public $referenceNames;

  public function setExportUri($exportUri)
  {
    $this->exportUri = $exportUri;
  }
  public function getExportUri()
  {
    return $this->exportUri;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setReferenceNames($referenceNames)
  {
    $this->referenceNames = $referenceNames;
  }
  public function getReferenceNames()
  {
    return $this->referenceNames;
  }
}
