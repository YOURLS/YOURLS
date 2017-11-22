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

class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2Args extends Google_Collection
{
  protected $collection_key = 'secondary_rects';
  protected $internal_gapi_mappings = array(
        "secondaryRects" => "secondary_rects",
  );
  public $key;
  protected $rectsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects';
  protected $rectsDataType = 'array';
  protected $secondaryRectsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects';
  protected $secondaryRectsDataType = 'array';
  public $type;
  public $value;

  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects
   */
  public function setRects($rects)
  {
    $this->rects = $rects;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects
   */
  public function getRects()
  {
    return $this->rects;
  }
  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects
   */
  public function setSecondaryRects($secondaryRects)
  {
    $this->secondaryRects = $secondaryRects;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects
   */
  public function getSecondaryRects()
  {
    return $this->secondaryRects;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
