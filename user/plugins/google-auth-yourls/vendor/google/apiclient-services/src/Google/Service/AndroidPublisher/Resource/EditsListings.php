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
 * The "listings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $listings = $androidpublisherService->listings;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsListings extends Google_Service_Resource
{
  /**
   * Deletes the specified localized store listing from an edit. (listings.delete)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing to read or modify. For example, to select Austrian German,
   * pass "de-AT".
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Deletes all localized listings from an edit. (listings.deleteall)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   */
  public function deleteall($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', array($params));
  }
  /**
   * Fetches information about a localized store listing. (listings.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing to read or modify. For example, to select Austrian German,
   * pass "de-AT".
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function get($packageName, $editId, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_Listing");
  }
  /**
   * Returns all of the localized store listings attached to this edit.
   * (listings.listEditsListings)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ListingsListResponse
   */
  public function listEditsListings($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_ListingsListResponse");
  }
  /**
   * Creates or updates a localized store listing. This method supports patch
   * semantics. (listings.patch)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing to read or modify. For example, to select Austrian German,
   * pass "de-AT".
   * @param Google_Service_AndroidPublisher_Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function patch($packageName, $editId, $language, Google_Service_AndroidPublisher_Listing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_Listing");
  }
  /**
   * Creates or updates a localized store listing. (listings.update)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param string $language The language code (a BCP-47 language tag) of the
   * localized listing to read or modify. For example, to select Austrian German,
   * pass "de-AT".
   * @param Google_Service_AndroidPublisher_Listing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Listing
   */
  public function update($packageName, $editId, $language, Google_Service_AndroidPublisher_Listing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_Listing");
  }
}
