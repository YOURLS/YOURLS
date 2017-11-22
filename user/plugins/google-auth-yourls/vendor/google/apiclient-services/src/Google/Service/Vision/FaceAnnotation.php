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

class Google_Service_Vision_FaceAnnotation extends Google_Collection
{
  protected $collection_key = 'landmarks';
  public $angerLikelihood;
  public $blurredLikelihood;
  protected $boundingPolyType = 'Google_Service_Vision_BoundingPoly';
  protected $boundingPolyDataType = '';
  public $detectionConfidence;
  protected $fdBoundingPolyType = 'Google_Service_Vision_BoundingPoly';
  protected $fdBoundingPolyDataType = '';
  public $headwearLikelihood;
  public $joyLikelihood;
  public $landmarkingConfidence;
  protected $landmarksType = 'Google_Service_Vision_Landmark';
  protected $landmarksDataType = 'array';
  public $panAngle;
  public $rollAngle;
  public $sorrowLikelihood;
  public $surpriseLikelihood;
  public $tiltAngle;
  public $underExposedLikelihood;

  public function setAngerLikelihood($angerLikelihood)
  {
    $this->angerLikelihood = $angerLikelihood;
  }
  public function getAngerLikelihood()
  {
    return $this->angerLikelihood;
  }
  public function setBlurredLikelihood($blurredLikelihood)
  {
    $this->blurredLikelihood = $blurredLikelihood;
  }
  public function getBlurredLikelihood()
  {
    return $this->blurredLikelihood;
  }
  /**
   * @param Google_Service_Vision_BoundingPoly
   */
  public function setBoundingPoly(Google_Service_Vision_BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return Google_Service_Vision_BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setDetectionConfidence($detectionConfidence)
  {
    $this->detectionConfidence = $detectionConfidence;
  }
  public function getDetectionConfidence()
  {
    return $this->detectionConfidence;
  }
  /**
   * @param Google_Service_Vision_BoundingPoly
   */
  public function setFdBoundingPoly(Google_Service_Vision_BoundingPoly $fdBoundingPoly)
  {
    $this->fdBoundingPoly = $fdBoundingPoly;
  }
  /**
   * @return Google_Service_Vision_BoundingPoly
   */
  public function getFdBoundingPoly()
  {
    return $this->fdBoundingPoly;
  }
  public function setHeadwearLikelihood($headwearLikelihood)
  {
    $this->headwearLikelihood = $headwearLikelihood;
  }
  public function getHeadwearLikelihood()
  {
    return $this->headwearLikelihood;
  }
  public function setJoyLikelihood($joyLikelihood)
  {
    $this->joyLikelihood = $joyLikelihood;
  }
  public function getJoyLikelihood()
  {
    return $this->joyLikelihood;
  }
  public function setLandmarkingConfidence($landmarkingConfidence)
  {
    $this->landmarkingConfidence = $landmarkingConfidence;
  }
  public function getLandmarkingConfidence()
  {
    return $this->landmarkingConfidence;
  }
  /**
   * @param Google_Service_Vision_Landmark
   */
  public function setLandmarks($landmarks)
  {
    $this->landmarks = $landmarks;
  }
  /**
   * @return Google_Service_Vision_Landmark
   */
  public function getLandmarks()
  {
    return $this->landmarks;
  }
  public function setPanAngle($panAngle)
  {
    $this->panAngle = $panAngle;
  }
  public function getPanAngle()
  {
    return $this->panAngle;
  }
  public function setRollAngle($rollAngle)
  {
    $this->rollAngle = $rollAngle;
  }
  public function getRollAngle()
  {
    return $this->rollAngle;
  }
  public function setSorrowLikelihood($sorrowLikelihood)
  {
    $this->sorrowLikelihood = $sorrowLikelihood;
  }
  public function getSorrowLikelihood()
  {
    return $this->sorrowLikelihood;
  }
  public function setSurpriseLikelihood($surpriseLikelihood)
  {
    $this->surpriseLikelihood = $surpriseLikelihood;
  }
  public function getSurpriseLikelihood()
  {
    return $this->surpriseLikelihood;
  }
  public function setTiltAngle($tiltAngle)
  {
    $this->tiltAngle = $tiltAngle;
  }
  public function getTiltAngle()
  {
    return $this->tiltAngle;
  }
  public function setUnderExposedLikelihood($underExposedLikelihood)
  {
    $this->underExposedLikelihood = $underExposedLikelihood;
  }
  public function getUnderExposedLikelihood()
  {
    return $this->underExposedLikelihood;
  }
}
