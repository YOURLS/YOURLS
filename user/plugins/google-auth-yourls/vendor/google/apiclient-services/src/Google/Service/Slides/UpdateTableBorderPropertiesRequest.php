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

class Google_Service_Slides_UpdateTableBorderPropertiesRequest extends Google_Model
{
  public $borderPosition;
  public $fields;
  public $objectId;
  protected $tableBorderPropertiesType = 'Google_Service_Slides_TableBorderProperties';
  protected $tableBorderPropertiesDataType = '';
  protected $tableRangeType = 'Google_Service_Slides_TableRange';
  protected $tableRangeDataType = '';

  public function setBorderPosition($borderPosition)
  {
    $this->borderPosition = $borderPosition;
  }
  public function getBorderPosition()
  {
    return $this->borderPosition;
  }
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Google_Service_Slides_TableBorderProperties
   */
  public function setTableBorderProperties(Google_Service_Slides_TableBorderProperties $tableBorderProperties)
  {
    $this->tableBorderProperties = $tableBorderProperties;
  }
  /**
   * @return Google_Service_Slides_TableBorderProperties
   */
  public function getTableBorderProperties()
  {
    return $this->tableBorderProperties;
  }
  /**
   * @param Google_Service_Slides_TableRange
   */
  public function setTableRange(Google_Service_Slides_TableRange $tableRange)
  {
    $this->tableRange = $tableRange;
  }
  /**
   * @return Google_Service_Slides_TableRange
   */
  public function getTableRange()
  {
    return $this->tableRange;
  }
}
