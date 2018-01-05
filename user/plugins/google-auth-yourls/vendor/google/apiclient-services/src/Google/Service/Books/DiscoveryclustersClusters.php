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

class Google_Service_Books_DiscoveryclustersClusters extends Google_Collection
{
  protected $collection_key = 'volumes';
  protected $internal_gapi_mappings = array(
        "bannerWithContentContainer" => "banner_with_content_container",
  );
  protected $bannerWithContentContainerType = 'Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer';
  protected $bannerWithContentContainerDataType = '';
  public $subTitle;
  public $title;
  public $totalVolumes;
  public $uid;
  protected $volumesType = 'Google_Service_Books_Volume';
  protected $volumesDataType = 'array';

  /**
   * @param Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer
   */
  public function setBannerWithContentContainer(Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer $bannerWithContentContainer)
  {
    $this->bannerWithContentContainer = $bannerWithContentContainer;
  }
  /**
   * @return Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer
   */
  public function getBannerWithContentContainer()
  {
    return $this->bannerWithContentContainer;
  }
  public function setSubTitle($subTitle)
  {
    $this->subTitle = $subTitle;
  }
  public function getSubTitle()
  {
    return $this->subTitle;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTotalVolumes($totalVolumes)
  {
    $this->totalVolumes = $totalVolumes;
  }
  public function getTotalVolumes()
  {
    return $this->totalVolumes;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
  /**
   * @param Google_Service_Books_Volume
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return Google_Service_Books_Volume
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
}
