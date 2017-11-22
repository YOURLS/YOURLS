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

class Google_Service_Classroom_Form extends Google_Model
{
  public $formUrl;
  public $responseUrl;
  public $thumbnailUrl;
  public $title;

  public function setFormUrl($formUrl)
  {
    $this->formUrl = $formUrl;
  }
  public function getFormUrl()
  {
    return $this->formUrl;
  }
  public function setResponseUrl($responseUrl)
  {
    $this->responseUrl = $responseUrl;
  }
  public function getResponseUrl()
  {
    return $this->responseUrl;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
