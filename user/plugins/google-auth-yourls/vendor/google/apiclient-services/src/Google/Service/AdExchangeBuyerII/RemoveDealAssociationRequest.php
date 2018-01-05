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

class Google_Service_AdExchangeBuyerII_RemoveDealAssociationRequest extends Google_Model
{
  protected $associationType = 'Google_Service_AdExchangeBuyerII_CreativeDealAssociation';
  protected $associationDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_CreativeDealAssociation
   */
  public function setAssociation(Google_Service_AdExchangeBuyerII_CreativeDealAssociation $association)
  {
    $this->association = $association;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CreativeDealAssociation
   */
  public function getAssociation()
  {
    return $this->association;
  }
}
