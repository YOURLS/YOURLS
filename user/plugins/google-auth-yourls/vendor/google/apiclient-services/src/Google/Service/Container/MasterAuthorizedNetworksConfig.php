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

class Google_Service_Container_MasterAuthorizedNetworksConfig extends Google_Collection
{
  protected $collection_key = 'cidrBlocks';
  protected $cidrBlocksType = 'Google_Service_Container_CidrBlock';
  protected $cidrBlocksDataType = 'array';
  public $enabled;

  /**
   * @param Google_Service_Container_CidrBlock
   */
  public function setCidrBlocks($cidrBlocks)
  {
    $this->cidrBlocks = $cidrBlocks;
  }
  /**
   * @return Google_Service_Container_CidrBlock
   */
  public function getCidrBlocks()
  {
    return $this->cidrBlocks;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
}
