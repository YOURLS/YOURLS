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

class Google_Service_Slides_TextElement extends Google_Model
{
  protected $autoTextType = 'Google_Service_Slides_AutoText';
  protected $autoTextDataType = '';
  public $endIndex;
  protected $paragraphMarkerType = 'Google_Service_Slides_ParagraphMarker';
  protected $paragraphMarkerDataType = '';
  public $startIndex;
  protected $textRunType = 'Google_Service_Slides_TextRun';
  protected $textRunDataType = '';

  /**
   * @param Google_Service_Slides_AutoText
   */
  public function setAutoText(Google_Service_Slides_AutoText $autoText)
  {
    $this->autoText = $autoText;
  }
  /**
   * @return Google_Service_Slides_AutoText
   */
  public function getAutoText()
  {
    return $this->autoText;
  }
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param Google_Service_Slides_ParagraphMarker
   */
  public function setParagraphMarker(Google_Service_Slides_ParagraphMarker $paragraphMarker)
  {
    $this->paragraphMarker = $paragraphMarker;
  }
  /**
   * @return Google_Service_Slides_ParagraphMarker
   */
  public function getParagraphMarker()
  {
    return $this->paragraphMarker;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  /**
   * @param Google_Service_Slides_TextRun
   */
  public function setTextRun(Google_Service_Slides_TextRun $textRun)
  {
    $this->textRun = $textRun;
  }
  /**
   * @return Google_Service_Slides_TextRun
   */
  public function getTextRun()
  {
    return $this->textRun;
  }
}
