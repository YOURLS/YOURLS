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

class Google_Service_Sheets_BatchUpdateValuesRequest extends Google_Collection
{
  protected $collection_key = 'data';
  protected $dataType = 'Google_Service_Sheets_ValueRange';
  protected $dataDataType = 'array';
  public $includeValuesInResponse;
  public $responseDateTimeRenderOption;
  public $responseValueRenderOption;
  public $valueInputOption;

  /**
   * @param Google_Service_Sheets_ValueRange
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Sheets_ValueRange
   */
  public function getData()
  {
    return $this->data;
  }
  public function setIncludeValuesInResponse($includeValuesInResponse)
  {
    $this->includeValuesInResponse = $includeValuesInResponse;
  }
  public function getIncludeValuesInResponse()
  {
    return $this->includeValuesInResponse;
  }
  public function setResponseDateTimeRenderOption($responseDateTimeRenderOption)
  {
    $this->responseDateTimeRenderOption = $responseDateTimeRenderOption;
  }
  public function getResponseDateTimeRenderOption()
  {
    return $this->responseDateTimeRenderOption;
  }
  public function setResponseValueRenderOption($responseValueRenderOption)
  {
    $this->responseValueRenderOption = $responseValueRenderOption;
  }
  public function getResponseValueRenderOption()
  {
    return $this->responseValueRenderOption;
  }
  public function setValueInputOption($valueInputOption)
  {
    $this->valueInputOption = $valueInputOption;
  }
  public function getValueInputOption()
  {
    return $this->valueInputOption;
  }
}
