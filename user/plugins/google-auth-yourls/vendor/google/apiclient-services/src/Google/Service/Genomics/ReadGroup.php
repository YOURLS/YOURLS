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

class Google_Service_Genomics_ReadGroup extends Google_Collection
{
  protected $collection_key = 'programs';
  public $datasetId;
  public $description;
  protected $experimentType = 'Google_Service_Genomics_Experiment';
  protected $experimentDataType = '';
  public $id;
  public $info;
  public $name;
  public $predictedInsertSize;
  protected $programsType = 'Google_Service_Genomics_Program';
  protected $programsDataType = 'array';
  public $referenceSetId;
  public $sampleId;

  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Genomics_Experiment
   */
  public function setExperiment(Google_Service_Genomics_Experiment $experiment)
  {
    $this->experiment = $experiment;
  }
  /**
   * @return Google_Service_Genomics_Experiment
   */
  public function getExperiment()
  {
    return $this->experiment;
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
  public function setPredictedInsertSize($predictedInsertSize)
  {
    $this->predictedInsertSize = $predictedInsertSize;
  }
  public function getPredictedInsertSize()
  {
    return $this->predictedInsertSize;
  }
  /**
   * @param Google_Service_Genomics_Program
   */
  public function setPrograms($programs)
  {
    $this->programs = $programs;
  }
  /**
   * @return Google_Service_Genomics_Program
   */
  public function getPrograms()
  {
    return $this->programs;
  }
  public function setReferenceSetId($referenceSetId)
  {
    $this->referenceSetId = $referenceSetId;
  }
  public function getReferenceSetId()
  {
    return $this->referenceSetId;
  }
  public function setSampleId($sampleId)
  {
    $this->sampleId = $sampleId;
  }
  public function getSampleId()
  {
    return $this->sampleId;
  }
}
