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

class Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryOptions extends Google_Collection
{
  protected $collection_key = 'identifyingFields';
  protected $identifyingFieldsType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1FieldId';
  protected $identifyingFieldsDataType = 'array';
  protected $tableReferenceType = 'Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable';
  protected $tableReferenceDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1FieldId
   */
  public function setIdentifyingFields($identifyingFields)
  {
    $this->identifyingFields = $identifyingFields;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1FieldId
   */
  public function getIdentifyingFields()
  {
    return $this->identifyingFields;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable
   */
  public function setTableReference(Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable $tableReference)
  {
    $this->tableReference = $tableReference;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta1BigQueryTable
   */
  public function getTableReference()
  {
    return $this->tableReference;
  }
}
