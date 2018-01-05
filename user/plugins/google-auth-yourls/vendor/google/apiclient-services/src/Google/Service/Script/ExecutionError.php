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

class Google_Service_Script_ExecutionError extends Google_Collection
{
  protected $collection_key = 'scriptStackTraceElements';
  public $errorMessage;
  public $errorType;
  protected $scriptStackTraceElementsType = 'Google_Service_Script_ScriptStackTraceElement';
  protected $scriptStackTraceElementsDataType = 'array';

  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setErrorType($errorType)
  {
    $this->errorType = $errorType;
  }
  public function getErrorType()
  {
    return $this->errorType;
  }
  /**
   * @param Google_Service_Script_ScriptStackTraceElement
   */
  public function setScriptStackTraceElements($scriptStackTraceElements)
  {
    $this->scriptStackTraceElements = $scriptStackTraceElements;
  }
  /**
   * @return Google_Service_Script_ScriptStackTraceElement
   */
  public function getScriptStackTraceElements()
  {
    return $this->scriptStackTraceElements;
  }
}
