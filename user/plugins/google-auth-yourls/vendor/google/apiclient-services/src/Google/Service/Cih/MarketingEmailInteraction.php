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

class Google_Service_Cih_MarketingEmailInteraction extends Google_Model
{
  public $bounced;
  public $clicked;
  public $emailAddressDigest;
  public $fromAddress;
  public $opened;
  public $optoutClicked;
  public $type;

  public function setBounced($bounced)
  {
    $this->bounced = $bounced;
  }
  public function getBounced()
  {
    return $this->bounced;
  }
  public function setClicked($clicked)
  {
    $this->clicked = $clicked;
  }
  public function getClicked()
  {
    return $this->clicked;
  }
  public function setEmailAddressDigest($emailAddressDigest)
  {
    $this->emailAddressDigest = $emailAddressDigest;
  }
  public function getEmailAddressDigest()
  {
    return $this->emailAddressDigest;
  }
  public function setFromAddress($fromAddress)
  {
    $this->fromAddress = $fromAddress;
  }
  public function getFromAddress()
  {
    return $this->fromAddress;
  }
  public function setOpened($opened)
  {
    $this->opened = $opened;
  }
  public function getOpened()
  {
    return $this->opened;
  }
  public function setOptoutClicked($optoutClicked)
  {
    $this->optoutClicked = $optoutClicked;
  }
  public function getOptoutClicked()
  {
    return $this->optoutClicked;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
