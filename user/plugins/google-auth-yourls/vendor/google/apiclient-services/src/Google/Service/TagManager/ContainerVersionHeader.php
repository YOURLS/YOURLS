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

class Google_Service_TagManager_ContainerVersionHeader extends Google_Model
{
  public $accountId;
  public $containerId;
  public $containerVersionId;
  public $deleted;
  public $name;
  public $numMacros;
  public $numRules;
  public $numTags;
  public $numTriggers;
  public $numVariables;
  public $numZones;
  public $path;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  public function getContainerId()
  {
    return $this->containerId;
  }
  public function setContainerVersionId($containerVersionId)
  {
    $this->containerVersionId = $containerVersionId;
  }
  public function getContainerVersionId()
  {
    return $this->containerVersionId;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumMacros($numMacros)
  {
    $this->numMacros = $numMacros;
  }
  public function getNumMacros()
  {
    return $this->numMacros;
  }
  public function setNumRules($numRules)
  {
    $this->numRules = $numRules;
  }
  public function getNumRules()
  {
    return $this->numRules;
  }
  public function setNumTags($numTags)
  {
    $this->numTags = $numTags;
  }
  public function getNumTags()
  {
    return $this->numTags;
  }
  public function setNumTriggers($numTriggers)
  {
    $this->numTriggers = $numTriggers;
  }
  public function getNumTriggers()
  {
    return $this->numTriggers;
  }
  public function setNumVariables($numVariables)
  {
    $this->numVariables = $numVariables;
  }
  public function getNumVariables()
  {
    return $this->numVariables;
  }
  public function setNumZones($numZones)
  {
    $this->numZones = $numZones;
  }
  public function getNumZones()
  {
    return $this->numZones;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
}
