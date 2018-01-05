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

class Google_Service_Slides_LayoutPlaceholderIdMapping extends Google_Model
{
  protected $layoutPlaceholderType = 'Google_Service_Slides_Placeholder';
  protected $layoutPlaceholderDataType = '';
  public $layoutPlaceholderObjectId;
  public $objectId;

  /**
   * @param Google_Service_Slides_Placeholder
   */
  public function setLayoutPlaceholder(Google_Service_Slides_Placeholder $layoutPlaceholder)
  {
    $this->layoutPlaceholder = $layoutPlaceholder;
  }
  /**
   * @return Google_Service_Slides_Placeholder
   */
  public function getLayoutPlaceholder()
  {
    return $this->layoutPlaceholder;
  }
  public function setLayoutPlaceholderObjectId($layoutPlaceholderObjectId)
  {
    $this->layoutPlaceholderObjectId = $layoutPlaceholderObjectId;
  }
  public function getLayoutPlaceholderObjectId()
  {
    return $this->layoutPlaceholderObjectId;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
}
