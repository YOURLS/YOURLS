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

class Google_Service_AndroidEnterprise_VariableSet extends Google_Model
{
  public $kind;
  public $placeholder;
  public $userValue;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPlaceholder($placeholder)
  {
    $this->placeholder = $placeholder;
  }
  public function getPlaceholder()
  {
    return $this->placeholder;
  }
  public function setUserValue($userValue)
  {
    $this->userValue = $userValue;
  }
  public function getUserValue()
  {
    return $this->userValue;
  }
}
