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

class Google_Service_Appengine_AuthorizedCertificate extends Google_Collection
{
  protected $collection_key = 'visibleDomainMappings';
  protected $certificateRawDataType = 'Google_Service_Appengine_CertificateRawData';
  protected $certificateRawDataDataType = '';
  public $displayName;
  public $domainMappingsCount;
  public $domainNames;
  public $expireTime;
  public $id;
  public $name;
  public $visibleDomainMappings;

  /**
   * @param Google_Service_Appengine_CertificateRawData
   */
  public function setCertificateRawData(Google_Service_Appengine_CertificateRawData $certificateRawData)
  {
    $this->certificateRawData = $certificateRawData;
  }
  /**
   * @return Google_Service_Appengine_CertificateRawData
   */
  public function getCertificateRawData()
  {
    return $this->certificateRawData;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDomainMappingsCount($domainMappingsCount)
  {
    $this->domainMappingsCount = $domainMappingsCount;
  }
  public function getDomainMappingsCount()
  {
    return $this->domainMappingsCount;
  }
  public function setDomainNames($domainNames)
  {
    $this->domainNames = $domainNames;
  }
  public function getDomainNames()
  {
    return $this->domainNames;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setVisibleDomainMappings($visibleDomainMappings)
  {
    $this->visibleDomainMappings = $visibleDomainMappings;
  }
  public function getVisibleDomainMappings()
  {
    return $this->visibleDomainMappings;
  }
}
