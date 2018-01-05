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

class Google_Service_Cih_UserInteraction extends Google_Collection
{
  protected $collection_key = 'otherParticipant';
  protected $adoptionInteractionType = 'Google_Service_Cih_AdoptionInteraction';
  protected $adoptionInteractionDataType = '';
  protected $advertiserExperienceDataType = 'Google_Service_Cih_AdvertiserExperienceData';
  protected $advertiserExperienceDataDataType = '';
  protected $casesDataType = 'Google_Service_Cih_CasesData';
  protected $casesDataDataType = '';
  protected $chatInteractionType = 'Google_Service_Cih_ChatInteraction';
  protected $chatInteractionDataType = '';
  public $contactGaiaId;
  protected $customerType = 'Google_Service_Cih_Participant';
  protected $customerDataType = 'array';
  public $detailedDescription;
  public $detailedDescriptionTruncated;
  protected $emailInteractionType = 'Google_Service_Cih_EmailInteraction';
  protected $emailInteractionDataType = '';
  protected $entityType = 'Google_Service_Cih_Entity';
  protected $entityDataType = '';
  protected $gammaDataType = 'Google_Service_Cih_GammaData';
  protected $gammaDataDataType = '';
  protected $genieDataType = 'Google_Service_Cih_GenieData';
  protected $genieDataDataType = '';
  protected $goalInteractionType = 'Google_Service_Cih_GoalInteraction';
  protected $goalInteractionDataType = '';
  protected $googlerType = 'Google_Service_Cih_Participant';
  protected $googlerDataType = 'array';
  protected $greenTeaDataType = 'Google_Service_Cih_GreenTeaData';
  protected $greenTeaDataDataType = '';
  protected $grmDataType = 'Google_Service_Cih_GrmData';
  protected $grmDataDataType = '';
  protected $hangoutInteractionType = 'Google_Service_Cih_HangoutInteraction';
  protected $hangoutInteractionDataType = '';
  protected $helpcenterDataType = 'Google_Service_Cih_HelpcenterData';
  protected $helpcenterDataDataType = '';
  protected $incentiveInteractionType = 'Google_Service_Cih_IncentiveInteraction';
  protected $incentiveInteractionDataType = '';
  protected $incentivesDataType = 'Google_Service_Cih_IncentivesData';
  protected $incentivesDataDataType = '';
  protected $initiatorType = 'Google_Service_Cih_Participant';
  protected $initiatorDataType = '';
  public $interactionOrigin;
  public $interactionType;
  public $kind;
  public $language;
  protected $marketingEmailInteractionType = 'Google_Service_Cih_MarketingEmailInteraction';
  protected $marketingEmailInteractionDataType = '';
  protected $meetingInteractionType = 'Google_Service_Cih_MeetingInteraction';
  protected $meetingInteractionDataType = '';
  public $metaType;
  protected $noteInteractionType = 'Google_Service_Cih_NoteInteraction';
  protected $noteInteractionDataType = '';
  protected $otherParticipantType = 'Google_Service_Cih_Participant';
  protected $otherParticipantDataType = 'array';
  protected $partnerSearchDataType = 'Google_Service_Cih_PartnerSearchData';
  protected $partnerSearchDataDataType = '';
  protected $phoneInteractionType = 'Google_Service_Cih_PhoneInteraction';
  protected $phoneInteractionDataType = '';
  public $sourceSystemPrimaryKey;
  public $summary;
  public $summaryTruncated;
  protected $taskInteractionType = 'Google_Service_Cih_TaskInteraction';
  protected $taskInteractionDataType = '';
  public $timestamp;
  protected $traxDataType = 'Google_Service_Cih_TraxData';
  protected $traxDataDataType = '';
  protected $traxInteractionType = 'Google_Service_Cih_TraxInteraction';
  protected $traxInteractionDataType = '';
  protected $userCommDataType = 'Google_Service_Cih_UserCommData';
  protected $userCommDataDataType = '';

