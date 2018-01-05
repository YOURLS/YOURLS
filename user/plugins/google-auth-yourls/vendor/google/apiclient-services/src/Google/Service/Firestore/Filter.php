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

class Google_Service_Firestore_Filter extends Google_Model
{
  protected $compositeFilterType = 'Google_Service_Firestore_CompositeFilter';
  protected $compositeFilterDataType = '';
  protected $fieldFilterType = 'Google_Service_Firestore_FieldFilter';
  protected $fieldFilterDataType = '';
  protected $unaryFilterType = 'Google_Service_Firestore_UnaryFilter';
  protected $unaryFilterDataType = '';

  /**
   * @param Google_Service_Firestore_CompositeFilter
   */
  public function setCompositeFilter(Google_Service_Firestore_CompositeFilter $compositeFilter)
  {
    $this->compositeFilter = $compositeFilter;
  }
  /**
   * @return Google_Service_Firestore_CompositeFilter
   */
  public function getCompositeFilter()
  {
    return $this->compositeFilter;
  }
  /**
   * @param Google_Service_Firestore_FieldFilter
   */
  public function setFieldFilter(Google_Service_Firestore_FieldFilter $fieldFilter)
  {
    $this->fieldFilter = $fieldFilter;
  }
  /**
   * @return Google_Service_Firestore_FieldFilter
   */
  public function getFieldFilter()
  {
    return $this->fieldFilter;
  }
  /**
   * @param Google_Service_Firestore_UnaryFilter
   */
  public function setUnaryFilter(Google_Service_Firestore_UnaryFilter $unaryFilter)
  {
    $this->unaryFilter = $unaryFilter;
  }
  /**
   * @return Google_Service_Firestore_UnaryFilter
   */
  public function getUnaryFilter()
  {
    return $this->unaryFilter;
  }
}
