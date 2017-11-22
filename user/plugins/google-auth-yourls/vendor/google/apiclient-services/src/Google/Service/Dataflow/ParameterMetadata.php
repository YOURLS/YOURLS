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

class Google_Service_Dataflow_ParameterMetadata extends Google_Collection
{
  protected $collection_key = 'regexes';
  public $helpText;
  public $isOptional;
  public $label;
  public $name;
  public $regexes;

  public function setHelpText($helpText)
  {
    $this->helpText = $helpText;
  }
  public function getHelpText()
  {
    return $this->helpText;
  }
  public function setIsOptional($isOptional)
  {
    $this->isOptional = $isOptional;
  }
  public function getIsOptional()
  {
    return $this->isOptional;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRegexes($regexes)
  {
    $this->regexes = $regexes;
  }
  public function getRegexes()
  {
    return $this->regexes;
  }
}
