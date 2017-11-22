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

class Google_Service_Books_BooksAnnotationsRange extends Google_Model
{
  public $endOffset;
  public $endPosition;
  public $startOffset;
  public $startPosition;

  public function setEndOffset($endOffset)
  {
    $this->endOffset = $endOffset;
  }
  public function getEndOffset()
  {
    return $this->endOffset;
  }
  public function setEndPosition($endPosition)
  {
    $this->endPosition = $endPosition;
  }
  public function getEndPosition()
  {
    return $this->endPosition;
  }
  public function setStartOffset($startOffset)
  {
    $this->startOffset = $startOffset;
  }
  public function getStartOffset()
  {
    return $this->startOffset;
  }
  public function setStartPosition($startPosition)
  {
    $this->startPosition = $startPosition;
  }
  public function getStartPosition()
  {
    return $this->startPosition;
  }
}
