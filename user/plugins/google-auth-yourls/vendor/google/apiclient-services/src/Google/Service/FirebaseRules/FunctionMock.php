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

class Google_Service_FirebaseRules_FunctionMock extends Google_Collection
{
  protected $collection_key = 'args';
  protected $argsType = 'Google_Service_FirebaseRules_Arg';
  protected $argsDataType = 'array';
  public $function;
  protected $resultType = 'Google_Service_FirebaseRules_Result';
  protected $resultDataType = '';

  /**
   * @param Google_Service_FirebaseRules_Arg
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return Google_Service_FirebaseRules_Arg
   */
  public function getArgs()
  {
    return $this->args;
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
   * @param Google_Service_FirebaseRules_Result
   */
  public function setResult(Google_Service_FirebaseRules_Result $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_FirebaseRules_Result
   */
  public function getResult()
  {
    return $this->result;
  }
}
