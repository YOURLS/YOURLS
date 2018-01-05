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

class Google_Service_Firestore_StructuredQuery extends Google_Collection
{
  protected $collection_key = 'orderBy';
  protected $endAtType = 'Google_Service_Firestore_Cursor';
  protected $endAtDataType = '';
  protected $fromType = 'Google_Service_Firestore_CollectionSelector';
  protected $fromDataType = 'array';
  public $limit;
  public $offset;
  protected $orderByType = 'Google_Service_Firestore_Order';
  protected $orderByDataType = 'array';
  protected $selectType = 'Google_Service_Firestore_Projection';
  protected $selectDataType = '';
  protected $startAtType = 'Google_Service_Firestore_Cursor';
  protected $startAtDataType = '';
  protected $whereType = 'Google_Service_Firestore_Filter';
  protected $whereDataType = '';

  /**
   * @param Google_Service_Firestore_Cursor
   */
  public function setEndAt(Google_Service_Firestore_Cursor $endAt)
  {
    $this->endAt = $endAt;
  }
  /**
   * @return Google_Service_Firestore_Cursor
   */
  public function getEndAt()
  {
    return $this->endAt;
  }
  /**
   * @param Google_Service_Firestore_CollectionSelector
   */
  public function setFrom($from)
  {
    $this->from = $from;
  }
  /**
   * @return Google_Service_Firestore_CollectionSelector
   */
  public function getFrom()
  {
    return $this->from;
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
   * @param Google_Service_Firestore_Order
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return Google_Service_Firestore_Order
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param Google_Service_Firestore_Projection
   */
  public function setSelect(Google_Service_Firestore_Projection $select)
  {
    $this->select = $select;
  }
  /**
   * @return Google_Service_Firestore_Projection
   */
  public function getSelect()
  {
    return $this->select;
  }
  /**
   * @param Google_Service_Firestore_Cursor
   */
  public function setStartAt(Google_Service_Firestore_Cursor $startAt)
  {
    $this->startAt = $startAt;
  }
  /**
   * @return Google_Service_Firestore_Cursor
   */
  public function getStartAt()
  {
    return $this->startAt;
  }
  /**
   * @param Google_Service_Firestore_Filter
   */
  public function setWhere(Google_Service_Firestore_Filter $where)
  {
    $this->where = $where;
  }
  /**
   * @return Google_Service_Firestore_Filter
   */
  public function getWhere()
  {
    return $this->where;
  }
}
