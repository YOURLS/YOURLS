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

class Google_Service_Testing_AndroidRuntimeConfiguration extends Google_Collection
{
  protected $collection_key = 'orientations';
  protected $localesType = 'Google_Service_Testing_Locale';
  protected $localesDataType = 'array';
  protected $orientationsType = 'Google_Service_Testing_Orientation';
  protected $orientationsDataType = 'array';

  /**
   * @param Google_Service_Testing_Locale
   */
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  /**
   * @return Google_Service_Testing_Locale
   */
  public function getLocales()
  {
    return $this->locales;
  }
  /**
   * @param Google_Service_Testing_Orientation
   */
  public function setOrientations($orientations)
  {
    $this->orientations = $orientations;
  }
  /**
   * @return Google_Service_Testing_Orientation
   */
  public function getOrientations()
  {
    return $this->orientations;
  }
}
