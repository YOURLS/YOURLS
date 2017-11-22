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

class Google_Service_Coordinate_JobState extends Google_Collection
{
  protected $collection_key = 'note';
  public $assignee;
  protected $customFieldsType = 'Google_Service_Coordinate_CustomFields';
  protected $customFieldsDataType = '';
  public $customerName;
  public $customerPhoneNumber;
  public $kind;
  protected $locationType = 'Google_Service_Coordinate_Location';
  protected $locationDataType = '';
  public $note;
  public $progress;
  public $title;

  public function setAssignee($assignee)
  {
    $this->assignee = $assignee;
  }
  public function getAssignee()
  {
    return $this->assignee;
  }
  public function setCustomFields(Google_Service_Coordinate_CustomFields $customFields)
  {
    $this->customFields = $customFields;
  }
  public function getCustomFields()
  {
    return $this->customFields;
  }
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  public function getCustomerName()
  {
    return $this->customerName;
  }
  public function setCustomerPhoneNumber($customerPhoneNumber)
  {
    $this->customerPhoneNumber = $customerPhoneNumber;
  }
  public function getCustomerPhoneNumber()
  {
    return $this->customerPhoneNumber;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocation(Google_Service_Coordinate_Location $location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  public function getProgress()
  {
    return $this->progress;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
