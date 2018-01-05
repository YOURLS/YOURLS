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

class Google_Service_Spanner_KeyRange extends Google_Collection
{
  protected $collection_key = 'startOpen';
  public $endClosed;
  public $endOpen;
  public $startClosed;
  public $startOpen;

  public function setEndClosed($endClosed)
  {
    $this->endClosed = $endClosed;
  }
  public function getEndClosed()
  {
    return $this->endClosed;
  }
  public function setEndOpen($endOpen)
  {
    $this->endOpen = $endOpen;
  }
  public function getEndOpen()
  {
    return $this->endOpen;
  }
  public function setStartClosed($startClosed)
  {
    $this->startClosed = $startClosed;
  }
  public function getStartClosed()
  {
    return $this->startClosed;
  }
  public function setStartOpen($startOpen)
  {
    $this->startOpen = $startOpen;
  }
  public function getStartOpen()
  {
    return $this->startOpen;
  }
}
