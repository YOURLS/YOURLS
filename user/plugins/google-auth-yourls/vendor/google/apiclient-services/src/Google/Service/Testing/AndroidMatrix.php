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

class Google_Service_Testing_AndroidMatrix extends Google_Collection
{
  protected $collection_key = 'orientations';
  public $androidModelIds;
  public $androidVersionIds;
  public $locales;
  public $orientations;

  public function setAndroidModelIds($androidModelIds)
  {
    $this->androidModelIds = $androidModelIds;
  }
  public function getAndroidModelIds()
  {
    return $this->androidModelIds;
  }
  public function setAndroidVersionIds($androidVersionIds)
  {
    $this->androidVersionIds = $androidVersionIds;
  }
  public function getAndroidVersionIds()
  {
    return $this->androidVersionIds;
  }
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  public function getLocales()
  {
    return $this->locales;
  }
  public function setOrientations($orientations)
  {
    $this->orientations = $orientations;
  }
  public function getOrientations()
  {
    return $this->orientations;
  }
}
