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

class Google_Service_Appengine_Deployment extends Google_Model
{
  protected $containerType = 'Google_Service_Appengine_ContainerInfo';
  protected $containerDataType = '';
  protected $filesType = 'Google_Service_Appengine_FileInfo';
  protected $filesDataType = 'map';
  protected $zipType = 'Google_Service_Appengine_ZipInfo';
  protected $zipDataType = '';

  /**
   * @param Google_Service_Appengine_ContainerInfo
   */
  public function setContainer(Google_Service_Appengine_ContainerInfo $container)
  {
    $this->container = $container;
  }
  /**
   * @return Google_Service_Appengine_ContainerInfo
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param Google_Service_Appengine_FileInfo
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return Google_Service_Appengine_FileInfo
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param Google_Service_Appengine_ZipInfo
   */
  public function setZip(Google_Service_Appengine_ZipInfo $zip)
  {
    $this->zip = $zip;
  }
  /**
   * @return Google_Service_Appengine_ZipInfo
   */
  public function getZip()
  {
    return $this->zip;
  }
}
