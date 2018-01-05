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

class Google_Service_Directory_CalendarResource extends Google_Model
{
  public $etags;
  public $generatedResourceName;
  public $kind;
  public $resourceDescription;
  public $resourceEmail;
  public $resourceId;
  public $resourceName;
  public $resourceType;

  public function setEtags($etags)
  {
    $this->etags = $etags;
  }
  public function getEtags()
  {
    return $this->etags;
  }
  public function setGeneratedResourceName($generatedResourceName)
  {
    $this->generatedResourceName = $generatedResourceName;
  }
  public function getGeneratedResourceName()
  {
    return $this->generatedResourceName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setResourceDescription($resourceDescription)
  {
    $this->resourceDescription = $resourceDescription;
  }
  public function getResourceDescription()
  {
    return $this->resourceDescription;
  }
  public function setResourceEmail($resourceEmail)
  {
    $this->resourceEmail = $resourceEmail;
  }
  public function getResourceEmail()
  {
    return $this->resourceEmail;
  }
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  public function getResourceId()
  {
    return $this->resourceId;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
}
