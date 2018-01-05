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

class Google_Service_Prediction_Insert2 extends Google_Model
{
  public $created;
  public $id;
  public $kind;
  protected $modelInfoType = 'Google_Service_Prediction_Insert2ModelInfo';
  protected $modelInfoDataType = '';
  public $modelType;
  public $selfLink;
  public $storageDataLocation;
  public $storagePMMLLocation;
  public $storagePMMLModelLocation;
  public $trainingComplete;
  public $trainingStatus;

  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
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
   * @param Google_Service_Prediction_Insert2ModelInfo
   */
  public function setModelInfo(Google_Service_Prediction_Insert2ModelInfo $modelInfo)
  {
    $this->modelInfo = $modelInfo;
  }
  /**
   * @return Google_Service_Prediction_Insert2ModelInfo
   */
  public function getModelInfo()
  {
    return $this->modelInfo;
  }
  public function setModelType($modelType)
  {
    $this->modelType = $modelType;
  }
  public function getModelType()
  {
    return $this->modelType;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStorageDataLocation($storageDataLocation)
  {
    $this->storageDataLocation = $storageDataLocation;
  }
  public function getStorageDataLocation()
  {
    return $this->storageDataLocation;
  }
  public function setStoragePMMLLocation($storagePMMLLocation)
  {
    $this->storagePMMLLocation = $storagePMMLLocation;
  }
  public function getStoragePMMLLocation()
  {
    return $this->storagePMMLLocation;
  }
  public function setStoragePMMLModelLocation($storagePMMLModelLocation)
  {
    $this->storagePMMLModelLocation = $storagePMMLModelLocation;
  }
  public function getStoragePMMLModelLocation()
  {
    return $this->storagePMMLModelLocation;
  }
  public function setTrainingComplete($trainingComplete)
  {
    $this->trainingComplete = $trainingComplete;
  }
  public function getTrainingComplete()
  {
    return $this->trainingComplete;
  }
  public function setTrainingStatus($trainingStatus)
  {
    $this->trainingStatus = $trainingStatus;
  }
  public function getTrainingStatus()
  {
    return $this->trainingStatus;
  }
}
