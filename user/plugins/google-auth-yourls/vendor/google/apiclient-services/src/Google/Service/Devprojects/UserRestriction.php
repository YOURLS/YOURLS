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

class Google_Service_Devprojects_UserRestriction extends Google_Model
{
  protected $ageRestrictionType = 'Google_Service_Devprojects_AgeRestriction';
  protected $ageRestrictionDataType = '';
  protected $andRestrictionType = 'Google_Service_Devprojects_AndRestriction';
  protected $andRestrictionDataType = '';
  protected $geoRestrictionType = 'Google_Service_Devprojects_GeoRestriction';
  protected $geoRestrictionDataType = '';
  public $kind;
  protected $notRestrictionType = 'Google_Service_Devprojects_NotRestriction';
  protected $notRestrictionDataType = '';
  protected $orRestrictionType = 'Google_Service_Devprojects_OrRestriction';
  protected $orRestrictionDataType = '';
  protected $specialRestrictionType = 'Google_Service_Devprojects_SpecialRestriction';
  protected $specialRestrictionDataType = '';

  public function setAgeRestriction(Google_Service_Devprojects_AgeRestriction $ageRestriction)
  {
    $this->ageRestriction = $ageRestriction;
  }
  public function getAgeRestriction()
  {
    return $this->ageRestriction;
  }
  public function setAndRestriction(Google_Service_Devprojects_AndRestriction $andRestriction)
  {
    $this->andRestriction = $andRestriction;
  }
  public function getAndRestriction()
  {
    return $this->andRestriction;
  }
  public function setGeoRestriction(Google_Service_Devprojects_GeoRestriction $geoRestriction)
  {
    $this->geoRestriction = $geoRestriction;
  }
  public function getGeoRestriction()
  {
    return $this->geoRestriction;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNotRestriction(Google_Service_Devprojects_NotRestriction $notRestriction)
  {
    $this->notRestriction = $notRestriction;
  }
  public function getNotRestriction()
  {
    return $this->notRestriction;
  }
  public function setOrRestriction(Google_Service_Devprojects_OrRestriction $orRestriction)
  {
    $this->orRestriction = $orRestriction;
  }
  public function getOrRestriction()
  {
    return $this->orRestriction;
  }
  public function setSpecialRestriction(Google_Service_Devprojects_SpecialRestriction $specialRestriction)
  {
    $this->specialRestriction = $specialRestriction;
  }
  public function getSpecialRestriction()
  {
    return $this->specialRestriction;
  }
}
