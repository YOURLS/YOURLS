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

class Google_Service_Datastore_GqlQuery extends Google_Collection
{
  protected $collection_key = 'positionalBindings';
  public $allowLiterals;
  protected $namedBindingsType = 'Google_Service_Datastore_GqlQueryParameter';
  protected $namedBindingsDataType = 'map';
  protected $positionalBindingsType = 'Google_Service_Datastore_GqlQueryParameter';
  protected $positionalBindingsDataType = 'array';
  public $queryString;

  public function setAllowLiterals($allowLiterals)
  {
    $this->allowLiterals = $allowLiterals;
  }
  public function getAllowLiterals()
  {
    return $this->allowLiterals;
  }
  /**
   * @param Google_Service_Datastore_GqlQueryParameter
   */
  public function setNamedBindings($namedBindings)
  {
    $this->namedBindings = $namedBindings;
  }
  /**
   * @return Google_Service_Datastore_GqlQueryParameter
   */
  public function getNamedBindings()
  {
    return $this->namedBindings;
  }
  /**
   * @param Google_Service_Datastore_GqlQueryParameter
   */
  public function setPositionalBindings($positionalBindings)
  {
    $this->positionalBindings = $positionalBindings;
  }
  /**
   * @return Google_Service_Datastore_GqlQueryParameter
   */
  public function getPositionalBindings()
  {
    return $this->positionalBindings;
  }
  public function setQueryString($queryString)
  {
    $this->queryString = $queryString;
  }
  public function getQueryString()
  {
    return $this->queryString;
  }
}
