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

class Google_Service_CloudDebugger_Variable extends Google_Collection
{
  protected $collection_key = 'members';
  protected $membersType = 'Google_Service_CloudDebugger_Variable';
  protected $membersDataType = 'array';
  public $name;
  protected $statusType = 'Google_Service_CloudDebugger_StatusMessage';
  protected $statusDataType = '';
  public $type;
  public $value;
  public $varTableIndex;

  /**
   * @param Google_Service_CloudDebugger_Variable
   */
  public function setMembers($members)
  {
    $this->members = $members;
  }
  /**
   * @return Google_Service_CloudDebugger_Variable
   */
  public function getMembers()
  {
    return $this->members;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudDebugger_StatusMessage
   */
  public function setStatus(Google_Service_CloudDebugger_StatusMessage $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudDebugger_StatusMessage
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  public function setVarTableIndex($varTableIndex)
  {
    $this->varTableIndex = $varTableIndex;
  }
  public function getVarTableIndex()
  {
    return $this->varTableIndex;
  }
}
