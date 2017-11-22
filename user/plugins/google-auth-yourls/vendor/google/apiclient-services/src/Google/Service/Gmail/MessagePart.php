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

class Google_Service_Gmail_MessagePart extends Google_Collection
{
  protected $collection_key = 'parts';
  protected $bodyType = 'Google_Service_Gmail_MessagePartBody';
  protected $bodyDataType = '';
  public $filename;
  protected $headersType = 'Google_Service_Gmail_MessagePartHeader';
  protected $headersDataType = 'array';
  public $mimeType;
  public $partId;
  protected $partsType = 'Google_Service_Gmail_MessagePart';
  protected $partsDataType = 'array';

  /**
   * @param Google_Service_Gmail_MessagePartBody
   */
  public function setBody(Google_Service_Gmail_MessagePartBody $body)
  {
    $this->body = $body;
  }
  /**
   * @return Google_Service_Gmail_MessagePartBody
   */
  public function getBody()
  {
    return $this->body;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param Google_Service_Gmail_MessagePartHeader
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return Google_Service_Gmail_MessagePartHeader
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setPartId($partId)
  {
    $this->partId = $partId;
  }
  public function getPartId()
  {
    return $this->partId;
  }
  /**
   * @param Google_Service_Gmail_MessagePart
   */
  public function setParts($parts)
  {
    $this->parts = $parts;
  }
  /**
   * @return Google_Service_Gmail_MessagePart
   */
  public function getParts()
  {
    return $this->parts;
  }
}
