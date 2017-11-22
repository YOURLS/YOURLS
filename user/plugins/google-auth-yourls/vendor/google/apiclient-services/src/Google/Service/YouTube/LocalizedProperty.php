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

class Google_Service_YouTube_LocalizedProperty extends Google_Collection
{
  protected $collection_key = 'localized';
  public $default;
  protected $defaultLanguageType = 'Google_Service_YouTube_LanguageTag';
  protected $defaultLanguageDataType = '';
  protected $localizedType = 'Google_Service_YouTube_LocalizedString';
  protected $localizedDataType = 'array';

  public function setDefault($default)
  {
    $this->default = $default;
  }
  public function getDefault()
  {
    return $this->default;
  }
  /**
   * @param Google_Service_YouTube_LanguageTag
   */
  public function setDefaultLanguage(Google_Service_YouTube_LanguageTag $defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return Google_Service_YouTube_LanguageTag
   */
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
  /**
   * @param Google_Service_YouTube_LocalizedString
   */
  public function setLocalized($localized)
  {
    $this->localized = $localized;
  }
  /**
   * @return Google_Service_YouTube_LocalizedString
   */
  public function getLocalized()
  {
    return $this->localized;
  }
}
