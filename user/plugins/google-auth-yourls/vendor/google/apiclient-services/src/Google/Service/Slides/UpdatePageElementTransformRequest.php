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

class Google_Service_Slides_UpdatePageElementTransformRequest extends Google_Model
{
  public $applyMode;
  public $objectId;
  protected $transformType = 'Google_Service_Slides_AffineTransform';
  protected $transformDataType = '';

  public function setApplyMode($applyMode)
  {
    $this->applyMode = $applyMode;
  }
  public function getApplyMode()
  {
    return $this->applyMode;
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
   * @param Google_Service_Slides_AffineTransform
   */
  public function setTransform(Google_Service_Slides_AffineTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return Google_Service_Slides_AffineTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
}
