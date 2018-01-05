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

class Google_Service_Genomics_MergeVariantsRequest extends Google_Collection
{
  protected $collection_key = 'variants';
  public $infoMergeConfig;
  public $variantSetId;
  protected $variantsType = 'Google_Service_Genomics_Variant';
  protected $variantsDataType = 'array';

  public function setInfoMergeConfig($infoMergeConfig)
  {
    $this->infoMergeConfig = $infoMergeConfig;
  }
  public function getInfoMergeConfig()
  {
    return $this->infoMergeConfig;
  }
  public function setVariantSetId($variantSetId)
  {
    $this->variantSetId = $variantSetId;
  }
  public function getVariantSetId()
  {
    return $this->variantSetId;
  }
  /**
   * @param Google_Service_Genomics_Variant
   */
  public function setVariants($variants)
  {
    $this->variants = $variants;
  }
  /**
   * @return Google_Service_Genomics_Variant
   */
  public function getVariants()
  {
    return $this->variants;
  }
}
