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

class Google_Service_Compute_UrlMap extends Google_Collection
{
  protected $collection_key = 'tests';
  public $creationTimestamp;
  public $defaultService;
  public $description;
  public $fingerprint;
  protected $hostRulesType = 'Google_Service_Compute_HostRule';
  protected $hostRulesDataType = 'array';
  public $id;
  public $kind;
  public $name;
  protected $pathMatchersType = 'Google_Service_Compute_PathMatcher';
  protected $pathMatchersDataType = 'array';
  public $selfLink;
  protected $testsType = 'Google_Service_Compute_UrlMapTest';
  protected $testsDataType = 'array';

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
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
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Google_Service_Compute_HostRule
   */
  public function setHostRules($hostRules)
  {
    $this->hostRules = $hostRules;
  }
  /**
   * @return Google_Service_Compute_HostRule
   */
  public function getHostRules()
  {
    return $this->hostRules;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Compute_PathMatcher
   */
  public function setPathMatchers($pathMatchers)
  {
    $this->pathMatchers = $pathMatchers;
  }
  /**
   * @return Google_Service_Compute_PathMatcher
   */
  public function getPathMatchers()
  {
    return $this->pathMatchers;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_UrlMapTest
   */
  public function setTests($tests)
  {
    $this->tests = $tests;
  }
  /**
   * @return Google_Service_Compute_UrlMapTest
   */
  public function getTests()
  {
    return $this->tests;
  }
}
