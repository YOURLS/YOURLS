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

class Google_Service_FirebaseDynamicLinks_GetIosPostInstallAttributionResponse extends Google_Model
{
  public $appMinimumVersion;
  public $attributionConfidence;
  public $deepLink;
  public $externalBrowserDestinationLink;
  public $fallbackLink;
  public $invitationId;
  public $isStrongMatchExecutable;
  public $matchMessage;
  public $requestedLink;
  public $resolvedLink;
  public $utmCampaign;
  public $utmMedium;
  public $utmSource;

  public function setAppMinimumVersion($appMinimumVersion)
  {
    $this->appMinimumVersion = $appMinimumVersion;
  }
  public function getAppMinimumVersion()
  {
    return $this->appMinimumVersion;
  }
  public function setAttributionConfidence($attributionConfidence)
  {
    $this->attributionConfidence = $attributionConfidence;
  }
  public function getAttributionConfidence()
  {
    return $this->attributionConfidence;
  }
  public function setDeepLink($deepLink)
  {
    $this->deepLink = $deepLink;
  }
  public function getDeepLink()
  {
    return $this->deepLink;
  }
  public function setExternalBrowserDestinationLink($externalBrowserDestinationLink)
  {
    $this->externalBrowserDestinationLink = $externalBrowserDestinationLink;
  }
  public function getExternalBrowserDestinationLink()
  {
    return $this->externalBrowserDestinationLink;
  }
  public function setFallbackLink($fallbackLink)
  {
    $this->fallbackLink = $fallbackLink;
  }
  public function getFallbackLink()
  {
    return $this->fallbackLink;
  }
  public function setInvitationId($invitationId)
  {
    $this->invitationId = $invitationId;
  }
  public function getInvitationId()
  {
    return $this->invitationId;
  }
  public function setIsStrongMatchExecutable($isStrongMatchExecutable)
  {
    $this->isStrongMatchExecutable = $isStrongMatchExecutable;
  }
  public function getIsStrongMatchExecutable()
  {
    return $this->isStrongMatchExecutable;
  }
  public function setMatchMessage($matchMessage)
  {
    $this->matchMessage = $matchMessage;
  }
  public function getMatchMessage()
  {
    return $this->matchMessage;
  }
  public function setRequestedLink($requestedLink)
  {
    $this->requestedLink = $requestedLink;
  }
  public function getRequestedLink()
  {
    return $this->requestedLink;
  }
  public function setResolvedLink($resolvedLink)
  {
    $this->resolvedLink = $resolvedLink;
  }
  public function getResolvedLink()
  {
    return $this->resolvedLink;
  }
  public function setUtmCampaign($utmCampaign)
  {
    $this->utmCampaign = $utmCampaign;
  }
  public function getUtmCampaign()
  {
    return $this->utmCampaign;
  }
  public function setUtmMedium($utmMedium)
  {
    $this->utmMedium = $utmMedium;
  }
  public function getUtmMedium()
  {
    return $this->utmMedium;
  }
  public function setUtmSource($utmSource)
  {
    $this->utmSource = $utmSource;
  }
  public function getUtmSource()
  {
    return $this->utmSource;
  }
}
