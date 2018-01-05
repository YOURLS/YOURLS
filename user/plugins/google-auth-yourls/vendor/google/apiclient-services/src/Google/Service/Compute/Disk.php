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

class Google_Service_Compute_Disk extends Google_Collection
{
  protected $collection_key = 'users';
  public $creationTimestamp;
  public $description;
  protected $diskEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $diskEncryptionKeyDataType = '';
  public $id;
  public $kind;
  public $labelFingerprint;
  public $labels;
  public $lastAttachTimestamp;
  public $lastDetachTimestamp;
  public $licenses;
  public $name;
  public $options;
  public $selfLink;
  public $sizeGb;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceImageId;
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceSnapshotEncryptionKeyDataType = '';
  public $sourceSnapshotId;
  public $status;
  public $type;
  public $users;
  public $zone;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastAttachTimestamp($lastAttachTimestamp)
  {
    $this->lastAttachTimestamp = $lastAttachTimestamp;
  }
  public function getLastAttachTimestamp()
  {
    return $this->lastAttachTimestamp;
  }
  public function setLastDetachTimestamp($lastDetachTimestamp)
  {
    $this->lastDetachTimestamp = $lastDetachTimestamp;
  }
  public function getLastDetachTimestamp()
  {
    return $this->lastDetachTimestamp;
  }
  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }
  public function getLicenses()
  {
    return $this->licenses;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }
  public function getSizeGb()
  {
    return $this->sizeGb;
  }
  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }
  public function getSourceImage()
  {
    return $this->sourceImage;
  }
  /**
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceImageEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceImageEncryptionKey)
  {
    $this->sourceImageEncryptionKey = $sourceImageEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
   */
  public function getSourceImageEncryptionKey()
  {
    return $this->sourceImageEncryptionKey;
  }
  public function setSourceImageId($sourceImageId)
  {
    $this->sourceImageId = $sourceImageId;
  }
  public function getSourceImageId()
  {
    return $this->sourceImageId;
  }
  public function setSourceSnapshot($sourceSnapshot)
  {
    $this->sourceSnapshot = $sourceSnapshot;
  }
  public function getSourceSnapshot()
  {
    return $this->sourceSnapshot;
  }
  /**
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceSnapshotEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceSnapshotEncryptionKey)
  {
    $this->sourceSnapshotEncryptionKey = $sourceSnapshotEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
   */
  public function getSourceSnapshotEncryptionKey()
  {
    return $this->sourceSnapshotEncryptionKey;
  }
  public function setSourceSnapshotId($sourceSnapshotId)
  {
    $this->sourceSnapshotId = $sourceSnapshotId;
  }
  public function getSourceSnapshotId()
  {
    return $this->sourceSnapshotId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUsers($users)
  {
    $this->users = $users;
  }
  public function getUsers()
  {
    return $this->users;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}
