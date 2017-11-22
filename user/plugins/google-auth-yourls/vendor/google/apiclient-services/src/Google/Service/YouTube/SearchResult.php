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

class Google_Service_YouTube_SearchResult extends Google_Model
{
  public $etag;
  protected $idType = 'Google_Service_YouTube_ResourceId';
  protected $idDataType = '';
  public $kind;
  protected $snippetType = 'Google_Service_YouTube_SearchResultSnippet';
  protected $snippetDataType = '';

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_YouTube_ResourceId
   */
  public function setId(Google_Service_YouTube_ResourceId $id)
  {
    $this->id = $id;
  }
  /**
   * @return Google_Service_YouTube_ResourceId
   */
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_YouTube_SearchResultSnippet
   */
  public function setSnippet(Google_Service_YouTube_SearchResultSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return Google_Service_YouTube_SearchResultSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
}
