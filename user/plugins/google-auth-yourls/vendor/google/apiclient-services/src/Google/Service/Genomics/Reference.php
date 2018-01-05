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

class Google_Service_Genomics_Reference extends Google_Collection
{
  protected $collection_key = 'sourceAccessions';
  public $id;
  public $length;
  public $md5checksum;
  public $name;
  public $ncbiTaxonId;
  public $sourceAccessions;
  public $sourceUri;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  public function setMd5checksum($md5checksum)
  {
    $this->md5checksum = $md5checksum;
  }
  public function getMd5checksum()
  {
    return $this->md5checksum;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNcbiTaxonId($ncbiTaxonId)
  {
    $this->ncbiTaxonId = $ncbiTaxonId;
  }
  public function getNcbiTaxonId()
  {
    return $this->ncbiTaxonId;
  }
  public function setSourceAccessions($sourceAccessions)
  {
    $this->sourceAccessions = $sourceAccessions;
  }
  public function getSourceAccessions()
  {
    return $this->sourceAccessions;
  }
  public function setSourceUri($sourceUri)
  {
    $this->sourceUri = $sourceUri;
  }
  public function getSourceUri()
  {
    return $this->sourceUri;
  }
}
