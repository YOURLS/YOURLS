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

class Google_Service_ToolResults_PerfEnvironment extends Google_Model
{
  protected $cpuInfoType = 'Google_Service_ToolResults_CPUInfo';
  protected $cpuInfoDataType = '';
  protected $memoryInfoType = 'Google_Service_ToolResults_MemoryInfo';
  protected $memoryInfoDataType = '';

  /**
   * @param Google_Service_ToolResults_CPUInfo
   */
  public function setCpuInfo(Google_Service_ToolResults_CPUInfo $cpuInfo)
  {
    $this->cpuInfo = $cpuInfo;
  }
  /**
   * @return Google_Service_ToolResults_CPUInfo
   */
  public function getCpuInfo()
  {
    return $this->cpuInfo;
  }
  /**
   * @param Google_Service_ToolResults_MemoryInfo
   */
  public function setMemoryInfo(Google_Service_ToolResults_MemoryInfo $memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return Google_Service_ToolResults_MemoryInfo
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
  }
}
