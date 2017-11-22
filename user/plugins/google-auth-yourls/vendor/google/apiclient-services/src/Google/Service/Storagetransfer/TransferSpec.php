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

class Google_Service_Storagetransfer_TransferSpec extends Google_Model
{
  protected $awsS3DataSourceType = 'Google_Service_Storagetransfer_AwsS3Data';
  protected $awsS3DataSourceDataType = '';
  protected $gcsDataSinkType = 'Google_Service_Storagetransfer_GcsData';
  protected $gcsDataSinkDataType = '';
  protected $gcsDataSourceType = 'Google_Service_Storagetransfer_GcsData';
  protected $gcsDataSourceDataType = '';
  protected $httpDataSourceType = 'Google_Service_Storagetransfer_HttpData';
  protected $httpDataSourceDataType = '';
  protected $objectConditionsType = 'Google_Service_Storagetransfer_ObjectConditions';
  protected $objectConditionsDataType = '';
  protected $transferOptionsType = 'Google_Service_Storagetransfer_TransferOptions';
  protected $transferOptionsDataType = '';

  /**
   * @param Google_Service_Storagetransfer_AwsS3Data
   */
  public function setAwsS3DataSource(Google_Service_Storagetransfer_AwsS3Data $awsS3DataSource)
  {
    $this->awsS3DataSource = $awsS3DataSource;
  }
  /**
   * @return Google_Service_Storagetransfer_AwsS3Data
   */
  public function getAwsS3DataSource()
  {
    return $this->awsS3DataSource;
  }
  /**
   * @param Google_Service_Storagetransfer_GcsData
   */
  public function setGcsDataSink(Google_Service_Storagetransfer_GcsData $gcsDataSink)
  {
    $this->gcsDataSink = $gcsDataSink;
  }
  /**
   * @return Google_Service_Storagetransfer_GcsData
   */
  public function getGcsDataSink()
  {
    return $this->gcsDataSink;
  }
  /**
   * @param Google_Service_Storagetransfer_GcsData
   */
  public function setGcsDataSource(Google_Service_Storagetransfer_GcsData $gcsDataSource)
  {
    $this->gcsDataSource = $gcsDataSource;
  }
  /**
   * @return Google_Service_Storagetransfer_GcsData
   */
  public function getGcsDataSource()
  {
    return $this->gcsDataSource;
  }
  /**
   * @param Google_Service_Storagetransfer_HttpData
   */
  public function setHttpDataSource(Google_Service_Storagetransfer_HttpData $httpDataSource)
  {
    $this->httpDataSource = $httpDataSource;
  }
  /**
   * @return Google_Service_Storagetransfer_HttpData
   */
  public function getHttpDataSource()
  {
    return $this->httpDataSource;
  }
  /**
   * @param Google_Service_Storagetransfer_ObjectConditions
   */
  public function setObjectConditions(Google_Service_Storagetransfer_ObjectConditions $objectConditions)
  {
    $this->objectConditions = $objectConditions;
  }
  /**
   * @return Google_Service_Storagetransfer_ObjectConditions
   */
  public function getObjectConditions()
  {
    return $this->objectConditions;
  }
  /**
   * @param Google_Service_Storagetransfer_TransferOptions
   */
  public function setTransferOptions(Google_Service_Storagetransfer_TransferOptions $transferOptions)
  {
    $this->transferOptions = $transferOptions;
  }
  /**
   * @return Google_Service_Storagetransfer_TransferOptions
   */
  public function getTransferOptions()
  {
    return $this->transferOptions;
  }
}
