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
 * The "expansionfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $expansionfiles = $androidpublisherService->expansionfiles;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsExpansionfiles extends Google_Service_Resource
{
  /**
   * Fetches the Expansion File configuration for the APK specified.
   * (expansionfiles.get)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose Expansion File
   * configuration is being read or modified.
   * @param string $expansionFileType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ExpansionFile
   */
  public function get($packageName, $editId, $apkVersionCode, $expansionFileType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_ExpansionFile");
  }
  /**
   * Updates the APK's Expansion File configuration to reference another APK's
   * Expansion Files. To add a new Expansion File use the Upload method. This
   * method supports patch semantics. (expansionfiles.patch)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose Expansion File
   * configuration is being read or modified.
   * @param string $expansionFileType
   * @param Google_Service_AndroidPublisher_ExpansionFile $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ExpansionFile
   */
  public function patch($packageName, $editId, $apkVersionCode, $expansionFileType, Google_Service_AndroidPublisher_ExpansionFile $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_ExpansionFile");
  }
  /**
   * Updates the APK's Expansion File configuration to reference another APK's
   * Expansion Files. To add a new Expansion File use the Upload method.
   * (expansionfiles.update)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose Expansion File
   * configuration is being read or modified.
   * @param string $expansionFileType
   * @param Google_Service_AndroidPublisher_ExpansionFile $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ExpansionFile
   */
  public function update($packageName, $editId, $apkVersionCode, $expansionFileType, Google_Service_AndroidPublisher_ExpansionFile $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_ExpansionFile");
  }
  /**
   * Uploads and attaches a new Expansion File to the APK specified.
   * (expansionfiles.upload)
   *
   * @param string $packageName Unique identifier for the Android app that is
   * being updated; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose Expansion File
   * configuration is being read or modified.
   * @param string $expansionFileType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_ExpansionFilesUploadResponse
   */
  public function upload($packageName, $editId, $apkVersionCode, $expansionFileType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'expansionFileType' => $expansionFileType);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_AndroidPublisher_ExpansionFilesUploadResponse");
  }
}
