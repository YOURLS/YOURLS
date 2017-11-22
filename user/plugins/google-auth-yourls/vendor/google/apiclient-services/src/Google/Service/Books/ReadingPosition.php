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

class Google_Service_Books_ReadingPosition extends Google_Model
{
  public $epubCfiPosition;
  public $gbImagePosition;
  public $gbTextPosition;
  public $kind;
  public $pdfPosition;
  public $updated;
  public $volumeId;

  public function setEpubCfiPosition($epubCfiPosition)
  {
    $this->epubCfiPosition = $epubCfiPosition;
  }
  public function getEpubCfiPosition()
  {
    return $this->epubCfiPosition;
  }
  public function setGbImagePosition($gbImagePosition)
  {
    $this->gbImagePosition = $gbImagePosition;
  }
  public function getGbImagePosition()
  {
    return $this->gbImagePosition;
  }
  public function setGbTextPosition($gbTextPosition)
  {
    $this->gbTextPosition = $gbTextPosition;
  }
  public function getGbTextPosition()
  {
    return $this->gbTextPosition;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPdfPosition($pdfPosition)
  {
    $this->pdfPosition = $pdfPosition;
  }
  public function getPdfPosition()
  {
    return $this->pdfPosition;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}
