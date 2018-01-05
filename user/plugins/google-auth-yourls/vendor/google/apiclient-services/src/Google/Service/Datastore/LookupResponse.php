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

class Google_Service_Datastore_LookupResponse extends Google_Collection
{
  protected $collection_key = 'missing';
  protected $deferredType = 'Google_Service_Datastore_Key';
  protected $deferredDataType = 'array';
  protected $foundType = 'Google_Service_Datastore_EntityResult';
  protected $foundDataType = 'array';
  protected $missingType = 'Google_Service_Datastore_EntityResult';
  protected $missingDataType = 'array';

  /**
   * @param Google_Service_Datastore_Key
   */
  public function setDeferred($deferred)
  {
    $this->deferred = $deferred;
  }
  /**
   * @return Google_Service_Datastore_Key
   */
  public function getDeferred()
  {
    return $this->deferred;
  }
  /**
   * @param Google_Service_Datastore_EntityResult
   */
  public function setFound($found)
  {
    $this->found = $found;
  }
  /**
   * @return Google_Service_Datastore_EntityResult
   */
  public function getFound()
  {
    return $this->found;
  }
  /**
   * @param Google_Service_Datastore_EntityResult
   */
  public function setMissing($missing)
  {
    $this->missing = $missing;
  }
  /**
   * @return Google_Service_Datastore_EntityResult
   */
  public function getMissing()
  {
    return $this->missing;
  }
}
