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

class Google_Service_Vision_AnnotateImageResponse extends Google_Collection
{
  protected $collection_key = 'textAnnotations';
  protected $cropHintsAnnotationType = 'Google_Service_Vision_CropHintsAnnotation';
  protected $cropHintsAnnotationDataType = '';
  protected $errorType = 'Google_Service_Vision_Status';
  protected $errorDataType = '';
  protected $faceAnnotationsType = 'Google_Service_Vision_FaceAnnotation';
  protected $faceAnnotationsDataType = 'array';
  protected $fullTextAnnotationType = 'Google_Service_Vision_TextAnnotation';
  protected $fullTextAnnotationDataType = '';
  protected $imagePropertiesAnnotationType = 'Google_Service_Vision_ImageProperties';
  protected $imagePropertiesAnnotationDataType = '';
  protected $labelAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $labelAnnotationsDataType = 'array';
  protected $landmarkAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $landmarkAnnotationsDataType = 'array';
  protected $logoAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $logoAnnotationsDataType = 'array';
  protected $safeSearchAnnotationType = 'Google_Service_Vision_SafeSearchAnnotation';
  protected $safeSearchAnnotationDataType = '';
  protected $textAnnotationsType = 'Google_Service_Vision_EntityAnnotation';
  protected $textAnnotationsDataType = 'array';
  protected $webDetectionType = 'Google_Service_Vision_WebDetection';
  protected $webDetectionDataType = '';

  /**
   * @param Google_Service_Vision_CropHintsAnnotation
   */
  public function setCropHintsAnnotation(Google_Service_Vision_CropHintsAnnotation $cropHintsAnnotation)
  {
    $this->cropHintsAnnotation = $cropHintsAnnotation;
  }
  /**
   * @return Google_Service_Vision_CropHintsAnnotation
   */
  public function getCropHintsAnnotation()
  {
    return $this->cropHintsAnnotation;
  }
  /**
   * @param Google_Service_Vision_Status
   */
  public function setError(Google_Service_Vision_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Vision_Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_Vision_FaceAnnotation
   */
  public function setFaceAnnotations($faceAnnotations)
  {
    $this->faceAnnotations = $faceAnnotations;
  }
  /**
   * @return Google_Service_Vision_FaceAnnotation
   */
  public function getFaceAnnotations()
  {
    return $this->faceAnnotations;
  }
  /**
   * @param Google_Service_Vision_TextAnnotation
   */
  public function setFullTextAnnotation(Google_Service_Vision_TextAnnotation $fullTextAnnotation)
  {
    $this->fullTextAnnotation = $fullTextAnnotation;
  }
  /**
   * @return Google_Service_Vision_TextAnnotation
   */
  public function getFullTextAnnotation()
  {
    return $this->fullTextAnnotation;
  }
  /**
   * @param Google_Service_Vision_ImageProperties
   */
  public function setImagePropertiesAnnotation(Google_Service_Vision_ImageProperties $imagePropertiesAnnotation)
  {
    $this->imagePropertiesAnnotation = $imagePropertiesAnnotation;
  }
  /**
   * @return Google_Service_Vision_ImageProperties
   */
  public function getImagePropertiesAnnotation()
  {
    return $this->imagePropertiesAnnotation;
  }
  /**
   * @param Google_Service_Vision_EntityAnnotation
   */
  public function setLabelAnnotations($labelAnnotations)
  {
    $this->labelAnnotations = $labelAnnotations;
  }
  /**
   * @return Google_Service_Vision_EntityAnnotation
   */
  public function getLabelAnnotations()
  {
    return $this->labelAnnotations;
  }
  /**
   * @param Google_Service_Vision_EntityAnnotation
   */
  public function setLandmarkAnnotations($landmarkAnnotations)
  {
    $this->landmarkAnnotations = $landmarkAnnotations;
  }
  /**
   * @return Google_Service_Vision_EntityAnnotation
   */
  public function getLandmarkAnnotations()
  {
    return $this->landmarkAnnotations;
  }
  /**
   * @param Google_Service_Vision_EntityAnnotation
   */
  public function setLogoAnnotations($logoAnnotations)
  {
    $this->logoAnnotations = $logoAnnotations;
  }
  /**
   * @return Google_Service_Vision_EntityAnnotation
   */
  public function getLogoAnnotations()
  {
    return $this->logoAnnotations;
  }
  /**
   * @param Google_Service_Vision_SafeSearchAnnotation
   */
  public function setSafeSearchAnnotation(Google_Service_Vision_SafeSearchAnnotation $safeSearchAnnotation)
  {
    $this->safeSearchAnnotation = $safeSearchAnnotation;
  }
  /**
   * @return Google_Service_Vision_SafeSearchAnnotation
   */
  public function getSafeSearchAnnotation()
  {
    return $this->safeSearchAnnotation;
  }
  /**
   * @param Google_Service_Vision_EntityAnnotation
   */
  public function setTextAnnotations($textAnnotations)
  {
    $this->textAnnotations = $textAnnotations;
  }
  /**
   * @return Google_Service_Vision_EntityAnnotation
   */
  public function getTextAnnotations()
  {
    return $this->textAnnotations;
  }
  /**
   * @param Google_Service_Vision_WebDetection
   */
  public function setWebDetection(Google_Service_Vision_WebDetection $webDetection)
  {
    $this->webDetection = $webDetection;
  }
  /**
   * @return Google_Service_Vision_WebDetection
   */
  public function getWebDetection()
  {
    return $this->webDetection;
  }
}
