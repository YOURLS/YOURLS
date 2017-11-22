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

class Google_Service_AdExchangeBuyer_CreativeServingRestrictions extends Google_Collection
{
  protected $collection_key = 'disapprovalReasons';
  protected $contextsType = 'Google_Service_AdExchangeBuyer_CreativeServingRestrictionsContexts';
  protected $contextsDataType = 'array';
  protected $disapprovalReasonsType = 'Google_Service_AdExchangeBuyer_CreativeServingRestrictionsDisapprovalReasons';
  protected $disapprovalReasonsDataType = 'array';
  public $reason;

  /**
   * @param Google_Service_AdExchangeBuyer_CreativeServingRestrictionsContexts
   */
  public function setContexts($contexts)
  {
    $this->contexts = $contexts;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeServingRestrictionsContexts
   */
  public function getContexts()
  {
    return $this->contexts;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeServingRestrictionsDisapprovalReasons
   */
  public function setDisapprovalReasons($disapprovalReasons)
  {
    $this->disapprovalReasons = $disapprovalReasons;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeServingRestrictionsDisapprovalReasons
   */
  public function getDisapprovalReasons()
  {
    return $this->disapprovalReasons;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
}
