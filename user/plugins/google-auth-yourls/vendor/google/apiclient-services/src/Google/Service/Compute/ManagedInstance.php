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

class Google_Service_Compute_ManagedInstance extends Google_Model
{
  public $currentAction;
  public $id;
  public $instance;
  public $instanceStatus;
  protected $lastAttemptType = 'Google_Service_Compute_ManagedInstanceLastAttempt';
  protected $lastAttemptDataType = '';

  public function setCurrentAction($currentAction)
  {
    $this->currentAction = $currentAction;
  }
  public function getCurrentAction()
  {
    return $this->currentAction;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setInstanceStatus($instanceStatus)
  {
    $this->instanceStatus = $instanceStatus;
  }
  public function getInstanceStatus()
  {
    return $this->instanceStatus;
  }
  /**
   * @param Google_Service_Compute_ManagedInstanceLastAttempt
   */
  public function setLastAttempt(Google_Service_Compute_ManagedInstanceLastAttempt $lastAttempt)
  {
    $this->lastAttempt = $lastAttempt;
  }
  /**
   * @return Google_Service_Compute_ManagedInstanceLastAttempt
   */
  public function getLastAttempt()
  {
    return $this->lastAttempt;
  }
}
