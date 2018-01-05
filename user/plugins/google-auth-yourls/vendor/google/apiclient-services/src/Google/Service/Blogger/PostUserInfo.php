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

class Google_Service_Blogger_PostUserInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "postUserInfo" => "post_user_info",
  );
  public $kind;
  protected $postType = 'Google_Service_Blogger_Post';
  protected $postDataType = '';
  protected $postUserInfoType = 'Google_Service_Blogger_PostPerUserInfo';
  protected $postUserInfoDataType = '';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Blogger_Post
   */
  public function setPost(Google_Service_Blogger_Post $post)
  {
    $this->post = $post;
  }
  /**
   * @return Google_Service_Blogger_Post
   */
  public function getPost()
  {
    return $this->post;
  }
  /**
   * @param Google_Service_Blogger_PostPerUserInfo
   */
  public function setPostUserInfo(Google_Service_Blogger_PostPerUserInfo $postUserInfo)
  {
    $this->postUserInfo = $postUserInfo;
  }
  /**
   * @return Google_Service_Blogger_PostPerUserInfo
   */
  public function getPostUserInfo()
  {
    return $this->postUserInfo;
  }
}
