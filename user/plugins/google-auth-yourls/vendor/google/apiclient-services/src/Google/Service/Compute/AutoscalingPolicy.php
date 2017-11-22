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

class Google_Service_Compute_AutoscalingPolicy extends Google_Collection
{
  protected $collection_key = 'customMetricUtilizations';
  public $coolDownPeriodSec;
  protected $cpuUtilizationType = 'Google_Service_Compute_AutoscalingPolicyCpuUtilization';
  protected $cpuUtilizationDataType = '';
  protected $customMetricUtilizationsType = 'Google_Service_Compute_AutoscalingPolicyCustomMetricUtilization';
  protected $customMetricUtilizationsDataType = 'array';
  protected $loadBalancingUtilizationType = 'Google_Service_Compute_AutoscalingPolicyLoadBalancingUtilization';
  protected $loadBalancingUtilizationDataType = '';
  public $maxNumReplicas;
  public $minNumReplicas;

  public function setCoolDownPeriodSec($coolDownPeriodSec)
  {
    $this->coolDownPeriodSec = $coolDownPeriodSec;
  }
  public function getCoolDownPeriodSec()
  {
    return $this->coolDownPeriodSec;
  }
  /**
   * @param Google_Service_Compute_AutoscalingPolicyCpuUtilization
   */
  public function setCpuUtilization(Google_Service_Compute_AutoscalingPolicyCpuUtilization $cpuUtilization)
  {
    $this->cpuUtilization = $cpuUtilization;
  }
  /**
   * @return Google_Service_Compute_AutoscalingPolicyCpuUtilization
   */
  public function getCpuUtilization()
  {
    return $this->cpuUtilization;
  }
  /**
   * @param Google_Service_Compute_AutoscalingPolicyCustomMetricUtilization
   */
  public function setCustomMetricUtilizations($customMetricUtilizations)
  {
    $this->customMetricUtilizations = $customMetricUtilizations;
  }
  /**
   * @return Google_Service_Compute_AutoscalingPolicyCustomMetricUtilization
   */
  public function getCustomMetricUtilizations()
  {
    return $this->customMetricUtilizations;
  }
  /**
   * @param Google_Service_Compute_AutoscalingPolicyLoadBalancingUtilization
   */
  public function setLoadBalancingUtilization(Google_Service_Compute_AutoscalingPolicyLoadBalancingUtilization $loadBalancingUtilization)
  {
    $this->loadBalancingUtilization = $loadBalancingUtilization;
  }
  /**
   * @return Google_Service_Compute_AutoscalingPolicyLoadBalancingUtilization
   */
  public function getLoadBalancingUtilization()
  {
    return $this->loadBalancingUtilization;
  }
  public function setMaxNumReplicas($maxNumReplicas)
  {
    $this->maxNumReplicas = $maxNumReplicas;
  }
  public function getMaxNumReplicas()
  {
    return $this->maxNumReplicas;
  }
  public function setMinNumReplicas($minNumReplicas)
  {
    $this->minNumReplicas = $minNumReplicas;
  }
  public function getMinNumReplicas()
  {
    return $this->minNumReplicas;
  }
}
