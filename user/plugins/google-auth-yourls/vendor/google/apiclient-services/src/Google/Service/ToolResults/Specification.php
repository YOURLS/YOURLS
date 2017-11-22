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

class Google_Service_ToolResults_Specification extends Google_Model
{
  protected $androidTestType = 'Google_Service_ToolResults_AndroidTest';
  protected $androidTestDataType = '';

  /**
   * @param Google_Service_ToolResults_AndroidTest
   */
  public function setAndroidTest(Google_Service_ToolResults_AndroidTest $androidTest)
  {
    $this->androidTest = $androidTest;
  }
  /**
   * @return Google_Service_ToolResults_AndroidTest
   */
  public function getAndroidTest()
  {
    return $this->androidTest;
  }
}
