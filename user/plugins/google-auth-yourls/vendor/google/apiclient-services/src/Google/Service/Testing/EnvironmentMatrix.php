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

class Google_Service_Testing_EnvironmentMatrix extends Google_Model
{
  protected $androidDeviceListType = 'Google_Service_Testing_AndroidDeviceList';
  protected $androidDeviceListDataType = '';
  protected $androidMatrixType = 'Google_Service_Testing_AndroidMatrix';
  protected $androidMatrixDataType = '';

  /**
   * @param Google_Service_Testing_AndroidDeviceList
   */
  public function setAndroidDeviceList(Google_Service_Testing_AndroidDeviceList $androidDeviceList)
  {
    $this->androidDeviceList = $androidDeviceList;
  }
  /**
   * @return Google_Service_Testing_AndroidDeviceList
   */
  public function getAndroidDeviceList()
  {
    return $this->androidDeviceList;
  }
  /**
   * @param Google_Service_Testing_AndroidMatrix
   */
  public function setAndroidMatrix(Google_Service_Testing_AndroidMatrix $androidMatrix)
  {
    $this->androidMatrix = $androidMatrix;
  }
  /**
   * @return Google_Service_Testing_AndroidMatrix
   */
  public function getAndroidMatrix()
  {
    return $this->androidMatrix;
  }
}
