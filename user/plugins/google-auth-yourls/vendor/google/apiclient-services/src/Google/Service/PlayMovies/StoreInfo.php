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

class Google_Service_PlayMovies_StoreInfo extends Google_Collection
{
  protected $collection_key = 'subtitles';
  public $audioTracks;
  public $country;
  public $editLevelEidr;
  public $episodeNumber;
  public $hasAudio51;
  public $hasEstOffer;
  public $hasHdOffer;
  public $hasInfoCards;
  public $hasSdOffer;
  public $hasVodOffer;
  public $liveTime;
  public $mid;
  public $name;
  public $pphNames;
  public $seasonId;
  public $seasonName;
  public $seasonNumber;
  public $showId;
  public $showName;
  public $studioName;
  public $subtitles;
  public $titleLevelEidr;
  public $trailerId;
  public $type;
  public $videoId;

  public function setAudioTracks($audioTracks)
  {
    $this->audioTracks = $audioTracks;
  }
  public function getAudioTracks()
  {
    return $this->audioTracks;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setEditLevelEidr($editLevelEidr)
  {
    $this->editLevelEidr = $editLevelEidr;
  }
  public function getEditLevelEidr()
  {
    return $this->editLevelEidr;
  }
  public function setEpisodeNumber($episodeNumber)
  {
    $this->episodeNumber = $episodeNumber;
  }
  public function getEpisodeNumber()
  {
    return $this->episodeNumber;
  }
  public function setHasAudio51($hasAudio51)
  {
    $this->hasAudio51 = $hasAudio51;
  }
  public function getHasAudio51()
  {
    return $this->hasAudio51;
  }
  public function setHasEstOffer($hasEstOffer)
  {
    $this->hasEstOffer = $hasEstOffer;
  }
  public function getHasEstOffer()
  {
    return $this->hasEstOffer;
  }
  public function setHasHdOffer($hasHdOffer)
  {
    $this->hasHdOffer = $hasHdOffer;
  }
  public function getHasHdOffer()
  {
    return $this->hasHdOffer;
  }
  public function setHasInfoCards($hasInfoCards)
  {
    $this->hasInfoCards = $hasInfoCards;
  }
  public function getHasInfoCards()
  {
    return $this->hasInfoCards;
  }
  public function setHasSdOffer($hasSdOffer)
  {
    $this->hasSdOffer = $hasSdOffer;
  }
  public function getHasSdOffer()
  {
    return $this->hasSdOffer;
  }
  public function setHasVodOffer($hasVodOffer)
  {
    $this->hasVodOffer = $hasVodOffer;
  }
  public function getHasVodOffer()
  {
    return $this->hasVodOffer;
  }
  public function setLiveTime($liveTime)
  {
    $this->liveTime = $liveTime;
  }
  public function getLiveTime()
  {
    return $this->liveTime;
  }
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  public function getMid()
  {
    return $this->mid;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPphNames($pphNames)
  {
    $this->pphNames = $pphNames;
  }
  public function getPphNames()
  {
    return $this->pphNames;
  }
  public function setSeasonId($seasonId)
  {
    $this->seasonId = $seasonId;
  }
  public function getSeasonId()
  {
    return $this->seasonId;
  }
  public function setSeasonName($seasonName)
  {
    $this->seasonName = $seasonName;
  }
  public function getSeasonName()
  {
    return $this->seasonName;
  }
  public function setSeasonNumber($seasonNumber)
  {
    $this->seasonNumber = $seasonNumber;
  }
  public function getSeasonNumber()
  {
    return $this->seasonNumber;
  }
  public function setShowId($showId)
  {
    $this->showId = $showId;
  }
  public function getShowId()
  {
    return $this->showId;
  }
  public function setShowName($showName)
  {
    $this->showName = $showName;
  }
  public function getShowName()
  {
    return $this->showName;
  }
  public function setStudioName($studioName)
  {
    $this->studioName = $studioName;
  }
  public function getStudioName()
  {
    return $this->studioName;
  }
  public function setSubtitles($subtitles)
  {
    $this->subtitles = $subtitles;
  }
  public function getSubtitles()
  {
    return $this->subtitles;
  }
  public function setTitleLevelEidr($titleLevelEidr)
  {
    $this->titleLevelEidr = $titleLevelEidr;
  }
  public function getTitleLevelEidr()
  {
    return $this->titleLevelEidr;
  }
  public function setTrailerId($trailerId)
  {
    $this->trailerId = $trailerId;
  }
  public function getTrailerId()
  {
    return $this->trailerId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  public function getVideoId()
  {
    return $this->videoId;
  }
}
