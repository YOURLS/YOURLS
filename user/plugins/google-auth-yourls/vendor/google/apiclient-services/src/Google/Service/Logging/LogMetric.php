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

class Google_Service_Logging_LogMetric extends Google_Model
{
  protected $bucketOptionsType = 'Google_Service_Logging_BucketOptions';
  protected $bucketOptionsDataType = '';
  public $description;
  public $filter;
  public $labelExtractors;
  protected $metricDescriptorType = 'Google_Service_Logging_MetricDescriptor';
  protected $metricDescriptorDataType = '';
  public $name;
  public $valueExtractor;
  public $version;

  /**
   * @param Google_Service_Logging_BucketOptions
   */
  public function setBucketOptions(Google_Service_Logging_BucketOptions $bucketOptions)
  {
    $this->bucketOptions = $bucketOptions;
  }
  /**
   * @return Google_Service_Logging_BucketOptions
   */
  public function getBucketOptions()
  {
    return $this->bucketOptions;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setLabelExtractors($labelExtractors)
  {
    $this->labelExtractors = $labelExtractors;
  }
  public function getLabelExtractors()
  {
    return $this->labelExtractors;
  }
  /**
   * @param Google_Service_Logging_MetricDescriptor
   */
  public function setMetricDescriptor(Google_Service_Logging_MetricDescriptor $metricDescriptor)
  {
    $this->metricDescriptor = $metricDescriptor;
  }
  /**
   * @return Google_Service_Logging_MetricDescriptor
   */
  public function getMetricDescriptor()
  {
    return $this->metricDescriptor;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setValueExtractor($valueExtractor)
  {
    $this->valueExtractor = $valueExtractor;
  }
  public function getValueExtractor()
  {
    return $this->valueExtractor;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
