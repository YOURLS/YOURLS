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

class Google_Service_Container_AddonsConfig extends Google_Model
{
  protected $horizontalPodAutoscalingType = 'Google_Service_Container_HorizontalPodAutoscaling';
  protected $horizontalPodAutoscalingDataType = '';
  protected $httpLoadBalancingType = 'Google_Service_Container_HttpLoadBalancing';
  protected $httpLoadBalancingDataType = '';
  protected $kubernetesDashboardType = 'Google_Service_Container_KubernetesDashboard';
  protected $kubernetesDashboardDataType = '';
  protected $networkPolicyConfigType = 'Google_Service_Container_NetworkPolicyConfig';
  protected $networkPolicyConfigDataType = '';

  /**
   * @param Google_Service_Container_HorizontalPodAutoscaling
   */
  public function setHorizontalPodAutoscaling(Google_Service_Container_HorizontalPodAutoscaling $horizontalPodAutoscaling)
  {
    $this->horizontalPodAutoscaling = $horizontalPodAutoscaling;
  }
  /**
   * @return Google_Service_Container_HorizontalPodAutoscaling
   */
  public function getHorizontalPodAutoscaling()
  {
    return $this->horizontalPodAutoscaling;
  }
  /**
   * @param Google_Service_Container_HttpLoadBalancing
   */
  public function setHttpLoadBalancing(Google_Service_Container_HttpLoadBalancing $httpLoadBalancing)
  {
    $this->httpLoadBalancing = $httpLoadBalancing;
  }
  /**
   * @return Google_Service_Container_HttpLoadBalancing
   */
  public function getHttpLoadBalancing()
  {
    return $this->httpLoadBalancing;
  }
  /**
   * @param Google_Service_Container_KubernetesDashboard
   */
  public function setKubernetesDashboard(Google_Service_Container_KubernetesDashboard $kubernetesDashboard)
  {
    $this->kubernetesDashboard = $kubernetesDashboard;
  }
  /**
   * @return Google_Service_Container_KubernetesDashboard
   */
  public function getKubernetesDashboard()
  {
    return $this->kubernetesDashboard;
  }
  /**
   * @param Google_Service_Container_NetworkPolicyConfig
   */
  public function setNetworkPolicyConfig(Google_Service_Container_NetworkPolicyConfig $networkPolicyConfig)
  {
    $this->networkPolicyConfig = $networkPolicyConfig;
  }
  /**
   * @return Google_Service_Container_NetworkPolicyConfig
   */
  public function getNetworkPolicyConfig()
  {
    return $this->networkPolicyConfig;
  }
}
