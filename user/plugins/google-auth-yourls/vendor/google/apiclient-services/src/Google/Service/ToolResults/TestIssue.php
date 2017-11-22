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

class Google_Service_ToolResults_TestIssue extends Google_Model
{
  public $errorMessage;
  public $severity;
  protected $stackTraceType = 'Google_Service_ToolResults_StackTrace';
  protected $stackTraceDataType = '';
  public $type;
  protected $warningType = 'Google_Service_ToolResults_Any';
  protected $warningDataType = '';

  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param Google_Service_ToolResults_StackTrace
   */
  public function setStackTrace(Google_Service_ToolResults_StackTrace $stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  /**
   * @return Google_Service_ToolResults_StackTrace
   */
  public function getStackTrace()
  {
    return $this->stackTrace;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_ToolResults_Any
   */
  public function setWarning(Google_Service_ToolResults_Any $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return Google_Service_ToolResults_Any
   */
  public function getWarning()
  {
    return $this->warning;
  }
}
