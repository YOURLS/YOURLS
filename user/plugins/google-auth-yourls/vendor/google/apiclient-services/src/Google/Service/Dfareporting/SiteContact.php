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

class Google_Service_Dfareporting_SiteContact extends Google_Model
{
  public $address;
  public $contactType;
  public $email;
  public $firstName;
  public $id;
  public $lastName;
  public $phone;
  public $title;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setContactType($contactType)
  {
    $this->contactType = $contactType;
  }
  public function getContactType()
  {
    return $this->contactType;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  public function getFirstName()
  {
    return $this->firstName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  public function getLastName()
  {
    return $this->lastName;
  }
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  public function getPhone()
  {
    return $this->phone;
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
