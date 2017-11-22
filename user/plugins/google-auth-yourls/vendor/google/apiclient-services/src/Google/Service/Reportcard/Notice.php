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

class Google_Service_Reportcard_Notice extends Google_Collection
{
  protected $collection_key = 'target';
  public $category;
  public $consumer;
  public $creator;
  public $dashboardUrl;
  public $documentationUrl;
  public $groupKey;
  public $groupName;
  public $id;
  public $kind;
  public $longDescription;
  public $longDescriptionType;
  public $muteId;
  public $postingTask;
  public $postingTimeMs;
  public $score;
  public $shortDescription;
  public $sourceKey;
  public $sourceName;
  public $tag;
  protected $targetType = 'Google_Service_Reportcard_Target';
  protected $targetDataType = 'array';

  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setConsumer($consumer)
  {
    $this->consumer = $consumer;
  }
  public function getConsumer()
  {
    return $this->consumer;
  }
  public function setCreator($creator)
  {
    $this->creator = $creator;
  }
  public function getCreator()
  {
    return $this->creator;
  }
  public function setDashboardUrl($dashboardUrl)
  {
    $this->dashboardUrl = $dashboardUrl;
  }
  public function getDashboardUrl()
  {
    return $this->dashboardUrl;
  }
  public function setDocumentationUrl($documentationUrl)
  {
    $this->documentationUrl = $documentationUrl;
  }
  public function getDocumentationUrl()
  {
    return $this->documentationUrl;
  }
  public function setGroupKey($groupKey)
  {
    $this->groupKey = $groupKey;
  }
  public function getGroupKey()
  {
    return $this->groupKey;
  }
  public function setGroupName($groupName)
  {
    $this->groupName = $groupName;
  }
  public function getGroupName()
  {
    return $this->groupName;
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
  public function setLongDescription($longDescription)
  {
    $this->longDescription = $longDescription;
  }
  public function getLongDescription()
  {
    return $this->longDescription;
  }
  public function setLongDescriptionType($longDescriptionType)
  {
    $this->longDescriptionType = $longDescriptionType;
  }
  public function getLongDescriptionType()
  {
    return $this->longDescriptionType;
  }
  public function setMuteId($muteId)
  {
    $this->muteId = $muteId;
  }
  public function getMuteId()
  {
    return $this->muteId;
  }
  public function setPostingTask($postingTask)
  {
    $this->postingTask = $postingTask;
  }
  public function getPostingTask()
  {
    return $this->postingTask;
  }
  public function setPostingTimeMs($postingTimeMs)
  {
    $this->postingTimeMs = $postingTimeMs;
  }
  public function getPostingTimeMs()
  {
    return $this->postingTimeMs;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setShortDescription($shortDescription)
  {
    $this->shortDescription = $shortDescription;
  }
  public function getShortDescription()
  {
    return $this->shortDescription;
  }
  public function setSourceKey($sourceKey)
  {
    $this->sourceKey = $sourceKey;
  }
  public function getSourceKey()
  {
    return $this->sourceKey;
  }
  public function setSourceName($sourceName)
  {
    $this->sourceName = $sourceName;
  }
  public function getSourceName()
  {
    return $this->sourceName;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
}
