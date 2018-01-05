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

class Google_Service_Dataproc_PigJob extends Google_Collection
{
  protected $collection_key = 'jarFileUris';
  public $continueOnFailure;
  public $jarFileUris;
  protected $loggingConfigType = 'Google_Service_Dataproc_LoggingConfig';
  protected $loggingConfigDataType = '';
  public $properties;
  public $queryFileUri;
  protected $queryListType = 'Google_Service_Dataproc_QueryList';
  protected $queryListDataType = '';
  public $scriptVariables;

  public function setContinueOnFailure($continueOnFailure)
  {
    $this->continueOnFailure = $continueOnFailure;
  }
  public function getContinueOnFailure()
  {
    return $this->continueOnFailure;
  }
  public function setJarFileUris($jarFileUris)
  {
    $this->jarFileUris = $jarFileUris;
  }
  public function getJarFileUris()
  {
    return $this->jarFileUris;
  }
  /**
   * @param Google_Service_Dataproc_LoggingConfig
   */
  public function setLoggingConfig(Google_Service_Dataproc_LoggingConfig $loggingConfig)
  {
    $this->loggingConfig = $loggingConfig;
  }
  /**
   * @return Google_Service_Dataproc_LoggingConfig
   */
  public function getLoggingConfig()
  {
    return $this->loggingConfig;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQueryFileUri($queryFileUri)
  {
    $this->queryFileUri = $queryFileUri;
  }
  public function getQueryFileUri()
  {
    return $this->queryFileUri;
  }
  /**
   * @param Google_Service_Dataproc_QueryList
   */
  public function setQueryList(Google_Service_Dataproc_QueryList $queryList)
  {
    $this->queryList = $queryList;
  }
  /**
   * @return Google_Service_Dataproc_QueryList
   */
  public function getQueryList()
  {
    return $this->queryList;
  }
  public function setScriptVariables($scriptVariables)
  {
    $this->scriptVariables = $scriptVariables;
  }
  public function getScriptVariables()
  {
    return $this->scriptVariables;
  }
}
