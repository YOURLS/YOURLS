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

class Google_Service_CloudBuild_BuildTrigger extends Google_Model
{
  protected $buildType = 'Google_Service_CloudBuild_Build';
  protected $buildDataType = '';
  public $createTime;
  public $description;
  public $disabled;
  public $filename;
  public $id;
  public $substitutions;
  protected $triggerTemplateType = 'Google_Service_CloudBuild_RepoSource';
  protected $triggerTemplateDataType = '';

  /**
   * @param Google_Service_CloudBuild_Build
   */
  public function setBuild(Google_Service_CloudBuild_Build $build)
  {
    $this->build = $build;
  }
  /**
   * @return Google_Service_CloudBuild_Build
   */
  public function getBuild()
  {
    return $this->build;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  /**
   * @param Google_Service_CloudBuild_RepoSource
   */
  public function setTriggerTemplate(Google_Service_CloudBuild_RepoSource $triggerTemplate)
  {
    $this->triggerTemplate = $triggerTemplate;
  }
  /**
   * @return Google_Service_CloudBuild_RepoSource
   */
  public function getTriggerTemplate()
  {
    return $this->triggerTemplate;
  }
}
