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

class Google_Service_Compute_TargetVpnGatewayAggregatedListWarning extends Google_Collection
{
  protected $collection_key = 'data';
  public $code;
  protected $dataType = 'Google_Service_Compute_TargetVpnGatewayAggregatedListWarningData';
  protected $dataDataType = 'array';
  public $message;

  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param Google_Service_Compute_TargetVpnGatewayAggregatedListWarningData
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Compute_TargetVpnGatewayAggregatedListWarningData
   */
  public function getData()
  {
    return $this->data;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
}
