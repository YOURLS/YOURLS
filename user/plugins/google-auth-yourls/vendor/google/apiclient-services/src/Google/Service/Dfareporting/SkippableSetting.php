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

class Google_Service_Dfareporting_SkippableSetting extends Google_Model
{
  public $kind;
  protected $progressOffsetType = 'Google_Service_Dfareporting_VideoOffset';
  protected $progressOffsetDataType = '';
  protected $skipOffsetType = 'Google_Service_Dfareporting_VideoOffset';
  protected $skipOffsetDataType = '';
  public $skippable;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Dfareporting_VideoOffset
   */
  public function setProgressOffset(Google_Service_Dfareporting_VideoOffset $progressOffset)
  {
    $this->progressOffset = $progressOffset;
  }
  /**
   * @return Google_Service_Dfareporting_VideoOffset
   */
  public function getProgressOffset()
  {
    return $this->progressOffset;
  }
  /**
   * @param Google_Service_Dfareporting_VideoOffset
   */
  public function setSkipOffset(Google_Service_Dfareporting_VideoOffset $skipOffset)
  {
    $this->skipOffset = $skipOffset;
  }
  /**
   * @return Google_Service_Dfareporting_VideoOffset
   */
  public function getSkipOffset()
  {
    return $this->skipOffset;
  }
  public function setSkippable($skippable)
  {
    $this->skippable = $skippable;
  }
  public function getSkippable()
  {
    return $this->skippable;
  }
}
