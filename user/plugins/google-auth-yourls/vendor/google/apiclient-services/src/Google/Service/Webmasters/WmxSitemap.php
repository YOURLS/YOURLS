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

class Google_Service_Webmasters_WmxSitemap extends Google_Collection
{
  protected $collection_key = 'contents';
  protected $contentsType = 'Google_Service_Webmasters_WmxSitemapContent';
  protected $contentsDataType = 'array';
  public $errors;
  public $isPending;
  public $isSitemapsIndex;
  public $lastDownloaded;
  public $lastSubmitted;
  public $path;
  public $type;
  public $warnings;

  /**
   * @param Google_Service_Webmasters_WmxSitemapContent
   */
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  /**
   * @return Google_Service_Webmasters_WmxSitemapContent
   */
  public function getContents()
  {
    return $this->contents;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setIsPending($isPending)
  {
    $this->isPending = $isPending;
  }
  public function getIsPending()
  {
    return $this->isPending;
  }
  public function setIsSitemapsIndex($isSitemapsIndex)
  {
    $this->isSitemapsIndex = $isSitemapsIndex;
  }
  public function getIsSitemapsIndex()
  {
    return $this->isSitemapsIndex;
  }
  public function setLastDownloaded($lastDownloaded)
  {
    $this->lastDownloaded = $lastDownloaded;
  }
  public function getLastDownloaded()
  {
    return $this->lastDownloaded;
  }
  public function setLastSubmitted($lastSubmitted)
  {
    $this->lastSubmitted = $lastSubmitted;
  }
  public function getLastSubmitted()
  {
    return $this->lastSubmitted;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}
