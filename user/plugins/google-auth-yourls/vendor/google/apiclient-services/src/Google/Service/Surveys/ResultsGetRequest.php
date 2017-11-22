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

class Google_Service_Surveys_ResultsGetRequest extends Google_Model
{
  protected $resultMaskType = 'Google_Service_Surveys_ResultsMask';
  protected $resultMaskDataType = '';

  /**
   * @param Google_Service_Surveys_ResultsMask
   */
  public function setResultMask(Google_Service_Surveys_ResultsMask $resultMask)
  {
    $this->resultMask = $resultMask;
  }
  /**
   * @return Google_Service_Surveys_ResultsMask
   */
  public function getResultMask()
  {
    return $this->resultMask;
  }
}
