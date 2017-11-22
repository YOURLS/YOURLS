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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictRequest extends Google_Model
{
  protected $httpBodyType = 'Google_Service_CloudMachineLearningEngine_GoogleApiHttpBody';
  protected $httpBodyDataType = '';

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleApiHttpBody
   */
  public function setHttpBody(Google_Service_CloudMachineLearningEngine_GoogleApiHttpBody $httpBody)
  {
    $this->httpBody = $httpBody;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleApiHttpBody
   */
  public function getHttpBody()
  {
    return $this->httpBody;
  }
}
