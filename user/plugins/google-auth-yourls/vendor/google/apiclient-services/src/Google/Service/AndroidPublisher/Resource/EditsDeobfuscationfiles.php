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
 * The "deobfuscationfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $deobfuscationfiles = $androidpublisherService->deobfuscationfiles;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsDeobfuscationfiles extends Google_Service_Resource
{
  /**
   * Uploads the deobfuscation file of the specified APK. If a deobfuscation file
   * already exists, it will be replaced. (deobfuscationfiles.upload)
   *
   * @param string $packageName Unique identifier of the Android app for which the
   * deobfuscatiuon files are being uploaded; for example, "com.spiffygame".
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose deobfuscation
   * file is being uploaded.
   * @param string $deobfuscationFileType
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_DeobfuscationFilesUploadResponse
   */
  public function upload($packageName, $editId, $apkVersionCode, $deobfuscationFileType, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'deobfuscationFileType' => $deobfuscationFileType);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_AndroidPublisher_DeobfuscationFilesUploadResponse");
  }
}
