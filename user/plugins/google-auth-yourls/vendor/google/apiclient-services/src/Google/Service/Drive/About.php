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

class Google_Service_Drive_About extends Google_Collection
{
  protected $collection_key = 'teamDriveThemes';
  public $appInstalled;
  public $exportFormats;
  public $folderColorPalette;
  public $importFormats;
  public $kind;
  public $maxImportSizes;
  public $maxUploadSize;
  protected $storageQuotaType = 'Google_Service_Drive_AboutStorageQuota';
  protected $storageQuotaDataType = '';
  protected $teamDriveThemesType = 'Google_Service_Drive_AboutTeamDriveThemes';
  protected $teamDriveThemesDataType = 'array';
  protected $userType = 'Google_Service_Drive_User';
  protected $userDataType = '';

  public function setAppInstalled($appInstalled)
  {
    $this->appInstalled = $appInstalled;
  }
  public function getAppInstalled()
  {
    return $this->appInstalled;
  }
  public function setExportFormats($exportFormats)
  {
    $this->exportFormats = $exportFormats;
  }
  public function getExportFormats()
  {
    return $this->exportFormats;
  }
  public function setFolderColorPalette($folderColorPalette)
  {
    $this->folderColorPalette = $folderColorPalette;
  }
  public function getFolderColorPalette()
  {
    return $this->folderColorPalette;
  }
  public function setImportFormats($importFormats)
  {
    $this->importFormats = $importFormats;
  }
  public function getImportFormats()
  {
    return $this->importFormats;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxImportSizes($maxImportSizes)
  {
    $this->maxImportSizes = $maxImportSizes;
  }
  public function getMaxImportSizes()
  {
    return $this->maxImportSizes;
  }
  public function setMaxUploadSize($maxUploadSize)
  {
    $this->maxUploadSize = $maxUploadSize;
  }
  public function getMaxUploadSize()
  {
    return $this->maxUploadSize;
  }
  /**
   * @param Google_Service_Drive_AboutStorageQuota
   */
  public function setStorageQuota(Google_Service_Drive_AboutStorageQuota $storageQuota)
  {
    $this->storageQuota = $storageQuota;
  }
  /**
   * @return Google_Service_Drive_AboutStorageQuota
   */
  public function getStorageQuota()
  {
    return $this->storageQuota;
  }
  /**
   * @param Google_Service_Drive_AboutTeamDriveThemes
   */
  public function setTeamDriveThemes($teamDriveThemes)
  {
    $this->teamDriveThemes = $teamDriveThemes;
  }
  /**
   * @return Google_Service_Drive_AboutTeamDriveThemes
   */
  public function getTeamDriveThemes()
  {
    return $this->teamDriveThemes;
  }
  /**
   * @param Google_Service_Drive_User
   */
  public function setUser(Google_Service_Drive_User $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_Drive_User
   */
  public function getUser()
  {
    return $this->user;
  }
}
