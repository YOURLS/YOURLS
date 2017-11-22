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

class Google_Service_Kgsearch_SearchResponse extends Google_Collection
{
  protected $collection_key = 'itemListElement';
  protected $internal_gapi_mappings = array(
        "context" => "@context",
        "type" => "@type",
  );
  public $context;
  public $type;
  public $itemListElement;

  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setItemListElement($itemListElement)
  {
    $this->itemListElement = $itemListElement;
  }
  public function getItemListElement()
  {
    return $this->itemListElement;
  }
}
