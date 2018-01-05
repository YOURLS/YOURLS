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

class Google_Service_AndroidPublisher_Comment extends Google_Model
{
  protected $developerCommentType = 'Google_Service_AndroidPublisher_DeveloperComment';
  protected $developerCommentDataType = '';
  protected $userCommentType = 'Google_Service_AndroidPublisher_UserComment';
  protected $userCommentDataType = '';

  /**
   * @param Google_Service_AndroidPublisher_DeveloperComment
   */
  public function setDeveloperComment(Google_Service_AndroidPublisher_DeveloperComment $developerComment)
  {
    $this->developerComment = $developerComment;
  }
  /**
   * @return Google_Service_AndroidPublisher_DeveloperComment
   */
  public function getDeveloperComment()
  {
    return $this->developerComment;
  }
  /**
   * @param Google_Service_AndroidPublisher_UserComment
   */
  public function setUserComment(Google_Service_AndroidPublisher_UserComment $userComment)
  {
    $this->userComment = $userComment;
  }
  /**
   * @return Google_Service_AndroidPublisher_UserComment
   */
  public function getUserComment()
  {
    return $this->userComment;
  }
}
