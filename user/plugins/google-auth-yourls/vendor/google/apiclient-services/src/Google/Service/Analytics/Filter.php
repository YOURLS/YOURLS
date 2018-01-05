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

class Google_Service_Analytics_Filter extends Google_Model
{
  public $accountId;
  protected $advancedDetailsType = 'Google_Service_Analytics_FilterAdvancedDetails';
  protected $advancedDetailsDataType = '';
  public $created;
  protected $excludeDetailsType = 'Google_Service_Analytics_FilterExpression';
  protected $excludeDetailsDataType = '';
  public $id;
  protected $includeDetailsType = 'Google_Service_Analytics_FilterExpression';
  protected $includeDetailsDataType = '';
  public $kind;
  protected $lowercaseDetailsType = 'Google_Service_Analytics_FilterLowercaseDetails';
  protected $lowercaseDetailsDataType = '';
  public $name;
  protected $parentLinkType = 'Google_Service_Analytics_FilterParentLink';
  protected $parentLinkDataType = '';
  protected $searchAndReplaceDetailsType = 'Google_Service_Analytics_FilterSearchAndReplaceDetails';
  protected $searchAndReplaceDetailsDataType = '';
  public $selfLink;
  public $type;
  public $updated;
  protected $uppercaseDetailsType = 'Google_Service_Analytics_FilterUppercaseDetails';
  protected $uppercaseDetailsDataType = '';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_Analytics_FilterAdvancedDetails
   */
  public function setAdvancedDetails(Google_Service_Analytics_FilterAdvancedDetails $advancedDetails)
  {
    $this->advancedDetails = $advancedDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterAdvancedDetails
   */
  public function getAdvancedDetails()
  {
    return $this->advancedDetails;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param Google_Service_Analytics_FilterExpression
   */
  public function setExcludeDetails(Google_Service_Analytics_FilterExpression $excludeDetails)
  {
    $this->excludeDetails = $excludeDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterExpression
   */
  public function getExcludeDetails()
  {
    return $this->excludeDetails;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Analytics_FilterExpression
   */
  public function setIncludeDetails(Google_Service_Analytics_FilterExpression $includeDetails)
  {
    $this->includeDetails = $includeDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterExpression
   */
  public function getIncludeDetails()
  {
    return $this->includeDetails;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Analytics_FilterLowercaseDetails
   */
  public function setLowercaseDetails(Google_Service_Analytics_FilterLowercaseDetails $lowercaseDetails)
  {
    $this->lowercaseDetails = $lowercaseDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterLowercaseDetails
   */
  public function getLowercaseDetails()
  {
    return $this->lowercaseDetails;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Analytics_FilterParentLink
   */
  public function setParentLink(Google_Service_Analytics_FilterParentLink $parentLink)
  {
    $this->parentLink = $parentLink;
  }
  /**
   * @return Google_Service_Analytics_FilterParentLink
   */
  public function getParentLink()
  {
    return $this->parentLink;
  }
  /**
   * @param Google_Service_Analytics_FilterSearchAndReplaceDetails
   */
  public function setSearchAndReplaceDetails(Google_Service_Analytics_FilterSearchAndReplaceDetails $searchAndReplaceDetails)
  {
    $this->searchAndReplaceDetails = $searchAndReplaceDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterSearchAndReplaceDetails
   */
  public function getSearchAndReplaceDetails()
  {
    return $this->searchAndReplaceDetails;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param Google_Service_Analytics_FilterUppercaseDetails
   */
  public function setUppercaseDetails(Google_Service_Analytics_FilterUppercaseDetails $uppercaseDetails)
  {
    $this->uppercaseDetails = $uppercaseDetails;
  }
  /**
   * @return Google_Service_Analytics_FilterUppercaseDetails
   */
  public function getUppercaseDetails()
  {
    return $this->uppercaseDetails;
  }
}
