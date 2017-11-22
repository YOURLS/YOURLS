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

class Google_Service_Firestore_Write extends Google_Model
{
  protected $currentDocumentType = 'Google_Service_Firestore_Precondition';
  protected $currentDocumentDataType = '';
  public $delete;
  protected $transformType = 'Google_Service_Firestore_DocumentTransform';
  protected $transformDataType = '';
  protected $updateType = 'Google_Service_Firestore_Document';
  protected $updateDataType = '';
  protected $updateMaskType = 'Google_Service_Firestore_DocumentMask';
  protected $updateMaskDataType = '';

  /**
   * @param Google_Service_Firestore_Precondition
   */
  public function setCurrentDocument(Google_Service_Firestore_Precondition $currentDocument)
  {
    $this->currentDocument = $currentDocument;
  }
  /**
   * @return Google_Service_Firestore_Precondition
   */
  public function getCurrentDocument()
  {
    return $this->currentDocument;
  }
  public function setDelete($delete)
  {
    $this->delete = $delete;
  }
  public function getDelete()
  {
    return $this->delete;
  }
  /**
   * @param Google_Service_Firestore_DocumentTransform
   */
  public function setTransform(Google_Service_Firestore_DocumentTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return Google_Service_Firestore_DocumentTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
  /**
   * @param Google_Service_Firestore_Document
   */
  public function setUpdate(Google_Service_Firestore_Document $update)
  {
    $this->update = $update;
  }
  /**
   * @return Google_Service_Firestore_Document
   */
  public function getUpdate()
  {
    return $this->update;
  }
  /**
   * @param Google_Service_Firestore_DocumentMask
   */
  public function setUpdateMask(Google_Service_Firestore_DocumentMask $updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return Google_Service_Firestore_DocumentMask
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}
