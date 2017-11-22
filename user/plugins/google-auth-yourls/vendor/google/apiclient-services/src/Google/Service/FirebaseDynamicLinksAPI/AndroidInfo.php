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

class Google_Service_FirebaseDynamicLinksAPI_AndroidInfo extends Google_Model
{
  public $androidFallbackLink;
  public $androidLink;
  public $androidMinPackageVersionCode;
  public $androidPackageName;

  public function setAndroidFallbackLink($androidFallbackLink)
  {
    $this->androidFallbackLink = $androidFallbackLink;
  }
  public function getAndroidFallbackLink()
  {
    return $this->androidFallbackLink;
  }
  public function setAndroidLink($androidLink)
  {
    $this->androidLink = $androidLink;
  }
  public function getAndroidLink()
  {
    return $this->androidLink;
  }
  public function setAndroidMinPackageVersionCode($androidMinPackageVersionCode)
  {
    $this->androidMinPackageVersionCode = $androidMinPackageVersionCode;
  }
  public function getAndroidMinPackageVersionCode()
  {
    return $this->androidMinPackageVersionCode;
  }
  public function setAndroidPackageName($androidPackageName)
  {
    $this->androidPackageName = $androidPackageName;
  }
  public function getAndroidPackageName()
  {
    return $this->androidPackageName;
  }
}
