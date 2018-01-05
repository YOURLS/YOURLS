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

class Google_Service_Dialogflow_IntentMessage extends Google_Model
{
  protected $basicCardType = 'Google_Service_Dialogflow_IntentMessageBasicCard';
  protected $basicCardDataType = '';
  protected $cardType = 'Google_Service_Dialogflow_IntentMessageCard';
  protected $cardDataType = '';
  protected $carouselSelectType = 'Google_Service_Dialogflow_IntentMessageCarouselSelect';
  protected $carouselSelectDataType = '';
  protected $imageType = 'Google_Service_Dialogflow_IntentMessageImage';
  protected $imageDataType = '';
  protected $linkOutSuggestionType = 'Google_Service_Dialogflow_IntentMessageLinkOutSuggestion';
  protected $linkOutSuggestionDataType = '';
  protected $listSelectType = 'Google_Service_Dialogflow_IntentMessageListSelect';
  protected $listSelectDataType = '';
  public $payload;
  public $platform;
  protected $quickRepliesType = 'Google_Service_Dialogflow_IntentMessageQuickReplies';
  protected $quickRepliesDataType = '';
  protected $simpleResponsesType = 'Google_Service_Dialogflow_IntentMessageSimpleResponses';
  protected $simpleResponsesDataType = '';
  protected $suggestionsType = 'Google_Service_Dialogflow_IntentMessageSuggestions';
  protected $suggestionsDataType = '';
  protected $textType = 'Google_Service_Dialogflow_IntentMessageText';
  protected $textDataType = '';

  /**
   * @param Google_Service_Dialogflow_IntentMessageBasicCard
   */
  public function setBasicCard(Google_Service_Dialogflow_IntentMessageBasicCard $basicCard)
  {
    $this->basicCard = $basicCard;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageBasicCard
   */
  public function getBasicCard()
  {
    return $this->basicCard;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageCard
   */
  public function setCard(Google_Service_Dialogflow_IntentMessageCard $card)
  {
    $this->card = $card;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageCard
   */
  public function getCard()
  {
    return $this->card;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageCarouselSelect
   */
  public function setCarouselSelect(Google_Service_Dialogflow_IntentMessageCarouselSelect $carouselSelect)
  {
    $this->carouselSelect = $carouselSelect;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageCarouselSelect
   */
  public function getCarouselSelect()
  {
    return $this->carouselSelect;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageImage
   */
  public function setImage(Google_Service_Dialogflow_IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageLinkOutSuggestion
   */
  public function setLinkOutSuggestion(Google_Service_Dialogflow_IntentMessageLinkOutSuggestion $linkOutSuggestion)
  {
    $this->linkOutSuggestion = $linkOutSuggestion;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageLinkOutSuggestion
   */
  public function getLinkOutSuggestion()
  {
    return $this->linkOutSuggestion;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageListSelect
   */
  public function setListSelect(Google_Service_Dialogflow_IntentMessageListSelect $listSelect)
  {
    $this->listSelect = $listSelect;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageListSelect
   */
  public function getListSelect()
  {
    return $this->listSelect;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageQuickReplies
   */
  public function setQuickReplies(Google_Service_Dialogflow_IntentMessageQuickReplies $quickReplies)
  {
    $this->quickReplies = $quickReplies;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageQuickReplies
   */
  public function getQuickReplies()
  {
    return $this->quickReplies;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageSimpleResponses
   */
  public function setSimpleResponses(Google_Service_Dialogflow_IntentMessageSimpleResponses $simpleResponses)
  {
    $this->simpleResponses = $simpleResponses;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageSimpleResponses
   */
  public function getSimpleResponses()
  {
    return $this->simpleResponses;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageSuggestions
   */
  public function setSuggestions(Google_Service_Dialogflow_IntentMessageSuggestions $suggestions)
  {
    $this->suggestions = $suggestions;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageSuggestions
   */
  public function getSuggestions()
  {
    return $this->suggestions;
  }
  /**
   * @param Google_Service_Dialogflow_IntentMessageText
   */
  public function setText(Google_Service_Dialogflow_IntentMessageText $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_Dialogflow_IntentMessageText
   */
  public function getText()
  {
    return $this->text;
  }
}
