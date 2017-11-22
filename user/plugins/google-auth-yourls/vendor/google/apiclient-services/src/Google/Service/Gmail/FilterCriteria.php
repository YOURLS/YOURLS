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

class Google_Service_Gmail_FilterCriteria extends Google_Model
{
  public $excludeChats;
  public $from;
  public $hasAttachment;
  public $negatedQuery;
  public $query;
  public $size;
  public $sizeComparison;
  public $subject;
  public $to;

  public function setExcludeChats($excludeChats)
  {
    $this->excludeChats = $excludeChats;
  }
  public function getExcludeChats()
  {
    return $this->excludeChats;
  }
  public function setFrom($from)
  {
    $this->from = $from;
  }
  public function getFrom()
  {
    return $this->from;
  }
  public function setHasAttachment($hasAttachment)
  {
    $this->hasAttachment = $hasAttachment;
  }
  public function getHasAttachment()
  {
    return $this->hasAttachment;
  }
  public function setNegatedQuery($negatedQuery)
  {
    $this->negatedQuery = $negatedQuery;
  }
  public function getNegatedQuery()
  {
    return $this->negatedQuery;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSizeComparison($sizeComparison)
  {
    $this->sizeComparison = $sizeComparison;
  }
  public function getSizeComparison()
  {
    return $this->sizeComparison;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function setTo($to)
  {
    $this->to = $to;
  }
  public function getTo()
  {
    return $this->to;
  }
}
