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

class Google_Service_Dataflow_CounterUpdate extends Google_Model
{
  public $boolean;
  public $cumulative;
  protected $distributionType = 'Google_Service_Dataflow_DistributionUpdate';
  protected $distributionDataType = '';
  public $floatingPoint;
  protected $floatingPointListType = 'Google_Service_Dataflow_FloatingPointList';
  protected $floatingPointListDataType = '';
  protected $floatingPointMeanType = 'Google_Service_Dataflow_FloatingPointMean';
  protected $floatingPointMeanDataType = '';
  protected $integerType = 'Google_Service_Dataflow_SplitInt64';
  protected $integerDataType = '';
  protected $integerListType = 'Google_Service_Dataflow_IntegerList';
  protected $integerListDataType = '';
  protected $integerMeanType = 'Google_Service_Dataflow_IntegerMean';
  protected $integerMeanDataType = '';
  public $internal;
  protected $nameAndKindType = 'Google_Service_Dataflow_NameAndKind';
  protected $nameAndKindDataType = '';
  public $shortId;
  protected $stringListType = 'Google_Service_Dataflow_StringList';
  protected $stringListDataType = '';
  protected $structuredNameAndMetadataType = 'Google_Service_Dataflow_CounterStructuredNameAndMetadata';
  protected $structuredNameAndMetadataDataType = '';

  public function setBoolean($boolean)
  {
    $this->boolean = $boolean;
  }
  public function getBoolean()
  {
    return $this->boolean;
  }
  public function setCumulative($cumulative)
  {
    $this->cumulative = $cumulative;
  }
  public function getCumulative()
  {
    return $this->cumulative;
  }
  /**
   * @param Google_Service_Dataflow_DistributionUpdate
   */
  public function setDistribution(Google_Service_Dataflow_DistributionUpdate $distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return Google_Service_Dataflow_DistributionUpdate
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  public function setFloatingPoint($floatingPoint)
  {
    $this->floatingPoint = $floatingPoint;
  }
  public function getFloatingPoint()
  {
    return $this->floatingPoint;
  }
  /**
   * @param Google_Service_Dataflow_FloatingPointList
   */
  public function setFloatingPointList(Google_Service_Dataflow_FloatingPointList $floatingPointList)
  {
    $this->floatingPointList = $floatingPointList;
  }
  /**
   * @return Google_Service_Dataflow_FloatingPointList
   */
  public function getFloatingPointList()
  {
    return $this->floatingPointList;
  }
  /**
   * @param Google_Service_Dataflow_FloatingPointMean
   */
  public function setFloatingPointMean(Google_Service_Dataflow_FloatingPointMean $floatingPointMean)
  {
    $this->floatingPointMean = $floatingPointMean;
  }
  /**
   * @return Google_Service_Dataflow_FloatingPointMean
   */
  public function getFloatingPointMean()
  {
    return $this->floatingPointMean;
  }
  /**
   * @param Google_Service_Dataflow_SplitInt64
   */
  public function setInteger(Google_Service_Dataflow_SplitInt64 $integer)
  {
    $this->integer = $integer;
  }
  /**
   * @return Google_Service_Dataflow_SplitInt64
   */
  public function getInteger()
  {
    return $this->integer;
  }
  /**
   * @param Google_Service_Dataflow_IntegerList
   */
  public function setIntegerList(Google_Service_Dataflow_IntegerList $integerList)
  {
    $this->integerList = $integerList;
  }
  /**
   * @return Google_Service_Dataflow_IntegerList
   */
  public function getIntegerList()
  {
    return $this->integerList;
  }
  /**
   * @param Google_Service_Dataflow_IntegerMean
   */
  public function setIntegerMean(Google_Service_Dataflow_IntegerMean $integerMean)
  {
    $this->integerMean = $integerMean;
  }
  /**
   * @return Google_Service_Dataflow_IntegerMean
   */
  public function getIntegerMean()
  {
    return $this->integerMean;
  }
  public function setInternal($internal)
  {
    $this->internal = $internal;
  }
  public function getInternal()
  {
    return $this->internal;
  }
  /**
   * @param Google_Service_Dataflow_NameAndKind
   */
  public function setNameAndKind(Google_Service_Dataflow_NameAndKind $nameAndKind)
  {
    $this->nameAndKind = $nameAndKind;
  }
  /**
   * @return Google_Service_Dataflow_NameAndKind
   */
  public function getNameAndKind()
  {
    return $this->nameAndKind;
  }
  public function setShortId($shortId)
  {
    $this->shortId = $shortId;
  }
  public function getShortId()
  {
    return $this->shortId;
  }
  /**
   * @param Google_Service_Dataflow_StringList
   */
  public function setStringList(Google_Service_Dataflow_StringList $stringList)
  {
    $this->stringList = $stringList;
  }
  /**
   * @return Google_Service_Dataflow_StringList
   */
  public function getStringList()
  {
    return $this->stringList;
  }
  /**
   * @param Google_Service_Dataflow_CounterStructuredNameAndMetadata
   */
  public function setStructuredNameAndMetadata(Google_Service_Dataflow_CounterStructuredNameAndMetadata $structuredNameAndMetadata)
  {
    $this->structuredNameAndMetadata = $structuredNameAndMetadata;
  }
  /**
   * @return Google_Service_Dataflow_CounterStructuredNameAndMetadata
   */
  public function getStructuredNameAndMetadata()
  {
    return $this->structuredNameAndMetadata;
  }
}
