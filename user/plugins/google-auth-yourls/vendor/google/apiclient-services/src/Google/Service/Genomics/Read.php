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

class Google_Service_Genomics_Read extends Google_Collection
{
  protected $collection_key = 'alignedQuality';
  public $alignedQuality;
  public $alignedSequence;
  protected $alignmentType = 'Google_Service_Genomics_LinearAlignment';
  protected $alignmentDataType = '';
  public $duplicateFragment;
  public $failedVendorQualityChecks;
  public $fragmentLength;
  public $fragmentName;
  public $id;
  public $info;
  protected $nextMatePositionType = 'Google_Service_Genomics_Position';
  protected $nextMatePositionDataType = '';
  public $numberReads;
  public $properPlacement;
  public $readGroupId;
  public $readGroupSetId;
  public $readNumber;
  public $secondaryAlignment;
  public $supplementaryAlignment;

  public function setAlignedQuality($alignedQuality)
  {
    $this->alignedQuality = $alignedQuality;
  }
  public function getAlignedQuality()
  {
    return $this->alignedQuality;
  }
  public function setAlignedSequence($alignedSequence)
  {
    $this->alignedSequence = $alignedSequence;
  }
  public function getAlignedSequence()
  {
    return $this->alignedSequence;
  }
  /**
   * @param Google_Service_Genomics_LinearAlignment
   */
  public function setAlignment(Google_Service_Genomics_LinearAlignment $alignment)
  {
    $this->alignment = $alignment;
  }
  /**
   * @return Google_Service_Genomics_LinearAlignment
   */
  public function getAlignment()
  {
    return $this->alignment;
  }
  public function setDuplicateFragment($duplicateFragment)
  {
    $this->duplicateFragment = $duplicateFragment;
  }
  public function getDuplicateFragment()
  {
    return $this->duplicateFragment;
  }
  public function setFailedVendorQualityChecks($failedVendorQualityChecks)
  {
    $this->failedVendorQualityChecks = $failedVendorQualityChecks;
  }
  public function getFailedVendorQualityChecks()
  {
    return $this->failedVendorQualityChecks;
  }
  public function setFragmentLength($fragmentLength)
  {
    $this->fragmentLength = $fragmentLength;
  }
  public function getFragmentLength()
  {
    return $this->fragmentLength;
  }
  public function setFragmentName($fragmentName)
  {
    $this->fragmentName = $fragmentName;
  }
  public function getFragmentName()
  {
    return $this->fragmentName;
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
  /**
   * @param Google_Service_Genomics_Position
   */
  public function setNextMatePosition(Google_Service_Genomics_Position $nextMatePosition)
  {
    $this->nextMatePosition = $nextMatePosition;
  }
  /**
   * @return Google_Service_Genomics_Position
   */
  public function getNextMatePosition()
  {
    return $this->nextMatePosition;
  }
  public function setNumberReads($numberReads)
  {
    $this->numberReads = $numberReads;
  }
  public function getNumberReads()
  {
    return $this->numberReads;
  }
  public function setProperPlacement($properPlacement)
  {
    $this->properPlacement = $properPlacement;
  }
  public function getProperPlacement()
  {
    return $this->properPlacement;
  }
  public function setReadGroupId($readGroupId)
  {
    $this->readGroupId = $readGroupId;
  }
  public function getReadGroupId()
  {
    return $this->readGroupId;
  }
  public function setReadGroupSetId($readGroupSetId)
  {
    $this->readGroupSetId = $readGroupSetId;
  }
  public function getReadGroupSetId()
  {
    return $this->readGroupSetId;
  }
  public function setReadNumber($readNumber)
  {
    $this->readNumber = $readNumber;
  }
  public function getReadNumber()
  {
    return $this->readNumber;
  }
  public function setSecondaryAlignment($secondaryAlignment)
  {
    $this->secondaryAlignment = $secondaryAlignment;
  }
  public function getSecondaryAlignment()
  {
    return $this->secondaryAlignment;
  }
  public function setSupplementaryAlignment($supplementaryAlignment)
  {
    $this->supplementaryAlignment = $supplementaryAlignment;
  }
  public function getSupplementaryAlignment()
  {
    return $this->supplementaryAlignment;
  }
}
