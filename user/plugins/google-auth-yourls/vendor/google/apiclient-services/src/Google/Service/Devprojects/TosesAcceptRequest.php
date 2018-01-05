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

class Google_Service_Devprojects_TosesAcceptRequest extends Google_Collection
{
  protected $collection_key = 'terms';
  protected $contextType = 'Google_Service_Devprojects_TermsContext';
  protected $contextDataType = 'array';
  protected $termsType = 'Google_Service_Devprojects_TermsVersion';
  protected $termsDataType = 'array';
  public $whitelistId;

  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setTerms($terms)
  {
    $this->terms = $terms;
  }
  public function getTerms()
  {
    return $this->terms;
  }
  public function setWhitelistId($whitelistId)
  {
    $this->whitelistId = $whitelistId;
  }
  public function getWhitelistId()
  {
    return $this->whitelistId;
  }
}
