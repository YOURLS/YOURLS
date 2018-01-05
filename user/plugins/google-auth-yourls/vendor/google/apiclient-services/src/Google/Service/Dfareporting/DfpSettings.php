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

class Google_Service_Dfareporting_DfpSettings extends Google_Model
{
  public $dfpNetworkCode;
  public $dfpNetworkName;
  public $programmaticPlacementAccepted;
  public $pubPaidPlacementAccepted;
  public $publisherPortalOnly;

  public function setDfpNetworkCode($dfpNetworkCode)
  {
    $this->dfpNetworkCode = $dfpNetworkCode;
  }
  public function getDfpNetworkCode()
  {
    return $this->dfpNetworkCode;
  }
  public function setDfpNetworkName($dfpNetworkName)
  {
    $this->dfpNetworkName = $dfpNetworkName;
  }
  public function getDfpNetworkName()
  {
    return $this->dfpNetworkName;
  }
  public function setProgrammaticPlacementAccepted($programmaticPlacementAccepted)
  {
    $this->programmaticPlacementAccepted = $programmaticPlacementAccepted;
  }
  public function getProgrammaticPlacementAccepted()
  {
    return $this->programmaticPlacementAccepted;
  }
  public function setPubPaidPlacementAccepted($pubPaidPlacementAccepted)
  {
    $this->pubPaidPlacementAccepted = $pubPaidPlacementAccepted;
  }
  public function getPubPaidPlacementAccepted()
  {
    return $this->pubPaidPlacementAccepted;
  }
  public function setPublisherPortalOnly($publisherPortalOnly)
  {
    $this->publisherPortalOnly = $publisherPortalOnly;
  }
  public function getPublisherPortalOnly()
  {
    return $this->publisherPortalOnly;
  }
}
