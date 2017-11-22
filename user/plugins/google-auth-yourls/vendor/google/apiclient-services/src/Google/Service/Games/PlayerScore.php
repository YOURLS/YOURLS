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

class Google_Service_Games_PlayerScore extends Google_Model
{
  public $formattedScore;
  public $kind;
  public $score;
  public $scoreTag;
  public $timeSpan;

  public function setFormattedScore($formattedScore)
  {
    $this->formattedScore = $formattedScore;
  }
  public function getFormattedScore()
  {
    return $this->formattedScore;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setScoreTag($scoreTag)
  {
    $this->scoreTag = $scoreTag;
  }
  public function getScoreTag()
  {
    return $this->scoreTag;
  }
  public function setTimeSpan($timeSpan)
  {
    $this->timeSpan = $timeSpan;
  }
  public function getTimeSpan()
  {
    return $this->timeSpan;
  }
}
