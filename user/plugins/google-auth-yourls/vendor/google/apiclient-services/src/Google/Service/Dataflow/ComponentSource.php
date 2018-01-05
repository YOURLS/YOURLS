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

class Google_Service_Dataflow_ComponentSource extends Google_Model
{
  public $name;
  public $originalTransformOrCollection;
  public $userName;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOriginalTransformOrCollection($originalTransformOrCollection)
  {
    $this->originalTransformOrCollection = $originalTransformOrCollection;
  }
  public function getOriginalTransformOrCollection()
  {
    return $this->originalTransformOrCollection;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  public function getUserName()
  {
    return $this->userName;
  }
}
