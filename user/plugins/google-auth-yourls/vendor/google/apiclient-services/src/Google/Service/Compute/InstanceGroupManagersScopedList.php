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

class Google_Service_Compute_InstanceGroupManagersScopedList extends Google_Collection
{
  protected $collection_key = 'instanceGroupManagers';
  protected $instanceGroupManagersType = 'Google_Service_Compute_InstanceGroupManager';
  protected $instanceGroupManagersDataType = 'array';
  protected $warningType = 'Google_Service_Compute_InstanceGroupManagersScopedListWarning';
  protected $warningDataType = '';

  /**
   * @param Google_Service_Compute_InstanceGroupManager
   */
  public function setInstanceGroupManagers($instanceGroupManagers)
  {
    $this->instanceGroupManagers = $instanceGroupManagers;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManager
   */
  public function getInstanceGroupManagers()
  {
    return $this->instanceGroupManagers;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagersScopedListWarning
   */
  public function setWarning(Google_Service_Compute_InstanceGroupManagersScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagersScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
