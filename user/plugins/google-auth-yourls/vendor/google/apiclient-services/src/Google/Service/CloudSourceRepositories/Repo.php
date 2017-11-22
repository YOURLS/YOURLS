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

class Google_Service_CloudSourceRepositories_Repo extends Google_Model
{
  protected $mirrorConfigType = 'Google_Service_CloudSourceRepositories_MirrorConfig';
  protected $mirrorConfigDataType = '';
  public $name;
  public $size;
  public $url;

  /**
   * @param Google_Service_CloudSourceRepositories_MirrorConfig
   */
  public function setMirrorConfig(Google_Service_CloudSourceRepositories_MirrorConfig $mirrorConfig)
  {
    $this->mirrorConfig = $mirrorConfig;
  }
  /**
   * @return Google_Service_CloudSourceRepositories_MirrorConfig
   */
  public function getMirrorConfig()
  {
    return $this->mirrorConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
