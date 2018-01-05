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

class Google_Service_CloudDebugger_GerritSourceContext extends Google_Model
{
  protected $aliasContextType = 'Google_Service_CloudDebugger_AliasContext';
  protected $aliasContextDataType = '';
  public $aliasName;
  public $gerritProject;
  public $hostUri;
  public $revisionId;

  /**
   * @param Google_Service_CloudDebugger_AliasContext
   */
  public function setAliasContext(Google_Service_CloudDebugger_AliasContext $aliasContext)
  {
    $this->aliasContext = $aliasContext;
  }
  /**
   * @return Google_Service_CloudDebugger_AliasContext
   */
  public function getAliasContext()
  {
    return $this->aliasContext;
  }
  public function setAliasName($aliasName)
  {
    $this->aliasName = $aliasName;
  }
  public function getAliasName()
  {
    return $this->aliasName;
  }
  public function setGerritProject($gerritProject)
  {
    $this->gerritProject = $gerritProject;
  }
  public function getGerritProject()
  {
    return $this->gerritProject;
  }
  public function setHostUri($hostUri)
  {
    $this->hostUri = $hostUri;
  }
  public function getHostUri()
  {
    return $this->hostUri;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
}
