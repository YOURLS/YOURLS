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

class Google_Service_Dataflow_CounterStructuredName extends Google_Model
{
  public $componentStepName;
  public $executionStepName;
  public $inputIndex;
  public $name;
  public $origin;
  public $originNamespace;
  public $originalRequestingStepName;
  public $originalStepName;
  public $portion;
  public $workerId;

  public function setComponentStepName($componentStepName)
  {
    $this->componentStepName = $componentStepName;
  }
  public function getComponentStepName()
  {
    return $this->componentStepName;
  }
  public function setExecutionStepName($executionStepName)
  {
    $this->executionStepName = $executionStepName;
  }
  public function getExecutionStepName()
  {
    return $this->executionStepName;
  }
  public function setInputIndex($inputIndex)
  {
    $this->inputIndex = $inputIndex;
  }
  public function getInputIndex()
  {
    return $this->inputIndex;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  public function getOrigin()
  {
    return $this->origin;
  }
  public function setOriginNamespace($originNamespace)
  {
    $this->originNamespace = $originNamespace;
  }
  public function getOriginNamespace()
  {
    return $this->originNamespace;
  }
  public function setOriginalRequestingStepName($originalRequestingStepName)
  {
    $this->originalRequestingStepName = $originalRequestingStepName;
  }
  public function getOriginalRequestingStepName()
  {
    return $this->originalRequestingStepName;
  }
  public function setOriginalStepName($originalStepName)
  {
    $this->originalStepName = $originalStepName;
  }
  public function getOriginalStepName()
  {
    return $this->originalStepName;
  }
  public function setPortion($portion)
  {
    $this->portion = $portion;
  }
  public function getPortion()
  {
    return $this->portion;
  }
  public function setWorkerId($workerId)
  {
    $this->workerId = $workerId;
  }
  public function getWorkerId()
  {
    return $this->workerId;
  }
}
