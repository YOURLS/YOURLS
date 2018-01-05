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

class Google_Service_Partners_CreateLeadRequest extends Google_Model
{
  protected $leadType = 'Google_Service_Partners_Lead';
  protected $leadDataType = '';
  protected $recaptchaChallengeType = 'Google_Service_Partners_RecaptchaChallenge';
  protected $recaptchaChallengeDataType = '';
  protected $requestMetadataType = 'Google_Service_Partners_RequestMetadata';
  protected $requestMetadataDataType = '';

  /**
   * @param Google_Service_Partners_Lead
   */
  public function setLead(Google_Service_Partners_Lead $lead)
  {
    $this->lead = $lead;
  }
  /**
   * @return Google_Service_Partners_Lead
   */
  public function getLead()
  {
    return $this->lead;
  }
  /**
   * @param Google_Service_Partners_RecaptchaChallenge
   */
  public function setRecaptchaChallenge(Google_Service_Partners_RecaptchaChallenge $recaptchaChallenge)
  {
    $this->recaptchaChallenge = $recaptchaChallenge;
  }
  /**
   * @return Google_Service_Partners_RecaptchaChallenge
   */
  public function getRecaptchaChallenge()
  {
    return $this->recaptchaChallenge;
  }
  /**
   * @param Google_Service_Partners_RequestMetadata
   */
  public function setRequestMetadata(Google_Service_Partners_RequestMetadata $requestMetadata)
  {
    $this->requestMetadata = $requestMetadata;
  }
  /**
   * @return Google_Service_Partners_RequestMetadata
   */
  public function getRequestMetadata()
  {
    return $this->requestMetadata;
  }
}
