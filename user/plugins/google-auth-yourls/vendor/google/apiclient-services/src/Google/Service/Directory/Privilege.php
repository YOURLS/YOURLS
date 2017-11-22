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

class Google_Service_Directory_Privilege extends Google_Collection
{
  protected $collection_key = 'childPrivileges';
  protected $childPrivilegesType = 'Google_Service_Directory_Privilege';
  protected $childPrivilegesDataType = 'array';
  public $etag;
  public $isOuScopable;
  public $kind;
  public $privilegeName;
  public $serviceId;
  public $serviceName;

  /**
   * @param Google_Service_Directory_Privilege
   */
  public function setChildPrivileges($childPrivileges)
  {
    $this->childPrivileges = $childPrivileges;
  }
  /**
   * @return Google_Service_Directory_Privilege
   */
  public function getChildPrivileges()
  {
    return $this->childPrivileges;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setIsOuScopable($isOuScopable)
  {
    $this->isOuScopable = $isOuScopable;
  }
  public function getIsOuScopable()
  {
    return $this->isOuScopable;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPrivilegeName($privilegeName)
  {
    $this->privilegeName = $privilegeName;
  }
  public function getPrivilegeName()
  {
    return $this->privilegeName;
  }
  public function setServiceId($serviceId)
  {
    $this->serviceId = $serviceId;
  }
  public function getServiceId()
  {
    return $this->serviceId;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
}
