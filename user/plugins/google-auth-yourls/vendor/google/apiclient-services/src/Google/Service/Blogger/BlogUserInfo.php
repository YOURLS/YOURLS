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

class Google_Service_Blogger_BlogUserInfo extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "blogUserInfo" => "blog_user_info",
  );
  protected $blogType = 'Google_Service_Blogger_Blog';
  protected $blogDataType = '';
  protected $blogUserInfoType = 'Google_Service_Blogger_BlogPerUserInfo';
  protected $blogUserInfoDataType = '';
  public $kind;

  /**
   * @param Google_Service_Blogger_Blog
   */
  public function setBlog(Google_Service_Blogger_Blog $blog)
  {
    $this->blog = $blog;
  }
  /**
   * @return Google_Service_Blogger_Blog
   */
  public function getBlog()
  {
    return $this->blog;
  }
  /**
   * @param Google_Service_Blogger_BlogPerUserInfo
   */
  public function setBlogUserInfo(Google_Service_Blogger_BlogPerUserInfo $blogUserInfo)
  {
    $this->blogUserInfo = $blogUserInfo;
  }
  /**
   * @return Google_Service_Blogger_BlogPerUserInfo
   */
  public function getBlogUserInfo()
  {
    return $this->blogUserInfo;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}
