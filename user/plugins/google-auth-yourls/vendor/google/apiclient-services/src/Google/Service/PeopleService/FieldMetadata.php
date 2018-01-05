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

class Google_Service_PeopleService_FieldMetadata extends Google_Model
{
  public $primary;
  protected $sourceType = 'Google_Service_PeopleService_Source';
  protected $sourceDataType = '';
  public $verified;

  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param Google_Service_PeopleService_Source
   */
  public function setSource(Google_Service_PeopleService_Source $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_PeopleService_Source
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setVerified($verified)
  {
    $this->verified = $verified;
  }
  public function getVerified()
  {
    return $this->verified;
  }
}
