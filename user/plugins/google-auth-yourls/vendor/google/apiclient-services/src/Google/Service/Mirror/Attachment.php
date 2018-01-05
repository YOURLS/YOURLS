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

class Google_Service_Mirror_Attachment extends Google_Model
{
  public $contentType;
  public $contentUrl;
  public $id;
  public $isProcessingContent;

  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  public function setContentUrl($contentUrl)
  {
    $this->contentUrl = $contentUrl;
  }
  public function getContentUrl()
  {
    return $this->contentUrl;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsProcessingContent($isProcessingContent)
  {
    $this->isProcessingContent = $isProcessingContent;
  }
  public function getIsProcessingContent()
  {
    return $this->isProcessingContent;
  }
}
