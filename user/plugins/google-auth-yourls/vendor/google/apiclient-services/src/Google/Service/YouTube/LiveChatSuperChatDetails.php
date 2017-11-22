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

class Google_Service_YouTube_LiveChatSuperChatDetails extends Google_Model
{
  public $amountDisplayString;
  public $amountMicros;
  public $currency;
  public $tier;
  public $userComment;

  public function setAmountDisplayString($amountDisplayString)
  {
    $this->amountDisplayString = $amountDisplayString;
  }
  public function getAmountDisplayString()
  {
    return $this->amountDisplayString;
  }
  public function setAmountMicros($amountMicros)
  {
    $this->amountMicros = $amountMicros;
  }
  public function getAmountMicros()
  {
    return $this->amountMicros;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
  public function setUserComment($userComment)
  {
    $this->userComment = $userComment;
  }
  public function getUserComment()
  {
    return $this->userComment;
  }
}
