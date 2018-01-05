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

class Google_Service_Dataflow_DynamicSourceSplit extends Google_Model
{
  protected $primaryType = 'Google_Service_Dataflow_DerivedSource';
  protected $primaryDataType = '';
  protected $residualType = 'Google_Service_Dataflow_DerivedSource';
  protected $residualDataType = '';

  /**
   * @param Google_Service_Dataflow_DerivedSource
   */
  public function setPrimary(Google_Service_Dataflow_DerivedSource $primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return Google_Service_Dataflow_DerivedSource
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param Google_Service_Dataflow_DerivedSource
   */
  public function setResidual(Google_Service_Dataflow_DerivedSource $residual)
  {
    $this->residual = $residual;
  }
  /**
   * @return Google_Service_Dataflow_DerivedSource
   */
  public function getResidual()
  {
    return $this->residual;
  }
}
