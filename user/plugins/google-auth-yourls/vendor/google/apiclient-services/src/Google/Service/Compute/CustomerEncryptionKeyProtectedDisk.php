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

class Google_Service_Compute_CustomerEncryptionKeyProtectedDisk extends Google_Model
{
  protected $diskEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $diskEncryptionKeyDataType = '';
  public $source;

  /**
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setDiskEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $diskEncryptionKey)
  {
    $this->diskEncryptionKey = $diskEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
   */
  public function getDiskEncryptionKey()
  {
    return $this->diskEncryptionKey;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
}
