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

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $customers = $androiddeviceprovisioningService->customers;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_PartnersCustomers extends Google_Service_Resource
{
  /**
   * Creates a customer for zero-touch enrollment. After the method returns
   * successfully, admin and owner roles can manage devices and EMM configs by
   * calling API methods or using their zero-touch enrollment portal. The API
   * doesn't notify the customer that they have access. (customers.create)
   *
   * @param string $parent Required. The parent resource ID in format
   * `partners/[PARTNER_ID]` that identifies the reseller.
   * @param Google_Service_AndroidProvisioningPartner_CreateCustomerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Company
   */
  public function create($parent, Google_Service_AndroidProvisioningPartner_CreateCustomerRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AndroidProvisioningPartner_Company");
  }
  /**
   * Lists the customers that are enrolled to the reseller identified by the
   * `partnerId` argument. This list includes customers that the reseller created
   * and customers that enrolled themselves using the portal.
   * (customers.listPartnersCustomers)
   *
   * @param string $partnerId The ID of the partner.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_ListCustomersResponse
   */
  public function listPartnersCustomers($partnerId, $optParams = array())
  {
    $params = array('partnerId' => $partnerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidProvisioningPartner_ListCustomersResponse");
  }
}
