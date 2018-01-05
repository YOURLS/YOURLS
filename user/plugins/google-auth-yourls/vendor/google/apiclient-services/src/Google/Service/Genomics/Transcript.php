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

class Google_Service_Genomics_Transcript extends Google_Collection
{
  protected $collection_key = 'exons';
  protected $codingSequenceType = 'Google_Service_Genomics_CodingSequence';
  protected $codingSequenceDataType = '';
  protected $exonsType = 'Google_Service_Genomics_Exon';
  protected $exonsDataType = 'array';
  public $geneId;

  /**
   * @param Google_Service_Genomics_CodingSequence
   */
  public function setCodingSequence(Google_Service_Genomics_CodingSequence $codingSequence)
  {
    $this->codingSequence = $codingSequence;
  }
  /**
   * @return Google_Service_Genomics_CodingSequence
   */
  public function getCodingSequence()
  {
    return $this->codingSequence;
  }
  /**
   * @param Google_Service_Genomics_Exon
   */
  public function setExons($exons)
  {
    $this->exons = $exons;
  }
  /**
   * @return Google_Service_Genomics_Exon
   */
  public function getExons()
  {
    return $this->exons;
  }
  public function setGeneId($geneId)
  {
    $this->geneId = $geneId;
  }
  public function getGeneId()
  {
    return $this->geneId;
  }
}
