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

class Google_Service_YouTube_VideoProcessingDetails extends Google_Model
{
  public $editorSuggestionsAvailability;
  public $fileDetailsAvailability;
  public $processingFailureReason;
  public $processingIssuesAvailability;
  protected $processingProgressType = 'Google_Service_YouTube_VideoProcessingDetailsProcessingProgress';
  protected $processingProgressDataType = '';
  public $processingStatus;
  public $tagSuggestionsAvailability;
  public $thumbnailsAvailability;

  public function setEditorSuggestionsAvailability($editorSuggestionsAvailability)
  {
    $this->editorSuggestionsAvailability = $editorSuggestionsAvailability;
  }
  public function getEditorSuggestionsAvailability()
  {
    return $this->editorSuggestionsAvailability;
  }
  public function setFileDetailsAvailability($fileDetailsAvailability)
  {
    $this->fileDetailsAvailability = $fileDetailsAvailability;
  }
  public function getFileDetailsAvailability()
  {
    return $this->fileDetailsAvailability;
  }
  public function setProcessingFailureReason($processingFailureReason)
  {
    $this->processingFailureReason = $processingFailureReason;
  }
  public function getProcessingFailureReason()
  {
    return $this->processingFailureReason;
  }
  public function setProcessingIssuesAvailability($processingIssuesAvailability)
  {
    $this->processingIssuesAvailability = $processingIssuesAvailability;
  }
  public function getProcessingIssuesAvailability()
  {
    return $this->processingIssuesAvailability;
  }
  /**
   * @param Google_Service_YouTube_VideoProcessingDetailsProcessingProgress
   */
  public function setProcessingProgress(Google_Service_YouTube_VideoProcessingDetailsProcessingProgress $processingProgress)
  {
    $this->processingProgress = $processingProgress;
  }
  /**
   * @return Google_Service_YouTube_VideoProcessingDetailsProcessingProgress
   */
  public function getProcessingProgress()
  {
    return $this->processingProgress;
  }
  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }
  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }
  public function setTagSuggestionsAvailability($tagSuggestionsAvailability)
  {
    $this->tagSuggestionsAvailability = $tagSuggestionsAvailability;
  }
  public function getTagSuggestionsAvailability()
  {
    return $this->tagSuggestionsAvailability;
  }
  public function setThumbnailsAvailability($thumbnailsAvailability)
  {
    $this->thumbnailsAvailability = $thumbnailsAvailability;
  }
  public function getThumbnailsAvailability()
  {
    return $this->thumbnailsAvailability;
  }
}
