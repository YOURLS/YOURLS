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

class Google_Service_CloudNaturalLanguage_Entity extends Google_Collection
{
  protected $collection_key = 'mentions';
  protected $mentionsType = 'Google_Service_CloudNaturalLanguage_EntityMention';
  protected $mentionsDataType = 'array';
  public $metadata;
  public $name;
  public $salience;
  protected $sentimentType = 'Google_Service_CloudNaturalLanguage_Sentiment';
  protected $sentimentDataType = '';
  public $type;

  /**
   * @param Google_Service_CloudNaturalLanguage_EntityMention
   */
  public function setMentions($mentions)
  {
    $this->mentions = $mentions;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_EntityMention
   */
  public function getMentions()
  {
    return $this->mentions;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param Google_Service_CloudNaturalLanguage_Sentiment
   */
  public function setSentiment(Google_Service_CloudNaturalLanguage_Sentiment $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Sentiment
   */
  public function getSentiment()
  {
    return $this->sentiment;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
