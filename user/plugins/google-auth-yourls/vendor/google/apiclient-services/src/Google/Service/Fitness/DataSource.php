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

class Google_Service_Fitness_DataSource extends Google_Collection
{
  protected $collection_key = 'dataQualityStandard';
  protected $applicationType = 'Google_Service_Fitness_Application';
  protected $applicationDataType = '';
  public $dataQualityStandard;
  public $dataStreamId;
  public $dataStreamName;
  protected $dataTypeType = 'Google_Service_Fitness_DataType';
  protected $dataTypeDataType = '';
  protected $deviceType = 'Google_Service_Fitness_Device';
  protected $deviceDataType = '';
  public $name;
  public $type;

  /**
   * @param Google_Service_Fitness_Application
   */
  public function setApplication(Google_Service_Fitness_Application $application)
  {
    $this->application = $application;
  }
  /**
   * @return Google_Service_Fitness_Application
   */
  public function getApplication()
  {
    return $this->application;
  }
  public function setDataQualityStandard($dataQualityStandard)
  {
    $this->dataQualityStandard = $dataQualityStandard;
  }
  public function getDataQualityStandard()
  {
    return $this->dataQualityStandard;
  }
  public function setDataStreamId($dataStreamId)
  {
    $this->dataStreamId = $dataStreamId;
  }
  public function getDataStreamId()
  {
    return $this->dataStreamId;
  }
  public function setDataStreamName($dataStreamName)
  {
    $this->dataStreamName = $dataStreamName;
  }
  public function getDataStreamName()
  {
    return $this->dataStreamName;
  }
  /**
   * @param Google_Service_Fitness_DataType
   */
  public function setDataType(Google_Service_Fitness_DataType $dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return Google_Service_Fitness_DataType
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param Google_Service_Fitness_Device
   */
  public function setDevice(Google_Service_Fitness_Device $device)
  {
    $this->device = $device;
  }
  /**
   * @return Google_Service_Fitness_Device
   */
  public function getDevice()
  {
    return $this->device;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
