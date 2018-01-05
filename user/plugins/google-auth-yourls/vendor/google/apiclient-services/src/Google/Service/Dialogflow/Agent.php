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

class Google_Service_Dialogflow_Agent extends Google_Collection
{
  protected $collection_key = 'supportedLanguageCodes';
  public $avatarUri;
  public $classificationThreshold;
  public $defaultLanguageCode;
  public $description;
  public $displayName;
  public $enableLogging;
  public $matchMode;
  public $parent;
  public $supportedLanguageCodes;
  public $timeZone;

  public function setAvatarUri($avatarUri)
  {
    $this->avatarUri = $avatarUri;
  }
  public function getAvatarUri()
  {
    return $this->avatarUri;
  }
  public function setClassificationThreshold($classificationThreshold)
  {
    $this->classificationThreshold = $classificationThreshold;
  }
  public function getClassificationThreshold()
  {
    return $this->classificationThreshold;
  }
  public function setDefaultLanguageCode($defaultLanguageCode)
  {
    $this->defaultLanguageCode = $defaultLanguageCode;
  }
  public function getDefaultLanguageCode()
  {
    return $this->defaultLanguageCode;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnableLogging($enableLogging)
  {
    $this->enableLogging = $enableLogging;
  }
  public function getEnableLogging()
  {
    return $this->enableLogging;
  }
  public function setMatchMode($matchMode)
  {
    $this->matchMode = $matchMode;
  }
  public function getMatchMode()
  {
    return $this->matchMode;
  }
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  public function getParent()
  {
    return $this->parent;
  }
  public function setSupportedLanguageCodes($supportedLanguageCodes)
  {
    $this->supportedLanguageCodes = $supportedLanguageCodes;
  }
  public function getSupportedLanguageCodes()
  {
    return $this->supportedLanguageCodes;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
