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

class Google_Service_Genomics_Position extends Google_Model
{
  public $position;
  public $referenceName;
  public $reverseStrand;

  public function setPosition($position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }
  public function getReferenceName()
  {
    return $this->referenceName;
  }
  public function setReverseStrand($reverseStrand)
  {
    $this->reverseStrand = $reverseStrand;
  }
  public function getReverseStrand()
  {
    return $this->reverseStrand;
  }
}
