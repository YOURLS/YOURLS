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

class Google_Service_Compute_InstancesScopedList extends Google_Collection
{
  protected $collection_key = 'instances';
  protected $instancesType = 'Google_Service_Compute_Instance';
  protected $instancesDataType = 'array';
  protected $warningType = 'Google_Service_Compute_InstancesScopedListWarning';
  protected $warningDataType = '';

  /**
   * @param Google_Service_Compute_Instance
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return Google_Service_Compute_Instance
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param Google_Service_Compute_InstancesScopedListWarning
   */
  public function setWarning(Google_Service_Compute_InstancesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_InstancesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
