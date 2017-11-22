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

class Google_Service_Reportcard_Mute extends Google_Collection
{
  protected $collection_key = 'tag';
  public $consumer;
  public $createdBy;
  public $creationTimeMs;
  public $creator;
  public $expiryTimeMs;
  public $groupKey;
  public $id;
  public $kind;
  public $reason;
  public $sourceKey;
  public $tag;
  protected $targetType = 'Google_Service_Reportcard_Target';
  protected $targetDataType = '';
  public $text;

  public function setConsumer($consumer)
  {
    $this->consumer = $consumer;
  }
  public function getConsumer()
  {
    return $this->consumer;
  }
  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  public function setCreationTimeMs($creationTimeMs)
  {
    $this->creationTimeMs = $creationTimeMs;
  }
  public function getCreationTimeMs()
  {
    return $this->creationTimeMs;
  }
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  public function getCreator()
  {
    return $this->creator;
  }
  public function setExpiryTimeMs($expiryTimeMs)
  {
    $this->expiryTimeMs = $expiryTimeMs;
  }
  public function getExpiryTimeMs()
  {
    return $this->expiryTimeMs;
  }
  public function setGroupKey($groupKey)
  {
    $this->groupKey = $groupKey;
  }
  public function getGroupKey()
  {
    return $this->groupKey;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  public function setSourceKey($sourceKey)
  {
    $this->sourceKey = $sourceKey;
  }
  public function getSourceKey()
  {
    return $this->sourceKey;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setTarget(Google_Service_Reportcard_Target $target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}
