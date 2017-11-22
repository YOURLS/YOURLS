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

class Google_Service_Container_SetMasterAuthRequest extends Google_Model
{
  public $action;
  protected $updateType = 'Google_Service_Container_MasterAuth';
  protected $updateDataType = '';

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param Google_Service_Container_MasterAuth
   */
  public function setUpdate(Google_Service_Container_MasterAuth $update)
  {
    $this->update = $update;
  }
  /**
   * @return Google_Service_Container_MasterAuth
   */
  public function getUpdate()
  {
    return $this->update;
  }
}
