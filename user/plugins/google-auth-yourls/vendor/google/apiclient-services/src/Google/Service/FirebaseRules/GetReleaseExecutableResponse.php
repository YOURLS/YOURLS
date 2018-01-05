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

class Google_Service_FirebaseRules_GetReleaseExecutableResponse extends Google_Model
{
  public $executable;
  public $executableVersion;
  public $language;
  public $rulesetName;
  public $updateTime;

  public function setExecutable($executable)
  {
    $this->executable = $executable;
  }
  public function getExecutable()
  {
    return $this->executable;
  }
  public function setExecutableVersion($executableVersion)
  {
    $this->executableVersion = $executableVersion;
  }
  public function getExecutableVersion()
  {
    return $this->executableVersion;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setRulesetName($rulesetName)
  {
    $this->rulesetName = $rulesetName;
  }
  public function getRulesetName()
  {
    return $this->rulesetName;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
