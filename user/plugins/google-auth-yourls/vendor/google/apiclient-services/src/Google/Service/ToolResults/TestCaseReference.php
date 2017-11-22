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

class Google_Service_ToolResults_TestCaseReference extends Google_Model
{
  public $className;
  public $name;
  public $testSuiteName;

  public function setClassName($className)
  {
    $this->className = $className;
  }
  public function getClassName()
  {
    return $this->className;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTestSuiteName($testSuiteName)
  {
    $this->testSuiteName = $testSuiteName;
  }
  public function getTestSuiteName()
  {
    return $this->testSuiteName;
  }
}
