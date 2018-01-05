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

class Google_Service_Replicapoolupdater_RollingUpdate extends Google_Model
{
  public $actionType;
  public $creationTimestamp;
  public $description;
  protected $errorType = 'Google_Service_Replicapoolupdater_RollingUpdateError';
  protected $errorDataType = '';
  public $id;
  public $instanceGroup;
  public $instanceGroupManager;
  public $instanceTemplate;
  public $kind;
  public $oldInstanceTemplate;
  protected $policyType = 'Google_Service_Replicapoolupdater_RollingUpdatePolicy';
  protected $policyDataType = '';
  public $progress;
  public $selfLink;
  public $status;
  public $statusMessage;
  public $user;

  public function setActionType($actionType)
  {
    $this->actionType = $actionType;
  }
  public function getActionType()
  {
    return $this->actionType;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Replicapoolupdater_RollingUpdateError
   */
  public function setError(Google_Service_Replicapoolupdater_RollingUpdateError $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Replicapoolupdater_RollingUpdateError
   */
  public function getError()
  {
    return $this->error;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInstanceGroup($instanceGroup)
  {
    $this->instanceGroup = $instanceGroup;
  }
  public function getInstanceGroup()
  {
    return $this->instanceGroup;
  }
  public function setInstanceGroupManager($instanceGroupManager)
  {
    $this->instanceGroupManager = $instanceGroupManager;
  }
  public function getInstanceGroupManager()
  {
    return $this->instanceGroupManager;
  }
  public function setInstanceTemplate($instanceTemplate)
  {
    $this->instanceTemplate = $instanceTemplate;
  }
  public function getInstanceTemplate()
  {
    return $this->instanceTemplate;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOldInstanceTemplate($oldInstanceTemplate)
  {
    $this->oldInstanceTemplate = $oldInstanceTemplate;
  }
  public function getOldInstanceTemplate()
  {
    return $this->oldInstanceTemplate;
  }
  /**
   * @param Google_Service_Replicapoolupdater_RollingUpdatePolicy
   */
  public function setPolicy(Google_Service_Replicapoolupdater_RollingUpdatePolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_Replicapoolupdater_RollingUpdatePolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setProgress($progress)
  {
    $this->progress = $progress;
  }
  public function getProgress()
  {
    return $this->progress;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}
