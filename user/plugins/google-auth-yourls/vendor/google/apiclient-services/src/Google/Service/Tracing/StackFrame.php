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

class Google_Service_Tracing_StackFrame extends Google_Model
{
  public $columnNumber;
  protected $fileNameType = 'Google_Service_Tracing_TruncatableString';
  protected $fileNameDataType = '';
  protected $functionNameType = 'Google_Service_Tracing_TruncatableString';
  protected $functionNameDataType = '';
  public $lineNumber;
  protected $loadModuleType = 'Google_Service_Tracing_Module';
  protected $loadModuleDataType = '';
  protected $originalFunctionNameType = 'Google_Service_Tracing_TruncatableString';
  protected $originalFunctionNameDataType = '';
  protected $sourceVersionType = 'Google_Service_Tracing_TruncatableString';
  protected $sourceVersionDataType = '';

  public function setColumnNumber($columnNumber)
  {
    $this->columnNumber = $columnNumber;
  }
  public function getColumnNumber()
  {
    return $this->columnNumber;
  }
  public function setFileName(Google_Service_Tracing_TruncatableString $fileName)
  {
    $this->fileName = $fileName;
  }
  public function getFileName()
  {
    return $this->fileName;
  }
  public function setFunctionName(Google_Service_Tracing_TruncatableString $functionName)
  {
    $this->functionName = $functionName;
  }
  public function getFunctionName()
  {
    return $this->functionName;
  }
  public function setLineNumber($lineNumber)
  {
    $this->lineNumber = $lineNumber;
  }
  public function getLineNumber()
  {
    return $this->lineNumber;
  }
  public function setLoadModule(Google_Service_Tracing_Module $loadModule)
  {
    $this->loadModule = $loadModule;
  }
  public function getLoadModule()
  {
    return $this->loadModule;
  }
  public function setOriginalFunctionName(Google_Service_Tracing_TruncatableString $originalFunctionName)
  {
    $this->originalFunctionName = $originalFunctionName;
  }
  public function getOriginalFunctionName()
  {
    return $this->originalFunctionName;
  }
  public function setSourceVersion(Google_Service_Tracing_TruncatableString $sourceVersion)
  {
    $this->sourceVersion = $sourceVersion;
  }
  public function getSourceVersion()
  {
    return $this->sourceVersion;
  }
}
