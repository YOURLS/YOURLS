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

class Google_Service_Mirror_MenuItem extends Google_Collection
{
  protected $collection_key = 'values';
  protected $internal_gapi_mappings = array(
        "contextualCommand" => "contextual_command",
  );
  public $action;
  public $contextualCommand;
  public $id;
  public $payload;
  public $removeWhenSelected;
  protected $valuesType = 'Google_Service_Mirror_MenuValue';
  protected $valuesDataType = 'array';

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setContextualCommand($contextualCommand)
  {
    $this->contextualCommand = $contextualCommand;
  }
  public function getContextualCommand()
  {
    return $this->contextualCommand;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setRemoveWhenSelected($removeWhenSelected)
  {
    $this->removeWhenSelected = $removeWhenSelected;
  }
  public function getRemoveWhenSelected()
  {
    return $this->removeWhenSelected;
  }
  /**
   * @param Google_Service_Mirror_MenuValue
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return Google_Service_Mirror_MenuValue
   */
  public function getValues()
  {
    return $this->values;
  }
}
