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

class Google_Service_Blogger_PostPerUserInfo extends Google_Model
{
  public $blogId;
  public $hasEditAccess;
  public $kind;
  public $postId;
  public $userId;

  public function setBlogId($blogId)
  {
    $this->blogId = $blogId;
  }
  public function getBlogId()
  {
    return $this->blogId;
  }
  public function setHasEditAccess($hasEditAccess)
  {
    $this->hasEditAccess = $hasEditAccess;
  }
  public function getHasEditAccess()
  {
    return $this->hasEditAccess;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPostId($postId)
  {
    $this->postId = $postId;
  }
  public function getPostId()
  {
    return $this->postId;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
