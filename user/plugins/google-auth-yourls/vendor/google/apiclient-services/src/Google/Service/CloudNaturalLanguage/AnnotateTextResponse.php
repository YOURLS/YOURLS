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

class Google_Service_CloudNaturalLanguage_AnnotateTextResponse extends Google_Collection
{
  protected $collection_key = 'tokens';
  protected $categoriesType = 'Google_Service_CloudNaturalLanguage_ClassificationCategory';
  protected $categoriesDataType = 'array';
  protected $documentSentimentType = 'Google_Service_CloudNaturalLanguage_Sentiment';
  protected $documentSentimentDataType = '';
  protected $entitiesType = 'Google_Service_CloudNaturalLanguage_Entity';
  protected $entitiesDataType = 'array';
  public $language;
  protected $sentencesType = 'Google_Service_CloudNaturalLanguage_Sentence';
  protected $sentencesDataType = 'array';
  protected $tokensType = 'Google_Service_CloudNaturalLanguage_Token';
  protected $tokensDataType = 'array';

  /**
   * @param Google_Service_CloudNaturalLanguage_ClassificationCategory
   */
  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_ClassificationCategory
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param Google_Service_CloudNaturalLanguage_Sentiment
   */
  public function setDocumentSentiment(Google_Service_CloudNaturalLanguage_Sentiment $documentSentiment)
  {
    $this->documentSentiment = $documentSentiment;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Sentiment
   */
  public function getDocumentSentiment()
  {
    return $this->documentSentiment;
  }
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
  /**
   * @param Google_Service_CloudNaturalLanguage_Sentence
   */
  public function setSentences($sentences)
  {
    $this->sentences = $sentences;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Sentence
   */
  public function getSentences()
  {
    return $this->sentences;
  }
  /**
   * @param Google_Service_CloudNaturalLanguage_Token
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return Google_Service_CloudNaturalLanguage_Token
   */
  public function getTokens()
  {
    return $this->tokens;
  }
}
