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

class Google_Service_Spanner_PlanNode extends Google_Collection
{
  protected $collection_key = 'childLinks';
  protected $childLinksType = 'Google_Service_Spanner_ChildLink';
  protected $childLinksDataType = 'array';
  public $displayName;
  public $executionStats;
  public $index;
  public $kind;
  public $metadata;
  protected $shortRepresentationType = 'Google_Service_Spanner_ShortRepresentation';
  protected $shortRepresentationDataType = '';

  /**
   * @param Google_Service_Spanner_ChildLink
   */
  public function setChildLinks($childLinks)
  {
    $this->childLinks = $childLinks;
  }
  /**
   * @return Google_Service_Spanner_ChildLink
   */
  public function getChildLinks()
  {
    return $this->childLinks;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExecutionStats($executionStats)
  {
    $this->executionStats = $executionStats;
  }
  public function getExecutionStats()
  {
    return $this->executionStats;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_Spanner_ShortRepresentation
   */
  public function setShortRepresentation(Google_Service_Spanner_ShortRepresentation $shortRepresentation)
  {
    $this->shortRepresentation = $shortRepresentation;
  }
  /**
   * @return Google_Service_Spanner_ShortRepresentation
   */
  public function getShortRepresentation()
  {
    return $this->shortRepresentation;
  }
}
