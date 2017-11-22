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
 * The "companies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $companies = $partnersService->companies;
 *  </code>
 */
class Google_Service_Partners_Resource_Companies extends Google_Service_Resource
{
  /**
   * Gets a company. (companies.get)
   *
   * @param string $companyId The ID of the company to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string view The view of `Company` resource to be returned. This
   * must not be `COMPANY_VIEW_UNSPECIFIED`.
   * @opt_param string address The address to use for sorting the company's
   * addresses by proximity. If not given, the geo-located address of the request
   * is used. Used when order_by is set.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string currencyCode If the company's budget is in a different
   * currency code than this one, then the converted budget is converted to this
   * currency code.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string orderBy How to order addresses within the returned company.
   * Currently, only `address` and `address desc` is supported which will sorted
   * by closest to farthest in distance from given address and farthest to closest
   * distance from given address respectively.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @return Google_Service_Partners_GetCompanyResponse
   */
  public function get($companyId, $optParams = array())
  {
    $params = array('companyId' => $companyId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Partners_GetCompanyResponse");
  }
  /**
   * Lists companies. (companies.listCompanies)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int minMonthlyBudget.nanos Number of nano (10^-9) units of the
   * amount. The value must be between -999,999,999 and +999,999,999 inclusive. If
   * `units` is positive, `nanos` must be positive or zero. If `units` is zero,
   * `nanos` can be positive, zero, or negative. If `units` is negative, `nanos`
   * must be negative or zero. For example $-1.75 is represented as `units`=-1 and
   * `nanos`=-750,000,000.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string companyName Company name to search for.
   * @opt_param string pageToken A token identifying a page of results that the
   * server returns. Typically, this is the value of
   * `ListCompaniesResponse.next_page_token` returned from the previous call to
   * ListCompanies.
   * @opt_param string industries List of industries the company can help with.
   * @opt_param string websiteUrl Website URL that will help to find a better
   * matched company. .
   * @opt_param string gpsMotivations List of reasons for using Google Partner
   * Search to get companies.
   * @opt_param string languageCodes List of language codes that company can
   * support. Only primary language subtags are accepted as defined by BCP 47
   * (IETF BCP 47, "Tags for Identifying Languages").
   * @opt_param int pageSize Requested page size. Server may return fewer
   * companies than requested. If unspecified, server picks an appropriate
   * default.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string orderBy How to order addresses within the returned
   * companies. Currently, only `address` and `address desc` is supported which
   * will sorted by closest to farthest in distance from given address and
   * farthest to closest distance from given address respectively.
   * @opt_param string specializations List of specializations that the returned
   * agencies should provide. If this is not empty, any returned agency must have
   * at least one of these specializations, or one of the services in the
   * "services" field.
   * @opt_param string maxMonthlyBudget.currencyCode The 3-letter currency code
   * defined in ISO 4217.
   * @opt_param string minMonthlyBudget.currencyCode The 3-letter currency code
   * defined in ISO 4217.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string view The view of the `Company` resource to be returned.
   * This must not be `COMPANY_VIEW_UNSPECIFIED`.
   * @opt_param string address The address to use when searching for companies. If
   * not given, the geo-located address of the request is used.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string minMonthlyBudget.units The whole units of the amount. For
   * example if `currencyCode` is `"USD"`, then 1 unit is one US dollar.
   * @opt_param int maxMonthlyBudget.nanos Number of nano (10^-9) units of the
   * amount. The value must be between -999,999,999 and +999,999,999 inclusive. If
   * `units` is positive, `nanos` must be positive or zero. If `units` is zero,
   * `nanos` can be positive, zero, or negative. If `units` is negative, `nanos`
   * must be negative or zero. For example $-1.75 is represented as `units`=-1 and
   * `nanos`=-750,000,000.
   * @opt_param string services List of services that the returned agencies should
   * provide. If this is not empty, any returned agency must have at least one of
   * these services, or one of the specializations in the "specializations" field.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string maxMonthlyBudget.units The whole units of the amount. For
   * example if `currencyCode` is `"USD"`, then 1 unit is one US dollar.
   * @return Google_Service_Partners_ListCompaniesResponse
   */
  public function listCompanies($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Partners_ListCompaniesResponse");
  }
}
