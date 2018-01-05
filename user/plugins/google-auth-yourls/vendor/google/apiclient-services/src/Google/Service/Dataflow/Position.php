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

class Google_Service_Dataflow_Position extends Google_Model
{
  public $byteOffset;
  protected $concatPositionType = 'Google_Service_Dataflow_ConcatPosition';
  protected $concatPositionDataType = '';
  public $end;
  public $key;
  public $recordIndex;
  public $shufflePosition;

  public function setByteOffset($byteOffset)
  {
    $this->byteOffset = $byteOffset;
  }
  public function getByteOffset()
  {
    return $this->byteOffset;
  }
  /**
   * @param Google_Service_Dataflow_ConcatPosition
   */
  public function setConcatPosition(Google_Service_Dataflow_ConcatPosition $concatPosition)
  {
    $this->concatPosition = $concatPosition;
  }
  /**
   * @return Google_Service_Dataflow_ConcatPosition
   */
  public function getConcatPosition()
  {
    return $this->concatPosition;
  }
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  public function setRecordIndex($recordIndex)
  {
    $this->recordIndex = $recordIndex;
  }
  public function getRecordIndex()
  {
    return $this->recordIndex;
  }
  public function setShufflePosition($shufflePosition)
  {
    $this->shufflePosition = $shufflePosition;
  }
  public function getShufflePosition()
  {
    return $this->shufflePosition;
  }
}
