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

class Google_Service_GamesConfiguration_GamesNumberAffixConfiguration extends Google_Model
{
  protected $fewType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $fewDataType = '';
  protected $manyType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $manyDataType = '';
  protected $oneType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $oneDataType = '';
  protected $otherType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $otherDataType = '';
  protected $twoType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $twoDataType = '';
  protected $zeroType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
  protected $zeroDataType = '';

  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setFew(Google_Service_GamesConfiguration_LocalizedStringBundle $few)
  {
    $this->few = $few;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getFew()
  {
    return $this->few;
  }
  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setMany(Google_Service_GamesConfiguration_LocalizedStringBundle $many)
  {
    $this->many = $many;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getMany()
  {
    return $this->many;
  }
  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setOne(Google_Service_GamesConfiguration_LocalizedStringBundle $one)
  {
    $this->one = $one;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getOne()
  {
    return $this->one;
  }
  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setOther(Google_Service_GamesConfiguration_LocalizedStringBundle $other)
  {
    $this->other = $other;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getOther()
  {
    return $this->other;
  }
  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setTwo(Google_Service_GamesConfiguration_LocalizedStringBundle $two)
  {
    $this->two = $two;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getTwo()
  {
    return $this->two;
  }
  /**
   * @param Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function setZero(Google_Service_GamesConfiguration_LocalizedStringBundle $zero)
  {
    $this->zero = $zero;
  }
  /**
   * @return Google_Service_GamesConfiguration_LocalizedStringBundle
   */
  public function getZero()
  {
    return $this->zero;
  }
}
