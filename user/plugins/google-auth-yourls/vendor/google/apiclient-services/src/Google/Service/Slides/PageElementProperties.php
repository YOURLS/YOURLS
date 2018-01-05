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

class Google_Service_Slides_PageElementProperties extends Google_Model
{
  public $pageObjectId;
  protected $sizeType = 'Google_Service_Slides_Size';
  protected $sizeDataType = '';
  protected $transformType = 'Google_Service_Slides_AffineTransform';
  protected $transformDataType = '';

  public function setPageObjectId($pageObjectId)
  {
    $this->pageObjectId = $pageObjectId;
  }
  public function getPageObjectId()
  {
    return $this->pageObjectId;
  }
  /**
   * @param Google_Service_Slides_Size
   */
  public function setSize(Google_Service_Slides_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_Slides_Size
   */
  public function getSize()
  {
    return $this->size;
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
