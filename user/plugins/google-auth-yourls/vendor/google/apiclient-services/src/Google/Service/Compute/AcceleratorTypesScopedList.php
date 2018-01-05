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

class Google_Service_Compute_AcceleratorTypesScopedList extends Google_Collection
{
  protected $collection_key = 'acceleratorTypes';
  protected $acceleratorTypesType = 'Google_Service_Compute_AcceleratorType';
  protected $acceleratorTypesDataType = 'array';
  protected $warningType = 'Google_Service_Compute_AcceleratorTypesScopedListWarning';
  protected $warningDataType = '';

  /**
   * @param Google_Service_Compute_AcceleratorType
   */
  public function setAcceleratorTypes($acceleratorTypes)
  {
    $this->acceleratorTypes = $acceleratorTypes;
  }
  /**
   * @return Google_Service_Compute_AcceleratorType
   */
  public function getAcceleratorTypes()
  {
    return $this->acceleratorTypes;
  }
  /**
   * @param Google_Service_Compute_AcceleratorTypesScopedListWarning
   */
  public function setWarning(Google_Service_Compute_AcceleratorTypesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_Compute_AcceleratorTypesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
