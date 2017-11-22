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

class Google_Service_Compute_PathMatcher extends Google_Collection
{
  protected $collection_key = 'pathRules';
  public $defaultService;
  public $description;
  public $name;
  protected $pathRulesType = 'Google_Service_Compute_PathRule';
  protected $pathRulesDataType = 'array';

  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }
  public function getDefaultService()
  {
    return $this->defaultService;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Compute_PathRule
   */
  public function setPathRules($pathRules)
  {
    $this->pathRules = $pathRules;
  }
  /**
   * @return Google_Service_Compute_PathRule
   */
  public function getPathRules()
  {
    return $this->pathRules;
  }
}
