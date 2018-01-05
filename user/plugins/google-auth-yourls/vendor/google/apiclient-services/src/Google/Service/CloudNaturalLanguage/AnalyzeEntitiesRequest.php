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

class Google_Service_CloudNaturalLanguage_AnalyzeEntitiesRequest extends Google_Model
{
  protected $documentType = 'Google_Service_CloudNaturalLanguage_Document';
  protected $documentDataType = '';
  public $encodingType;

  /**
   * @param Google_Service_CloudNaturalLanguage_Document
   */
  public function setDocument(Google_Service_CloudNaturalLanguage_Document $document)
  {
    $this->document = $document;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Document
   */
  public function getDocument()
  {
    return $this->document;
  }
  public function setEncodingType($encodingType)
  {
    $this->encodingType = $encodingType;
  }
  public function getEncodingType()
  {
    return $this->encodingType;
  }
}
