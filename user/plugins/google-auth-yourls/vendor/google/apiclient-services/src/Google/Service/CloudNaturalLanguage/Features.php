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

class Google_Service_CloudNaturalLanguage_Features extends Google_Model
{
  public $classifyText;
  public $extractDocumentSentiment;
  public $extractEntities;
  public $extractEntitySentiment;
  public $extractSyntax;

  public function setClassifyText($classifyText)
  {
    $this->classifyText = $classifyText;
  }
  public function getClassifyText()
  {
    return $this->classifyText;
  }
  public function setExtractDocumentSentiment($extractDocumentSentiment)
  {
    $this->extractDocumentSentiment = $extractDocumentSentiment;
  }
  public function getExtractDocumentSentiment()
  {
    return $this->extractDocumentSentiment;
  }
  public function setExtractEntities($extractEntities)
  {
    $this->extractEntities = $extractEntities;
  }
  public function getExtractEntities()
  {
    return $this->extractEntities;
  }
  public function setExtractEntitySentiment($extractEntitySentiment)
  {
    $this->extractEntitySentiment = $extractEntitySentiment;
  }
  public function getExtractEntitySentiment()
  {
    return $this->extractEntitySentiment;
  }
  public function setExtractSyntax($extractSyntax)
  {
    $this->extractSyntax = $extractSyntax;
  }
  public function getExtractSyntax()
  {
    return $this->extractSyntax;
  }
}
