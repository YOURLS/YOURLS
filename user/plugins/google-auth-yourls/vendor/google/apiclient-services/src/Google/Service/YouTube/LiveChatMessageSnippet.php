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

class Google_Service_YouTube_LiveChatMessageSnippet extends Google_Model
{
  public $authorChannelId;
  public $displayMessage;
  protected $fanFundingEventDetailsType = 'Google_Service_YouTube_LiveChatFanFundingEventDetails';
  protected $fanFundingEventDetailsDataType = '';
  public $hasDisplayContent;
  public $liveChatId;
  protected $messageDeletedDetailsType = 'Google_Service_YouTube_LiveChatMessageDeletedDetails';
  protected $messageDeletedDetailsDataType = '';
  protected $messageRetractedDetailsType = 'Google_Service_YouTube_LiveChatMessageRetractedDetails';
  protected $messageRetractedDetailsDataType = '';
  protected $pollClosedDetailsType = 'Google_Service_YouTube_LiveChatPollClosedDetails';
  protected $pollClosedDetailsDataType = '';
  protected $pollEditedDetailsType = 'Google_Service_YouTube_LiveChatPollEditedDetails';
  protected $pollEditedDetailsDataType = '';
  protected $pollOpenedDetailsType = 'Google_Service_YouTube_LiveChatPollOpenedDetails';
  protected $pollOpenedDetailsDataType = '';
  protected $pollVotedDetailsType = 'Google_Service_YouTube_LiveChatPollVotedDetails';
  protected $pollVotedDetailsDataType = '';
  public $publishedAt;
  protected $superChatDetailsType = 'Google_Service_YouTube_LiveChatSuperChatDetails';
  protected $superChatDetailsDataType = '';
  protected $textMessageDetailsType = 'Google_Service_YouTube_LiveChatTextMessageDetails';
  protected $textMessageDetailsDataType = '';
  public $type;
  protected $userBannedDetailsType = 'Google_Service_YouTube_LiveChatUserBannedMessageDetails';
  protected $userBannedDetailsDataType = '';

  public function setAuthorChannelId($authorChannelId)
  {
    $this->authorChannelId = $authorChannelId;
  }
  public function getAuthorChannelId()
  {
    return $this->authorChannelId;
  }
  public function setDisplayMessage($displayMessage)
  {
    $this->displayMessage = $displayMessage;
  }
  public function getDisplayMessage()
  {
    return $this->displayMessage;
  }
  /**
   * @param Google_Service_YouTube_LiveChatFanFundingEventDetails
   */
  public function setFanFundingEventDetails(Google_Service_YouTube_LiveChatFanFundingEventDetails $fanFundingEventDetails)
  {
    $this->fanFundingEventDetails = $fanFundingEventDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatFanFundingEventDetails
   */
  public function getFanFundingEventDetails()
  {
    return $this->fanFundingEventDetails;
  }
  public function setHasDisplayContent($hasDisplayContent)
  {
    $this->hasDisplayContent = $hasDisplayContent;
  }
  public function getHasDisplayContent()
  {
    return $this->hasDisplayContent;
  }
  public function setLiveChatId($liveChatId)
  {
    $this->liveChatId = $liveChatId;
  }
  public function getLiveChatId()
  {
    return $this->liveChatId;
  }
  /**
   * @param Google_Service_YouTube_LiveChatMessageDeletedDetails
   */
  public function setMessageDeletedDetails(Google_Service_YouTube_LiveChatMessageDeletedDetails $messageDeletedDetails)
  {
    $this->messageDeletedDetails = $messageDeletedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatMessageDeletedDetails
   */
  public function getMessageDeletedDetails()
  {
    return $this->messageDeletedDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatMessageRetractedDetails
   */
  public function setMessageRetractedDetails(Google_Service_YouTube_LiveChatMessageRetractedDetails $messageRetractedDetails)
  {
    $this->messageRetractedDetails = $messageRetractedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatMessageRetractedDetails
   */
  public function getMessageRetractedDetails()
  {
    return $this->messageRetractedDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatPollClosedDetails
   */
  public function setPollClosedDetails(Google_Service_YouTube_LiveChatPollClosedDetails $pollClosedDetails)
  {
    $this->pollClosedDetails = $pollClosedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatPollClosedDetails
   */
  public function getPollClosedDetails()
  {
    return $this->pollClosedDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatPollEditedDetails
   */
  public function setPollEditedDetails(Google_Service_YouTube_LiveChatPollEditedDetails $pollEditedDetails)
  {
    $this->pollEditedDetails = $pollEditedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatPollEditedDetails
   */
  public function getPollEditedDetails()
  {
    return $this->pollEditedDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatPollOpenedDetails
   */
  public function setPollOpenedDetails(Google_Service_YouTube_LiveChatPollOpenedDetails $pollOpenedDetails)
  {
    $this->pollOpenedDetails = $pollOpenedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatPollOpenedDetails
   */
  public function getPollOpenedDetails()
  {
    return $this->pollOpenedDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatPollVotedDetails
   */
  public function setPollVotedDetails(Google_Service_YouTube_LiveChatPollVotedDetails $pollVotedDetails)
  {
    $this->pollVotedDetails = $pollVotedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatPollVotedDetails
   */
  public function getPollVotedDetails()
  {
    return $this->pollVotedDetails;
  }
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }
  /**
   * @param Google_Service_YouTube_LiveChatSuperChatDetails
   */
  public function setSuperChatDetails(Google_Service_YouTube_LiveChatSuperChatDetails $superChatDetails)
  {
    $this->superChatDetails = $superChatDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatSuperChatDetails
   */
  public function getSuperChatDetails()
  {
    return $this->superChatDetails;
  }
  /**
   * @param Google_Service_YouTube_LiveChatTextMessageDetails
   */
  public function setTextMessageDetails(Google_Service_YouTube_LiveChatTextMessageDetails $textMessageDetails)
  {
    $this->textMessageDetails = $textMessageDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatTextMessageDetails
   */
  public function getTextMessageDetails()
  {
    return $this->textMessageDetails;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_YouTube_LiveChatUserBannedMessageDetails
   */
  public function setUserBannedDetails(Google_Service_YouTube_LiveChatUserBannedMessageDetails $userBannedDetails)
  {
    $this->userBannedDetails = $userBannedDetails;
  }
  /**
   * @return Google_Service_YouTube_LiveChatUserBannedMessageDetails
   */
  public function getUserBannedDetails()
  {
    return $this->userBannedDetails;
  }
}