  public function setAdoptionInteraction(Google_Service_Cih_AdoptionInteraction $adoptionInteraction)
  {
    $this->adoptionInteraction = $adoptionInteraction;
  }
  public function getAdoptionInteraction()
  {
    return $this->adoptionInteraction;
  }
  public function setAdvertiserExperienceData(Google_Service_Cih_AdvertiserExperienceData $advertiserExperienceData)
  {
    $this->advertiserExperienceData = $advertiserExperienceData;
  }
  public function getAdvertiserExperienceData()
  {
    return $this->advertiserExperienceData;
  }
  public function setCasesData(Google_Service_Cih_CasesData $casesData)
  {
    $this->casesData = $casesData;
  }
  public function getCasesData()
  {
    return $this->casesData;
  }
  public function setChatInteraction(Google_Service_Cih_ChatInteraction $chatInteraction)
  {
    $this->chatInteraction = $chatInteraction;
  }
  public function getChatInteraction()
  {
    return $this->chatInteraction;
  }
  public function setContactGaiaId($contactGaiaId)
  {
    $this->contactGaiaId = $contactGaiaId;
  }
  public function getContactGaiaId()
  {
    return $this->contactGaiaId;
  }
  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }
  public function getCustomer()
  {
    return $this->customer;
  }
  public function setDetailedDescription($detailedDescription)
  {
    $this->detailedDescription = $detailedDescription;
  }
  public function getDetailedDescription()
  {
    return $this->detailedDescription;
  }
  public function setDetailedDescriptionTruncated($detailedDescriptionTruncated)
  {
    $this->detailedDescriptionTruncated = $detailedDescriptionTruncated;
  }
  public function getDetailedDescriptionTruncated()
  {
    return $this->detailedDescriptionTruncated;
  }
  public function setEmailInteraction(Google_Service_Cih_EmailInteraction $emailInteraction)
  {
    $this->emailInteraction = $emailInteraction;
  }
  public function getEmailInteraction()
  {
    return $this->emailInteraction;
  }
  public function setEntity(Google_Service_Cih_Entity $entity)
  {
    $this->entity = $entity;
  }
  public function getEntity()
  {
    return $this->entity;
  }
  public function setGammaData(Google_Service_Cih_GammaData $gammaData)
  {
    $this->gammaData = $gammaData;
  }
  public function getGammaData()
  {
    return $this->gammaData;
  }
  public function setGenieData(Google_Service_Cih_GenieData $genieData)
  {
    $this->genieData = $genieData;
  }
  public function getGenieData()
  {
    return $this->genieData;
  }
  public function setGoalInteraction(Google_Service_Cih_GoalInteraction $goalInteraction)
  {
    $this->goalInteraction = $goalInteraction;
  }
  public function getGoalInteraction()
  {
    return $this->goalInteraction;
  }
  public function setGoogler($googler)
  {
    $this->googler = $googler;
  }
  public function getGoogler()
  {
    return $this->googler;
  }
  public function setGreenTeaData(Google_Service_Cih_GreenTeaData $greenTeaData)
  {
    $this->greenTeaData = $greenTeaData;
  }
  public function getGreenTeaData()
  {
    return $this->greenTeaData;
  }
  public function setGrmData(Google_Service_Cih_GrmData $grmData)
  {
    $this->grmData = $grmData;
  }
  public function getGrmData()
  {
    return $this->grmData;
  }
  public function setHangoutInteraction(Google_Service_Cih_HangoutInteraction $hangoutInteraction)
  {
    $this->hangoutInteraction = $hangoutInteraction;
  }
  public function getHangoutInteraction()
  {
    return $this->hangoutInteraction;
  }
  public function setHelpcenterData(Google_Service_Cih_HelpcenterData $helpcenterData)
  {
    $this->helpcenterData = $helpcenterData;
  }
  public function getHelpcenterData()
  {
    return $this->helpcenterData;
  }
  public function setIncentiveInteraction(Google_Service_Cih_IncentiveInteraction $incentiveInteraction)
  {
    $this->incentiveInteraction = $incentiveInteraction;
  }
  public function getIncentiveInteraction()
  {
    return $this->incentiveInteraction;
  }
  public function setIncentivesData(Google_Service_Cih_IncentivesData $incentivesData)
  {
    $this->incentivesData = $incentivesData;
  }
  public function getIncentivesData()
  {
    return $this->incentivesData;
  }
  public function setInitiator(Google_Service_Cih_Participant $initiator)
  {
    $this->initiator = $initiator;
  }
  public function getInitiator()
  {
    return $this->initiator;
  }
  public function setInteractionOrigin($interactionOrigin)
  {
    $this->interactionOrigin = $interactionOrigin;
  }
  public function getInteractionOrigin()
  {
    return $this->interactionOrigin;
  }
  public function setInteractionType($interactionType)
  {
    $this->interactionType = $interactionType;
  }
  public function getInteractionType()
  {
    return $this->interactionType;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setMarketingEmailInteraction(Google_Service_Cih_MarketingEmailInteraction $marketingEmailInteraction)
  {
    $this->marketingEmailInteraction = $marketingEmailInteraction;
  }
  public function getMarketingEmailInteraction()
  {
    return $this->marketingEmailInteraction;
  }
  public function setMeetingInteraction(Google_Service_Cih_MeetingInteraction $meetingInteraction)
  {
    $this->meetingInteraction = $meetingInteraction;
  }
  public function getMeetingInteraction()
  {
    return $this->meetingInteraction;
  }
  public function setMetaType($metaType)
  {
    $this->metaType = $metaType;
  }
  public function getMetaType()
  {
    return $this->metaType;
  }
  public function setNoteInteraction(Google_Service_Cih_NoteInteraction $noteInteraction)
  {
    $this->noteInteraction = $noteInteraction;
  }
  public function getNoteInteraction()
  {
    return $this->noteInteraction;
  }
  public function setOtherParticipant($otherParticipant)
  {
    $this->otherParticipant = $otherParticipant;
  }
  public function getOtherParticipant()
  {
    return $this->otherParticipant;
  }
  public function setPartnerSearchData(Google_Service_Cih_PartnerSearchData $partnerSearchData)
  {
    $this->partnerSearchData = $partnerSearchData;
  }
  public function getPartnerSearchData()
  {
    return $this->partnerSearchData;
  }
  public function setPhoneInteraction(Google_Service_Cih_PhoneInteraction $phoneInteraction)
  {
    $this->phoneInteraction = $phoneInteraction;
  }
  public function getPhoneInteraction()
  {
    return $this->phoneInteraction;
  }
  public function setSourceSystemPrimaryKey($sourceSystemPrimaryKey)
  {
    $this->sourceSystemPrimaryKey = $sourceSystemPrimaryKey;
  }
  public function getSourceSystemPrimaryKey()
  {
    return $this->sourceSystemPrimaryKey;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
  public function setSummaryTruncated($summaryTruncated)
  {
    $this->summaryTruncated = $summaryTruncated;
  }
  public function getSummaryTruncated()
  {
    return $this->summaryTruncated;
  }
  public function setTaskInteraction(Google_Service_Cih_TaskInteraction $taskInteraction)
  {
    $this->taskInteraction = $taskInteraction;
  }
  public function getTaskInteraction()
  {
    return $this->taskInteraction;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setTraxData(Google_Service_Cih_TraxData $traxData)
  {
    $this->traxData = $traxData;
  }
  public function getTraxData()
  {
    return $this->traxData;
  }
  public function setTraxInteraction(Google_Service_Cih_TraxInteraction $traxInteraction)
  {
    $this->traxInteraction = $traxInteraction;
  }
  public function getTraxInteraction()
  {
    return $this->traxInteraction;
  }
  public function setUserCommData(Google_Service_Cih_UserCommData $userCommData)
  {
    $this->userCommData = $userCommData;
  }
  public function getUserCommData()
  {
    return $this->userCommData;
  }
}
