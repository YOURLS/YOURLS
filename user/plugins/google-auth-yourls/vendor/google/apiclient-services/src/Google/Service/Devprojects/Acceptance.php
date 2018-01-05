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

class Google_Service_Devprojects_Acceptance extends Google_Model
{
  protected $contextType = 'Google_Service_Devprojects_TermsContext';
  protected $contextDataType = '';
  public $kind;
  protected $termsType = 'Google_Service_Devprojects_TermsVersion';
  protected $termsDataType = '';

  public function setContext(Google_Service_Devprojects_TermsContext $context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setTerms(Google_Service_Devprojects_TermsVersion $terms)
  {
    $this->terms = $terms;
  }
  public function getTerms()
  {
    return $this->terms;
  }
}
