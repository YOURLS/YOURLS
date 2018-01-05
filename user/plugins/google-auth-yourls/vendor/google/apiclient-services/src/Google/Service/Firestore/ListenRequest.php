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

class Google_Service_Firestore_ListenRequest extends Google_Model
{
  protected $addTargetType = 'Google_Service_Firestore_Target';
  protected $addTargetDataType = '';
  public $labels;
  public $removeTarget;

  /**
   * @param Google_Service_Firestore_Target
   */
  public function setAddTarget(Google_Service_Firestore_Target $addTarget)
  {
    $this->addTarget = $addTarget;
  }
  /**
   * @return Google_Service_Firestore_Target
   */
  public function getAddTarget()
  {
    return $this->addTarget;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setRemoveTarget($removeTarget)
  {
    $this->removeTarget = $removeTarget;
  }
  public function getRemoveTarget()
  {
    return $this->removeTarget;
  }
}
