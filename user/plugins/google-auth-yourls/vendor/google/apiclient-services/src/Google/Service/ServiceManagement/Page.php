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

class Google_Service_ServiceManagement_Page extends Google_Collection
{
  protected $collection_key = 'subpages';
  public $content;
  public $name;
  protected $subpagesType = 'Google_Service_ServiceManagement_Page';
  protected $subpagesDataType = 'array';

  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_ServiceManagement_Page
   */
  public function setSubpages($subpages)
  {
    $this->subpages = $subpages;
  }
  /**
   * @return Google_Service_ServiceManagement_Page
   */
  public function getSubpages()
  {
    return $this->subpages;
  }
}
