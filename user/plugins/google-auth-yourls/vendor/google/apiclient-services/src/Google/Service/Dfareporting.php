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
 * Service definition for Dfareporting (v3.0).
 *
 * <p>
 * Manages your DoubleClick Campaign Manager ad campaigns and reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/doubleclick-advertisers/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dfareporting extends Google_Service
{
  /** Manage DoubleClick Digital Marketing conversions. */
  const DDMCONVERSIONS =
      "https://www.googleapis.com/auth/ddmconversions";
  /** View and manage DoubleClick for Advertisers reports. */
  const DFAREPORTING =
      "https://www.googleapis.com/auth/dfareporting";
  /** View and manage your DoubleClick Campaign Manager's (DCM) display ad campaigns. */
  const DFATRAFFICKING =
      "https://www.googleapis.com/auth/dfatrafficking";

  public $accountActiveAdSummaries;
  public $accountPermissionGroups;
  public $accountPermissions;
  public $accountUserProfiles;
  public $accounts;
  public $ads;
  public $advertiserGroups;
  public $advertiserLandingPages;
  public $advertisers;
  public $browsers;
  public $campaignCreativeAssociations;
  public $campaigns;
  public $changeLogs;
  public $cities;
  public $connectionTypes;
  public $contentCategories;
  public $conversions;
  public $countries;
  public $creativeAssets;
  public $creativeFieldValues;
  public $creativeFields;
  public $creativeGroups;
  public $creatives;
  public $dimensionValues;
  public $directorySiteContacts;
  public $directorySites;
  public $dynamicTargetingKeys;
  public $eventTags;
  public $files;
  public $floodlightActivities;
  public $floodlightActivityGroups;
  public $floodlightConfigurations;
  public $inventoryItems;
  public $languages;
  public $metros;
  public $mobileCarriers;
  public $operatingSystemVersions;
  public $operatingSystems;
  public $orderDocuments;
  public $orders;
  public $placementGroups;
  public $placementStrategies;
  public $placements;
  public $platformTypes;
  public $postalCodes;
  public $projects;
  public $regions;
  public $remarketingListShares;
  public $remarketingLists;
  public $reports;
  public $reports_compatibleFields;
  public $reports_files;
  public $sites;
  public $sizes;
  public $subaccounts;
  public $targetableRemarketingLists;
  public $targetingTemplates;
  public $userProfiles;
  public $userRolePermissionGroups;
  public $userRolePermissions;
  public $userRoles;
  public $videoFormats;
  
  /**
   * Constructs the internal representation of the Dfareporting service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = 'https://www.googleapis.com/';
    $this->servicePath = 'dfareporting/v3.0/';
    $this->version = 'v3.0';
    $this->serviceName = 'dfareporting';

    $this->accountActiveAdSummaries = new Google_Service_Dfareporting_Resource_AccountActiveAdSummaries(
        $this,
        $this->serviceName,
        'accountActiveAdSummaries',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/accountActiveAdSummaries/{summaryAccountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'summaryAccountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accountPermissionGroups = new Google_Service_Dfareporting_Resource_AccountPermissionGroups(
        $this,
        $this->serviceName,
        'accountPermissionGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/accountPermissionGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/accountPermissionGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accountPermissions = new Google_Service_Dfareporting_Resource_AccountPermissions(
        $this,
        $this->serviceName,
        'accountPermissions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/accountPermissions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/accountPermissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accountUserProfiles = new Google_Service_Dfareporting_Resource_AccountUserProfiles(
        $this,
        $this->serviceName,
        'accountUserProfiles',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/accountUserProfiles/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userRoleId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/accountUserProfiles',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts = new Google_Service_Dfareporting_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/accounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/accounts',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/accounts',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->ads = new Google_Service_Dfareporting_Resource_Ads(
        $this,
        $this->serviceName,
        'ads',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/ads/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/ads',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/ads',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'audienceSegmentIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'campaignIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'compatibility' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creativeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'creativeOptimizationConfigurationIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'dynamicClickTracker' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'landingPageIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'overriddenEventTagId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placementIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'remarketingListIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sizeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sslCompliant' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'sslRequired' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/ads',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/ads',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->advertiserGroups = new Google_Service_Dfareporting_Resource_AdvertiserGroups(
        $this,
        $this->serviceName,
        'advertiserGroups',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/advertiserGroups',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->advertiserLandingPages = new Google_Service_Dfareporting_Resource_AdvertiserLandingPages(
        $this,
        $this->serviceName,
        'advertiserLandingPages',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/advertiserLandingPages/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/advertiserLandingPages',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->advertisers = new Google_Service_Dfareporting_Resource_Advertisers(
        $this,
        $this->serviceName,
        'advertisers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/advertisers/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/advertisers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/advertisers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserGroupIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'floodlightConfigurationIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'includeAdvertisersWithoutGroupsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'onlyParent' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/advertisers',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/advertisers',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->browsers = new Google_Service_Dfareporting_Resource_Browsers(
        $this,
        $this->serviceName,
        'browsers',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'userprofiles/{profileId}/browsers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->campaignCreativeAssociations = new Google_Service_Dfareporting_Resource_CampaignCreativeAssociations(
        $this,
        $this->serviceName,
        'campaignCreativeAssociations',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->campaigns = new Google_Service_Dfareporting_Resource_Campaigns(
        $this,
        $this->serviceName,
        'campaigns',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/campaigns/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/campaigns',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/campaigns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserGroupIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'atLeastOneOptimizationActivity' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'excludedIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'overriddenEventTagId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/campaigns',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/campaigns',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->changeLogs = new Google_Service_Dfareporting_Resource_ChangeLogs(
        $this,
        $this->serviceName,
        'changeLogs',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/changeLogs/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/changeLogs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'action' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxChangeTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'minChangeTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'objectIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'objectType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProfileIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->cities = new Google_Service_Dfareporting_Resource_Cities(
        $this,
        $this->serviceName,
        'cities',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'userprofiles/{profileId}/cities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'countryDartIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'dartIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'namePrefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'regionDartIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->connectionTypes = new Google_Service_Dfareporting_Resource_ConnectionTypes(
        $this,
        $this->serviceName,
        'connectionTypes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/connectionTypes/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/connectionTypes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->contentCategories = new Google_Service_Dfareporting_Resource_ContentCategories(
        $this,
        $this->serviceName,
        'contentCategories',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/contentCategories/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/contentCategories/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/contentCategories',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->conversions = new Google_Service_Dfareporting_Resource_Conversions(
        $this,
        $this->serviceName,
        'conversions',
        array(
          'methods' => array(
            'batchinsert' => array(
              'path' => 'userprofiles/{profileId}/conversions/batchinsert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchupdate' => array(
              'path' => 'userprofiles/{profileId}/conversions/batchupdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->countries = new Google_Service_Dfareporting_Resource_Countries(
        $this,
        $this->serviceName,
        'countries',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/countries/{dartId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dartId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/countries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creativeAssets = new Google_Service_Dfareporting_Resource_CreativeAssets(
        $this,
        $this->serviceName,
        'creativeAssets',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'userprofiles/{profileId}/creativeAssets/{advertiserId}/creativeAssets',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creativeFieldValues = new Google_Service_Dfareporting_Resource_CreativeFieldValues(
        $this,
        $this->serviceName,
        'creativeFieldValues',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creativeFieldId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creativeFields = new Google_Service_Dfareporting_Resource_CreativeFields(
        $this,
        $this->serviceName,
        'creativeFields',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/creativeFields/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/creativeFields',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creativeGroups = new Google_Service_Dfareporting_Resource_CreativeGroups(
        $this,
        $this->serviceName,
        'creativeGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/creativeGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'groupNumber' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/creativeGroups',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->creatives = new Google_Service_Dfareporting_Resource_Creatives(
        $this,
        $this->serviceName,
        'creatives',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/creatives/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'campaignId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'companionCreativeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'creativeFieldIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'renderingIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sizeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'studioCreativeId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'types' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/creatives',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/creatives',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->dimensionValues = new Google_Service_Dfareporting_Resource_DimensionValues(
        $this,
        $this->serviceName,
        'dimensionValues',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'userprofiles/{profileId}/dimensionvalues/query',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->directorySiteContacts = new Google_Service_Dfareporting_Resource_DirectorySiteContacts(
        $this,
        $this->serviceName,
        'directorySiteContacts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/directorySiteContacts/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/directorySiteContacts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'directorySiteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->directorySites = new Google_Service_Dfareporting_Resource_DirectorySites(
        $this,
        $this->serviceName,
        'directorySites',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/directorySites/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/directorySites',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/directorySites',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acceptsInStreamVideoPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'acceptsInterstitialPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'acceptsPublisherPaidPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'countryId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dfpNetworkCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->dynamicTargetingKeys = new Google_Service_Dfareporting_Resource_DynamicTargetingKeys(
        $this,
        $this->serviceName,
        'dynamicTargetingKeys',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/dynamicTargetingKeys/{objectId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'objectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'objectType' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/dynamicTargetingKeys',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/dynamicTargetingKeys',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'names' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'objectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'objectType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->eventTags = new Google_Service_Dfareporting_Resource_EventTags(
        $this,
        $this->serviceName,
        'eventTags',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/eventTags/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/eventTags/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/eventTags',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/eventTags',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'adId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'campaignId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'definitionsOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'enabled' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'eventTagTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/eventTags',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/eventTags',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->files = new Google_Service_Dfareporting_Resource_Files(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'reports/{reportId}/files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/files',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scope' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->floodlightActivities = new Google_Service_Dfareporting_Resource_FloodlightActivities(
        $this,
        $this->serviceName,
        'floodlightActivities',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'generatetag' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities/generatetag',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'floodlightActivityId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'floodlightActivityGroupIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'floodlightActivityGroupName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'floodlightActivityGroupTagString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'floodlightActivityGroupType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'floodlightConfigurationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tagString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivities',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->floodlightActivityGroups = new Google_Service_Dfareporting_Resource_FloodlightActivityGroups(
        $this,
        $this->serviceName,
        'floodlightActivityGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivityGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'floodlightConfigurationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->floodlightConfigurations = new Google_Service_Dfareporting_Resource_FloodlightConfigurations(
        $this,
        $this->serviceName,
        'floodlightConfigurations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/floodlightConfigurations/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/floodlightConfigurations',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->inventoryItems = new Google_Service_Dfareporting_Resource_InventoryItems(
        $this,
        $this->serviceName,
        'inventoryItems',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/inventoryItems/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/inventoryItems',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'inPlan' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->languages = new Google_Service_Dfareporting_Resource_Languages(
        $this,
        $this->serviceName,
        'languages',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'userprofiles/{profileId}/languages',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->metros = new Google_Service_Dfareporting_Resource_Metros(
        $this,
        $this->serviceName,
        'metros',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'userprofiles/{profileId}/metros',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->mobileCarriers = new Google_Service_Dfareporting_Resource_MobileCarriers(
        $this,
        $this->serviceName,
        'mobileCarriers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/mobileCarriers/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/mobileCarriers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->operatingSystemVersions = new Google_Service_Dfareporting_Resource_OperatingSystemVersions(
        $this,
        $this->serviceName,
        'operatingSystemVersions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/operatingSystemVersions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/operatingSystemVersions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->operatingSystems = new Google_Service_Dfareporting_Resource_OperatingSystems(
        $this,
        $this->serviceName,
        'operatingSystems',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/operatingSystems/{dartId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dartId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/operatingSystems',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orderDocuments = new Google_Service_Dfareporting_Resource_OrderDocuments(
        $this,
        $this->serviceName,
        'orderDocuments',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/orderDocuments/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/orderDocuments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'approved' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->orders = new Google_Service_Dfareporting_Resource_Orders(
        $this,
        $this->serviceName,
        'orders',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/orders/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/projects/{projectId}/orders',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->placementGroups = new Google_Service_Dfareporting_Resource_PlacementGroups(
        $this,
        $this->serviceName,
        'placementGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/placementGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'campaignIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'contentCategoryIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'directorySiteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placementGroupType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placementStrategyIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pricingTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/placementGroups',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->placementStrategies = new Google_Service_Dfareporting_Resource_PlacementStrategies(
        $this,
        $this->serviceName,
        'placementStrategies',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/placementStrategies',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->placements = new Google_Service_Dfareporting_Resource_Placements(
        $this,
        $this->serviceName,
        'placements',
        array(
          'methods' => array(
            'generatetags' => array(
              'path' => 'userprofiles/{profileId}/placements/generatetags',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'campaignId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placementIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'tagFormats' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/placements/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/placements',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/placements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'archived' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'campaignIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'compatibilities' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'contentCategoryIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'directorySiteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'groupIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'maxStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'paymentSource' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placementStrategyIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'pricingTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'siteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sizeIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/placements',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/placements',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->platformTypes = new Google_Service_Dfareporting_Resource_PlatformTypes(
        $this,
        $this->serviceName,
        'platformTypes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/platformTypes/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/platformTypes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->postalCodes = new Google_Service_Dfareporting_Resource_PostalCodes(
        $this,
        $this->serviceName,
        'postalCodes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/postalCodes/{code}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'code' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/postalCodes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_Dfareporting_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/projects/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/projects',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->regions = new Google_Service_Dfareporting_Resource_Regions(
        $this,
        $this->serviceName,
        'regions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'userprofiles/{profileId}/regions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->remarketingListShares = new Google_Service_Dfareporting_Resource_RemarketingListShares(
        $this,
        $this->serviceName,
        'remarketingListShares',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/remarketingListShares/{remarketingListId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'remarketingListId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/remarketingListShares',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'remarketingListId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/remarketingListShares',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->remarketingLists = new Google_Service_Dfareporting_Resource_RemarketingLists(
        $this,
        $this->serviceName,
        'remarketingLists',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/remarketingLists/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'floodlightActivityId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/remarketingLists',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->reports = new Google_Service_Dfareporting_Resource_Reports(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/reports',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/reports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scope' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'run' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}/run',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'synchronous' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->reports_compatibleFields = new Google_Service_Dfareporting_Resource_ReportsCompatibleFields(
        $this,
        $this->serviceName,
        'compatibleFields',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'userprofiles/{profileId}/reports/compatiblefields/query',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->reports_files = new Google_Service_Dfareporting_Resource_ReportsFiles(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}/files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/reports/{reportId}/files',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'reportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->sites = new Google_Service_Dfareporting_Resource_Sites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/sites/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/sites',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/sites',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acceptsInStreamVideoPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'acceptsInterstitialPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'acceptsPublisherPaidPlacements' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'adWordsSite' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'approved' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'campaignIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'directorySiteIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'unmappedSite' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/sites',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/sites',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->sizes = new Google_Service_Dfareporting_Resource_Sizes(
        $this,
        $this->serviceName,
        'sizes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/sizes/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/sizes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/sizes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'height' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'iabStandard' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'width' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->subaccounts = new Google_Service_Dfareporting_Resource_Subaccounts(
        $this,
        $this->serviceName,
        'subaccounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/subaccounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/subaccounts',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->targetableRemarketingLists = new Google_Service_Dfareporting_Resource_TargetableRemarketingLists(
        $this,
        $this->serviceName,
        'targetableRemarketingLists',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/targetableRemarketingLists/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/targetableRemarketingLists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'active' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'name' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->targetingTemplates = new Google_Service_Dfareporting_Resource_TargetingTemplates(
        $this,
        $this->serviceName,
        'targetingTemplates',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/targetingTemplates/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'advertiserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/targetingTemplates',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->userProfiles = new Google_Service_Dfareporting_Resource_UserProfiles(
        $this,
        $this->serviceName,
        'userProfiles',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->userRolePermissionGroups = new Google_Service_Dfareporting_Resource_UserRolePermissionGroups(
        $this,
        $this->serviceName,
        'userRolePermissionGroups',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/userRolePermissionGroups/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/userRolePermissionGroups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->userRolePermissions = new Google_Service_Dfareporting_Resource_UserRolePermissions(
        $this,
        $this->serviceName,
        'userRolePermissions',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/userRolePermissions/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/userRolePermissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->userRoles = new Google_Service_Dfareporting_Resource_UserRoles(
        $this,
        $this->serviceName,
        'userRoles',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'userprofiles/{profileId}/userRoles/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'userprofiles/{profileId}/userRoles/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'userprofiles/{profileId}/userRoles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/userRoles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountUserRoleOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'ids' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'searchString' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortField' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'subaccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'userprofiles/{profileId}/userRoles',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'userprofiles/{profileId}/userRoles',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->videoFormats = new Google_Service_Dfareporting_Resource_VideoFormats(
        $this,
        $this->serviceName,
        'videoFormats',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'userprofiles/{profileId}/videoFormats/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'userprofiles/{profileId}/videoFormats',
              'httpMethod' => 'GET',
              'parameters' => array(
                'profileId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
