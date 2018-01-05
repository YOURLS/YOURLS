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

class Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelAnnotation extends Google_Collection
{
  protected $collection_key = 'segments';
  protected $categoryEntitiesType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity';
  protected $categoryEntitiesDataType = 'array';
  protected $entityType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity';
  protected $entityDataType = '';
  protected $framesType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelFrame';
  protected $framesDataType = 'array';
  protected $segmentsType = 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelSegment';
  protected $segmentsDataType = 'array';

  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity
   */
  public function setCategoryEntities($categoryEntities)
  {
    $this->categoryEntities = $categoryEntities;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity
   */
  public function getCategoryEntities()
  {
    return $this->categoryEntities;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity
   */
  public function setEntity(Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelFrame
   */
  public function setFrames($frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelFrame
   */
  public function getFrames()
  {
    return $this->frames;
  }
  /**
   * @param Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelSegment
   */
  public function setSegments($segments)
  {
    $this->segments = $segments;
  }
  /**
   * @return Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1LabelSegment
   */
  public function getSegments()
  {
    return $this->segments;
  }
}
