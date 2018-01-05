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

class Google_Service_Plus_PersonCover extends Google_Model
{
  protected $coverInfoType = 'Google_Service_Plus_PersonCoverCoverInfo';
  protected $coverInfoDataType = '';
  protected $coverPhotoType = 'Google_Service_Plus_PersonCoverCoverPhoto';
  protected $coverPhotoDataType = '';
  public $layout;

  /**
   * @param Google_Service_Plus_PersonCoverCoverInfo
   */
  public function setCoverInfo(Google_Service_Plus_PersonCoverCoverInfo $coverInfo)
  {
    $this->coverInfo = $coverInfo;
  }
  /**
   * @return Google_Service_Plus_PersonCoverCoverInfo
   */
  public function getCoverInfo()
  {
    return $this->coverInfo;
  }
  /**
   * @param Google_Service_Plus_PersonCoverCoverPhoto
   */
  public function setCoverPhoto(Google_Service_Plus_PersonCoverCoverPhoto $coverPhoto)
  {
    $this->coverPhoto = $coverPhoto;
  }
  /**
   * @return Google_Service_Plus_PersonCoverCoverPhoto
   */
  public function getCoverPhoto()
  {
    return $this->coverPhoto;
  }
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  public function getLayout()
  {
    return $this->layout;
  }
}
