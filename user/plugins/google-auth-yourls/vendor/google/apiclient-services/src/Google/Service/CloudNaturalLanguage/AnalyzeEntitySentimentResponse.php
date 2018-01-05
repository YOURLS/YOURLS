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

class Google_Service_CloudNaturalLanguage_AnalyzeEntitySentimentResponse extends Google_Collection
{
  protected $collection_key = 'entities';
  protected $entitiesType = 'Google_Service_CloudNaturalLanguage_Entity';
  protected $entitiesDataType = 'array';
  public $language;

  /**
   * @param Google_Service_CloudNaturalLanguage_Entity
   */
  public function setEntities($entities)
  {
    $this->entities = $entities;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Entity
   */
  public function getEntities()
  {
    return $this->entities;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
}
