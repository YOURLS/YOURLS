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

class Google_Service_Genomics_Annotation extends Google_Model
{
  public $annotationSetId;
  public $end;
  public $id;
  public $info;
  public $name;
  public $referenceId;
  public $referenceName;
  public $reverseStrand;
  public $start;
  protected $transcriptType = 'Google_Service_Genomics_Transcript';
  protected $transcriptDataType = '';
  public $type;
  protected $variantType = 'Google_Service_Genomics_VariantAnnotation';
  protected $variantDataType = '';

  public function setAnnotationSetId($annotationSetId)
  {
    $this->annotationSetId = $annotationSetId;
  }
  public function getAnnotationSetId()
  {
    return $this->annotationSetId;
  }
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInfo($info)
  {
    $this->info = $info;
  }
  public function getInfo()
  {
    return $this->info;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReferenceId($referenceId)
  {
    $this->referenceId = $referenceId;
  }
  public function getReferenceId()
  {
    return $this->referenceId;
  }
  public function setReferenceName($referenceName)
  {
    $this->referenceName = $referenceName;
  }
  public function getReferenceName()
  {
    return $this->referenceName;
  }
  public function setReverseStrand($reverseStrand)
  {
    $this->reverseStrand = $reverseStrand;
  }
  public function getReverseStrand()
  {
    return $this->reverseStrand;
  }
  public function setStart($start)
  {
    $this->start = $start;
  }
  public function getStart()
  {
    return $this->start;
  }
  /**
   * @param Google_Service_Genomics_Transcript
   */
  public function setTranscript(Google_Service_Genomics_Transcript $transcript)
  {
    $this->transcript = $transcript;
  }
  /**
   * @return Google_Service_Genomics_Transcript
   */
  public function getTranscript()
  {
    return $this->transcript;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_Genomics_VariantAnnotation
   */
  public function setVariant(Google_Service_Genomics_VariantAnnotation $variant)
  {
    $this->variant = $variant;
  }
  /**
   * @return Google_Service_Genomics_VariantAnnotation
   */
  public function getVariant()
  {
    return $this->variant;
  }
}
