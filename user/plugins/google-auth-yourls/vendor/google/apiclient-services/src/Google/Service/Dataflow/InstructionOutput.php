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

class Google_Service_Dataflow_InstructionOutput extends Google_Model
{
  public $codec;
  public $name;
  public $onlyCountKeyBytes;
  public $onlyCountValueBytes;
  public $originalName;
  public $systemName;

  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  public function getCodec()
  {
    return $this->codec;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOnlyCountKeyBytes($onlyCountKeyBytes)
  {
    $this->onlyCountKeyBytes = $onlyCountKeyBytes;
  }
  public function getOnlyCountKeyBytes()
  {
    return $this->onlyCountKeyBytes;
  }
  public function setOnlyCountValueBytes($onlyCountValueBytes)
  {
    $this->onlyCountValueBytes = $onlyCountValueBytes;
  }
  public function getOnlyCountValueBytes()
  {
    return $this->onlyCountValueBytes;
  }
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  public function getOriginalName()
  {
    return $this->originalName;
  }
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  public function getSystemName()
  {
    return $this->systemName;
  }
}
