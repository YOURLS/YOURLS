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

class Google_Service_Datastore_Query extends Google_Collection
{
  protected $collection_key = 'projection';
  protected $distinctOnType = 'Google_Service_Datastore_PropertyReference';
  protected $distinctOnDataType = 'array';
  public $endCursor;
  protected $filterType = 'Google_Service_Datastore_Filter';
  protected $filterDataType = '';
  protected $kindType = 'Google_Service_Datastore_KindExpression';
  protected $kindDataType = 'array';
  public $limit;
  public $offset;
  protected $orderType = 'Google_Service_Datastore_PropertyOrder';
  protected $orderDataType = 'array';
  protected $projectionType = 'Google_Service_Datastore_Projection';
  protected $projectionDataType = 'array';
  public $startCursor;

  /**
   * @param Google_Service_Datastore_PropertyReference
   */
  public function setDistinctOn($distinctOn)
  {
    $this->distinctOn = $distinctOn;
  }
  /**
   * @return Google_Service_Datastore_PropertyReference
   */
  public function getDistinctOn()
  {
    return $this->distinctOn;
  }
  public function setEndCursor($endCursor)
  {
    $this->endCursor = $endCursor;
  }
  public function getEndCursor()
  {
    return $this->endCursor;
  }
  /**
   * @param Google_Service_Datastore_Filter
   */
  public function setFilter(Google_Service_Datastore_Filter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Google_Service_Datastore_Filter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param Google_Service_Datastore_KindExpression
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return Google_Service_Datastore_KindExpression
   */
  public function getKind()
  {
    return $this->kind;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param Google_Service_Datastore_PropertyOrder
   */
  public function setOrder($order)
  {
    $this->order = $order;
  }
  /**
   * @return Google_Service_Datastore_PropertyOrder
   */
  public function getOrder()
  {
    return $this->order;
  }
  /**
   * @param Google_Service_Datastore_Projection
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return Google_Service_Datastore_Projection
   */
  public function getProjection()
  {
    return $this->projection;
  }
  public function setStartCursor($startCursor)
  {
    $this->startCursor = $startCursor;
  }
  public function getStartCursor()
  {
    return $this->startCursor;
  }
}
