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

class Google_Service_Monitoring_CollectdPayloadError extends Google_Collection
{
  protected $collection_key = 'valueErrors';
  protected $errorType = 'Google_Service_Monitoring_Status';
  protected $errorDataType = '';
  public $index;
  protected $valueErrorsType = 'Google_Service_Monitoring_CollectdValueError';
  protected $valueErrorsDataType = 'array';

  /**
   * @param Google_Service_Monitoring_Status
   */
  public function setError(Google_Service_Monitoring_Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_Monitoring_Status
   */
  public function getError()
  {
    return $this->error;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param Google_Service_Monitoring_CollectdValueError
   */
  public function setValueErrors($valueErrors)
  {
    $this->valueErrors = $valueErrors;
  }
  /**
   * @return Google_Service_Monitoring_CollectdValueError
   */
  public function getValueErrors()
  {
    return $this->valueErrors;
  }
}
