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

class Google_Service_Firestore_ListenResponse extends Google_Model
{
  protected $documentChangeType = 'Google_Service_Firestore_DocumentChange';
  protected $documentChangeDataType = '';
  protected $documentDeleteType = 'Google_Service_Firestore_DocumentDelete';
  protected $documentDeleteDataType = '';
  protected $documentRemoveType = 'Google_Service_Firestore_DocumentRemove';
  protected $documentRemoveDataType = '';
  protected $filterType = 'Google_Service_Firestore_ExistenceFilter';
  protected $filterDataType = '';
  protected $targetChangeType = 'Google_Service_Firestore_TargetChange';
  protected $targetChangeDataType = '';

  /**
   * @param Google_Service_Firestore_DocumentChange
   */
  public function setDocumentChange(Google_Service_Firestore_DocumentChange $documentChange)
  {
    $this->documentChange = $documentChange;
  }
  /**
   * @return Google_Service_Firestore_DocumentChange
   */
  public function getDocumentChange()
  {
    return $this->documentChange;
  }
  /**
   * @param Google_Service_Firestore_DocumentDelete
   */
  public function setDocumentDelete(Google_Service_Firestore_DocumentDelete $documentDelete)
  {
    $this->documentDelete = $documentDelete;
  }
  /**
   * @return Google_Service_Firestore_DocumentDelete
   */
  public function getDocumentDelete()
  {
    return $this->documentDelete;
  }
  /**
   * @param Google_Service_Firestore_DocumentRemove
   */
  public function setDocumentRemove(Google_Service_Firestore_DocumentRemove $documentRemove)
  {
    $this->documentRemove = $documentRemove;
  }
  /**
   * @return Google_Service_Firestore_DocumentRemove
   */
  public function getDocumentRemove()
  {
    return $this->documentRemove;
  }
  /**
   * @param Google_Service_Firestore_ExistenceFilter
   */
  public function setFilter(Google_Service_Firestore_ExistenceFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Google_Service_Firestore_ExistenceFilter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param Google_Service_Firestore_TargetChange
   */
  public function setTargetChange(Google_Service_Firestore_TargetChange $targetChange)
  {
    $this->targetChange = $targetChange;
  }
  /**
   * @return Google_Service_Firestore_TargetChange
   */
  public function getTargetChange()
  {
    return $this->targetChange;
  }
}
