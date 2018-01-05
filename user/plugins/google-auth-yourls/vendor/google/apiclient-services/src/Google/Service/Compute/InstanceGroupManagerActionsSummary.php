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

class Google_Service_Compute_InstanceGroupManagerActionsSummary extends Google_Model
{
  public $abandoning;
  public $creating;
  public $creatingWithoutRetries;
  public $deleting;
  public $none;
  public $recreating;
  public $refreshing;
  public $restarting;

  public function setAbandoning($abandoning)
  {
    $this->abandoning = $abandoning;
  }
  public function getAbandoning()
  {
    return $this->abandoning;
  }
  public function setCreating($creating)
  {
    $this->creating = $creating;
  }
  public function getCreating()
  {
    return $this->creating;
  }
  public function setCreatingWithoutRetries($creatingWithoutRetries)
  {
    $this->creatingWithoutRetries = $creatingWithoutRetries;
  }
  public function getCreatingWithoutRetries()
  {
    return $this->creatingWithoutRetries;
  }
  public function setDeleting($deleting)
  {
    $this->deleting = $deleting;
  }
  public function getDeleting()
  {
    return $this->deleting;
  }
  public function setNone($none)
  {
    $this->none = $none;
  }
  public function getNone()
  {
    return $this->none;
  }
  public function setRecreating($recreating)
  {
    $this->recreating = $recreating;
  }
  public function getRecreating()
  {
    return $this->recreating;
  }
  public function setRefreshing($refreshing)
  {
    $this->refreshing = $refreshing;
  }
  public function getRefreshing()
  {
    return $this->refreshing;
  }
  public function setRestarting($restarting)
  {
    $this->restarting = $restarting;
  }
  public function getRestarting()
  {
    return $this->restarting;
  }
}
