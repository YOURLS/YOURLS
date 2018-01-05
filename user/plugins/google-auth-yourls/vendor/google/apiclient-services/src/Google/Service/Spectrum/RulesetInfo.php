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

class Google_Service_Spectrum_RulesetInfo extends Google_Collection
{
  protected $collection_key = 'rulesetIds';
  public $authority;
  public $maxLocationChange;
  public $maxPollingSecs;
  public $rulesetIds;

  public function setAuthority($authority)
  {
    $this->authority = $authority;
  }
  public function getAuthority()
  {
    return $this->authority;
  }
  public function setMaxLocationChange($maxLocationChange)
  {
    $this->maxLocationChange = $maxLocationChange;
  }
  public function getMaxLocationChange()
  {
    return $this->maxLocationChange;
  }
  public function setMaxPollingSecs($maxPollingSecs)
  {
    $this->maxPollingSecs = $maxPollingSecs;
  }
  public function getMaxPollingSecs()
  {
    return $this->maxPollingSecs;
  }
  public function setRulesetIds($rulesetIds)
  {
    $this->rulesetIds = $rulesetIds;
  }
  public function getRulesetIds()
  {
    return $this->rulesetIds;
  }
}
