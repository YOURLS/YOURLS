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

class Google_Service_Dfareporting_ReportDelivery extends Google_Collection
{
  protected $collection_key = 'recipients';
  public $emailOwner;
  public $emailOwnerDeliveryType;
  public $message;
  protected $recipientsType = 'Google_Service_Dfareporting_Recipient';
  protected $recipientsDataType = 'array';

  public function setEmailOwner($emailOwner)
  {
    $this->emailOwner = $emailOwner;
  }
  public function getEmailOwner()
  {
    return $this->emailOwner;
  }
  public function setEmailOwnerDeliveryType($emailOwnerDeliveryType)
  {
    $this->emailOwnerDeliveryType = $emailOwnerDeliveryType;
  }
  public function getEmailOwnerDeliveryType()
  {
    return $this->emailOwnerDeliveryType;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Google_Service_Dfareporting_Recipient
   */
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
  /**
   * @return Google_Service_Dfareporting_Recipient
   */
  public function getRecipients()
  {
    return $this->recipients;
  }
}
