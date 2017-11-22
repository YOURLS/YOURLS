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

class Google_Service_AdExchangeBuyer_PretargetingConfigVideoPlayerSizes extends Google_Model
{
  public $aspectRatio;
  public $minHeight;
  public $minWidth;

  public function setAspectRatio($aspectRatio)
  {
    $this->aspectRatio = $aspectRatio;
  }
  public function getAspectRatio()
  {
    return $this->aspectRatio;
  }
  public function setMinHeight($minHeight)
  {
    $this->minHeight = $minHeight;
  }
  public function getMinHeight()
  {
    return $this->minHeight;
  }
  public function setMinWidth($minWidth)
  {
    $this->minWidth = $minWidth;
  }
  public function getMinWidth()
  {
    return $this->minWidth;
  }
}
