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

class Google_Service_CloudDebugger_StackFrame extends Google_Collection
{
  protected $collection_key = 'locals';
  protected $argumentsType = 'Google_Service_CloudDebugger_Variable';
  protected $argumentsDataType = 'array';
  public $function;
  protected $localsType = 'Google_Service_CloudDebugger_Variable';
  protected $localsDataType = 'array';
  protected $locationType = 'Google_Service_CloudDebugger_SourceLocation';
  protected $locationDataType = '';

  /**
   * @param Google_Service_CloudDebugger_Variable
   */
  public function setArguments($arguments)
  {
    $this->arguments = $arguments;
  }
  /**
   * @return Google_Service_CloudDebugger_Variable
   */
  public function getArguments()
  {
    return $this->arguments;
  }
  public function setFunction($function)
  {
    $this->function = $function;
  }
  public function getFunction()
  {
    return $this->function;
  }
  /**
   * @param Google_Service_CloudDebugger_Variable
   */
  public function setLocals($locals)
  {
    $this->locals = $locals;
  }
  /**
   * @return Google_Service_CloudDebugger_Variable
   */
  public function getLocals()
  {
    return $this->locals;
  }
  /**
   * @param Google_Service_CloudDebugger_SourceLocation
   */
  public function setLocation(Google_Service_CloudDebugger_SourceLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_CloudDebugger_SourceLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
}
