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

class Google_Service_Plus_ActivityObject extends Google_Collection
{
  protected $collection_key = 'attachments';
  protected $actorType = 'Google_Service_Plus_ActivityObjectActor';
  protected $actorDataType = '';
  protected $attachmentsType = 'Google_Service_Plus_ActivityObjectAttachments';
  protected $attachmentsDataType = 'array';
  public $content;
  public $id;
  public $objectType;
  public $originalContent;
  protected $plusonersType = 'Google_Service_Plus_ActivityObjectPlusoners';
  protected $plusonersDataType = '';
  protected $repliesType = 'Google_Service_Plus_ActivityObjectReplies';
  protected $repliesDataType = '';
  protected $resharersType = 'Google_Service_Plus_ActivityObjectResharers';
  protected $resharersDataType = '';
  public $url;

  /**
   * @param Google_Service_Plus_ActivityObjectActor
   */
  public function setActor(Google_Service_Plus_ActivityObjectActor $actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectActor
   */
  public function getActor()
  {
    return $this->actor;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectAttachments
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectAttachments
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  public function getObjectType()
  {
    return $this->objectType;
  }
  public function setOriginalContent($originalContent)
  {
    $this->originalContent = $originalContent;
  }
  public function getOriginalContent()
  {
    return $this->originalContent;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectPlusoners
   */
  public function setPlusoners(Google_Service_Plus_ActivityObjectPlusoners $plusoners)
  {
    $this->plusoners = $plusoners;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectPlusoners
   */
  public function getPlusoners()
  {
    return $this->plusoners;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectReplies
   */
  public function setReplies(Google_Service_Plus_ActivityObjectReplies $replies)
  {
    $this->replies = $replies;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectReplies
   */
  public function getReplies()
  {
    return $this->replies;
  }
  /**
   * @param Google_Service_Plus_ActivityObjectResharers
   */
  public function setResharers(Google_Service_Plus_ActivityObjectResharers $resharers)
  {
    $this->resharers = $resharers;
  }
  /**
   * @return Google_Service_Plus_ActivityObjectResharers
   */
  public function getResharers()
  {
    return $this->resharers;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
