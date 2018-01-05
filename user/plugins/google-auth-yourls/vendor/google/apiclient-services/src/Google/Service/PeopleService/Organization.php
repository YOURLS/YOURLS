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

class Google_Service_PeopleService_Organization extends Google_Model
{
  public $current;
  public $department;
  public $domain;
  protected $endDateType = 'Google_Service_PeopleService_Date';
  protected $endDateDataType = '';
  public $formattedType;
  public $jobDescription;
  public $location;
  protected $metadataType = 'Google_Service_PeopleService_FieldMetadata';
  protected $metadataDataType = '';
  public $name;
  public $phoneticName;
  protected $startDateType = 'Google_Service_PeopleService_Date';
  protected $startDateDataType = '';
  public $symbol;
  public $title;
  public $type;

  public function setCurrent($current)
  {
    $this->current = $current;
  }
  public function getCurrent()
  {
    return $this->current;
  }
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  public function getDepartment()
  {
    return $this->department;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param Google_Service_PeopleService_Date
   */
  public function setEndDate(Google_Service_PeopleService_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Google_Service_PeopleService_Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setJobDescription($jobDescription)
  {
    $this->jobDescription = $jobDescription;
  }
  public function getJobDescription()
  {
    return $this->jobDescription;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_PeopleService_FieldMetadata
   */
  public function setMetadata(Google_Service_PeopleService_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_PeopleService_FieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPhoneticName($phoneticName)
  {
    $this->phoneticName = $phoneticName;
  }
  public function getPhoneticName()
  {
    return $this->phoneticName;
  }
  /**
   * @param Google_Service_PeopleService_Date
   */
  public function setStartDate(Google_Service_PeopleService_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Google_Service_PeopleService_Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setSymbol($symbol)
  {
    $this->symbol = $symbol;
  }
  public function getSymbol()
  {
    return $this->symbol;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
