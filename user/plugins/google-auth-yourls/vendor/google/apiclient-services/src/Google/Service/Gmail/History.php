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

class Google_Service_Gmail_History extends Google_Collection
{
  protected $collection_key = 'messagesDeleted';
  public $id;
  protected $labelsAddedType = 'Google_Service_Gmail_HistoryLabelAdded';
  protected $labelsAddedDataType = 'array';
  protected $labelsRemovedType = 'Google_Service_Gmail_HistoryLabelRemoved';
  protected $labelsRemovedDataType = 'array';
  protected $messagesType = 'Google_Service_Gmail_Message';
  protected $messagesDataType = 'array';
  protected $messagesAddedType = 'Google_Service_Gmail_HistoryMessageAdded';
  protected $messagesAddedDataType = 'array';
  protected $messagesDeletedType = 'Google_Service_Gmail_HistoryMessageDeleted';
  protected $messagesDeletedDataType = 'array';

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Gmail_HistoryLabelAdded
   */
  public function setLabelsAdded($labelsAdded)
  {
    $this->labelsAdded = $labelsAdded;
  }
  /**
   * @return Google_Service_Gmail_HistoryLabelAdded
   */
  public function getLabelsAdded()
  {
    return $this->labelsAdded;
  }
  /**
   * @param Google_Service_Gmail_HistoryLabelRemoved
   */
  public function setLabelsRemoved($labelsRemoved)
  {
    $this->labelsRemoved = $labelsRemoved;
  }
  /**
   * @return Google_Service_Gmail_HistoryLabelRemoved
   */
  public function getLabelsRemoved()
  {
    return $this->labelsRemoved;
  }
  /**
   * @param Google_Service_Gmail_Message
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return Google_Service_Gmail_Message
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param Google_Service_Gmail_HistoryMessageAdded
   */
  public function setMessagesAdded($messagesAdded)
  {
    $this->messagesAdded = $messagesAdded;
  }
  /**
   * @return Google_Service_Gmail_HistoryMessageAdded
   */
  public function getMessagesAdded()
  {
    return $this->messagesAdded;
  }
  /**
   * @param Google_Service_Gmail_HistoryMessageDeleted
   */
  public function setMessagesDeleted($messagesDeleted)
  {
    $this->messagesDeleted = $messagesDeleted;
  }
  /**
   * @return Google_Service_Gmail_HistoryMessageDeleted
   */
  public function getMessagesDeleted()
  {
    return $this->messagesDeleted;
  }
}
