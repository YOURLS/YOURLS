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

class Google_Service_YouTube_VideoSuggestions extends Google_Collection
{
  protected $collection_key = 'tagSuggestions';
  public $editorSuggestions;
  public $processingErrors;
  public $processingHints;
  public $processingWarnings;
  protected $tagSuggestionsType = 'Google_Service_YouTube_VideoSuggestionsTagSuggestion';
  protected $tagSuggestionsDataType = 'array';

  public function setEditorSuggestions($editorSuggestions)
  {
    $this->editorSuggestions = $editorSuggestions;
  }
  public function getEditorSuggestions()
  {
    return $this->editorSuggestions;
  }
  public function setProcessingErrors($processingErrors)
  {
    $this->processingErrors = $processingErrors;
  }
  public function getProcessingErrors()
  {
    return $this->processingErrors;
  }
  public function setProcessingHints($processingHints)
  {
    $this->processingHints = $processingHints;
  }
  public function getProcessingHints()
  {
    return $this->processingHints;
  }
  public function setProcessingWarnings($processingWarnings)
  {
    $this->processingWarnings = $processingWarnings;
  }
  public function getProcessingWarnings()
  {
    return $this->processingWarnings;
  }
  /**
   * @param Google_Service_YouTube_VideoSuggestionsTagSuggestion
   */
  public function setTagSuggestions($tagSuggestions)
  {
    $this->tagSuggestions = $tagSuggestions;
  }
  /**
   * @return Google_Service_YouTube_VideoSuggestionsTagSuggestion
   */
  public function getTagSuggestions()
  {
    return $this->tagSuggestions;
  }
}
