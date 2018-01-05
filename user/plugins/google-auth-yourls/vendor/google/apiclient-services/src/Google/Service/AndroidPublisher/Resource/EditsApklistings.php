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
 * The "apklistings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $apklistings = $androidpublisherService->apklistings;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsApklistings extends Google_Service_Resource
{
  /**
   * Deletes the APK-specific localized listing for a specified APK and language
   * code. (apklistings.delete)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param string $language The language code (a BCP-47 language tag) of the APK-
   * specific localized listing to read or modify. For example, to select Austrian
   * German, pass "de-AT".
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $apkVersionCode, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Deletes all the APK-specific localized listings for a specified APK.
   * (apklistings.deleteall)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param array $optParams Optional parameters.
   */
  public function deleteall($packageName, $editId, $apkVersionCode, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode);
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', array($params));
  }
  /**
   * Fetches the APK-specific localized listing for a specified APK and language
   * code. (apklistings.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param string $language The language code (a BCP-47 language tag) of the APK-
   * specific localized listing to read or modify. For example, to select Austrian
   * German, pass "de-AT".
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ApkListing
   */
  public function get($packageName, $editId, $apkVersionCode, $language, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'language' => $language);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_ApkListing");
  }
  /**
   * Lists all the APK-specific localized listings for a specified APK.
   * (apklistings.listEditsApklistings)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ApkListingsListResponse
   */
  public function listEditsApklistings($packageName, $editId, $apkVersionCode, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_ApkListingsListResponse");
  }
  /**
   * Updates or creates the APK-specific localized listing for a specified APK and
   * language code. This method supports patch semantics. (apklistings.patch)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param string $language The language code (a BCP-47 language tag) of the APK-
   * specific localized listing to read or modify. For example, to select Austrian
   * German, pass "de-AT".
   * @param Google_Service_AndroidPublisher_ApkListing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ApkListing
   */
  public function patch($packageName, $editId, $apkVersionCode, $language, Google_Service_AndroidPublisher_ApkListing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_ApkListing");
  }
  /**
   * Updates or creates the APK-specific localized listing for a specified APK and
   * language code. (apklistings.update)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The APK version code whose APK-specific listings
   * should be read or modified.
   * @param string $language The language code (a BCP-47 language tag) of the APK-
   * specific localized listing to read or modify. For example, to select Austrian
   * German, pass "de-AT".
   * @param Google_Service_AndroidPublisher_ApkListing $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ApkListing
   */
  public function update($packageName, $editId, $apkVersionCode, $language, Google_Service_AndroidPublisher_ApkListing $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'language' => $language, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_ApkListing");
  }
}
