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

class Google_Service_Devprojects_ComponentAbuseStatus extends Google_Collection
{
  protected $collection_key = 'lastVerdict';
  protected $componentType = 'Google_Service_Devprojects_Component';
  protected $componentDataType = '';
  public $kind;
  protected $lastVerdictType = 'Google_Service_Devprojects_Verdict';
  protected $lastVerdictDataType = 'array';

  public function setComponent(Google_Service_Devprojects_Component $component)
  {
    $this->component = $component;
  }
  public function getComponent()
  {
    return $this->component;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastVerdict($lastVerdict)
  {
    $this->lastVerdict = $lastVerdict;
  }
  public function getLastVerdict()
  {
    return $this->lastVerdict;
  }
}
