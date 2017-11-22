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

class Google_Service_Books_AnnotationClientVersionRanges extends Google_Model
{
  protected $cfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
  protected $cfiRangeDataType = '';
  public $contentVersion;
  protected $gbImageRangeType = 'Google_Service_Books_BooksAnnotationsRange';
  protected $gbImageRangeDataType = '';
  protected $gbTextRangeType = 'Google_Service_Books_BooksAnnotationsRange';
  protected $gbTextRangeDataType = '';
  protected $imageCfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
  protected $imageCfiRangeDataType = '';

  /**
   * @param Google_Service_Books_BooksAnnotationsRange
   */
  public function setCfiRange(Google_Service_Books_BooksAnnotationsRange $cfiRange)
  {
    $this->cfiRange = $cfiRange;
  }
  /**
   * @return Google_Service_Books_BooksAnnotationsRange
   */
  public function getCfiRange()
  {
    return $this->cfiRange;
  }
  public function setContentVersion($contentVersion)
  {
    $this->contentVersion = $contentVersion;
  }
  public function getContentVersion()
  {
    return $this->contentVersion;
  }
  /**
   * @param Google_Service_Books_BooksAnnotationsRange
   */
  public function setGbImageRange(Google_Service_Books_BooksAnnotationsRange $gbImageRange)
  {
    $this->gbImageRange = $gbImageRange;
  }
  /**
   * @return Google_Service_Books_BooksAnnotationsRange
   */
  public function getGbImageRange()
  {
    return $this->gbImageRange;
  }
  /**
   * @param Google_Service_Books_BooksAnnotationsRange
   */
  public function setGbTextRange(Google_Service_Books_BooksAnnotationsRange $gbTextRange)
  {
    $this->gbTextRange = $gbTextRange;
  }
  /**
   * @return Google_Service_Books_BooksAnnotationsRange
   */
  public function getGbTextRange()
  {
    return $this->gbTextRange;
  }
  /**
   * @param Google_Service_Books_BooksAnnotationsRange
   */
  public function setImageCfiRange(Google_Service_Books_BooksAnnotationsRange $imageCfiRange)
  {
    $this->imageCfiRange = $imageCfiRange;
  }
  /**
   * @return Google_Service_Books_BooksAnnotationsRange
   */
  public function getImageCfiRange()
  {
    return $this->imageCfiRange;
  }
}
