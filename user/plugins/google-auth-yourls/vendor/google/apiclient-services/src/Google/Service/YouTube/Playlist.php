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

class Google_Service_YouTube_Playlist extends Google_Model
{
  protected $contentDetailsType = 'Google_Service_YouTube_PlaylistContentDetails';
  protected $contentDetailsDataType = '';
  public $etag;
  public $id;
  public $kind;
  protected $localizationsType = 'Google_Service_YouTube_PlaylistLocalization';
  protected $localizationsDataType = 'map';
  protected $playerType = 'Google_Service_YouTube_PlaylistPlayer';
  protected $playerDataType = '';
  protected $snippetType = 'Google_Service_YouTube_PlaylistSnippet';
  protected $snippetDataType = '';
  protected $statusType = 'Google_Service_YouTube_PlaylistStatus';
  protected $statusDataType = '';

  /**
   * @param Google_Service_YouTube_PlaylistContentDetails
   */
  public function setContentDetails(Google_Service_YouTube_PlaylistContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return Google_Service_YouTube_PlaylistContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_YouTube_PlaylistLocalization
   */
  public function setLocalizations($localizations)
  {
    $this->localizations = $localizations;
  }
  /**
   * @return Google_Service_YouTube_PlaylistLocalization
   */
  public function getLocalizations()
  {
    return $this->localizations;
  }
  /**
   * @param Google_Service_YouTube_PlaylistPlayer
   */
  public function setPlayer(Google_Service_YouTube_PlaylistPlayer $player)
  {
    $this->player = $player;
  }
  /**
   * @return Google_Service_YouTube_PlaylistPlayer
   */
  public function getPlayer()
  {
    return $this->player;
  }
  /**
   * @param Google_Service_YouTube_PlaylistSnippet
   */
  public function setSnippet(Google_Service_YouTube_PlaylistSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return Google_Service_YouTube_PlaylistSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param Google_Service_YouTube_PlaylistStatus
   */
  public function setStatus(Google_Service_YouTube_PlaylistStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_YouTube_PlaylistStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}
