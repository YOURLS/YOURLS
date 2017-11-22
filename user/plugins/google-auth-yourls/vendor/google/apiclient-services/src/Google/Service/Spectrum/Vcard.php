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

class Google_Service_Spectrum_Vcard extends Google_Model
{
  protected $adrType = 'Google_Service_Spectrum_VcardAddress';
  protected $adrDataType = '';
  protected $emailType = 'Google_Service_Spectrum_VcardTypedText';
  protected $emailDataType = '';
  public $fn;
  protected $orgType = 'Google_Service_Spectrum_VcardTypedText';
  protected $orgDataType = '';
  protected $telType = 'Google_Service_Spectrum_VcardTelephone';
  protected $telDataType = '';

  /**
   * @param Google_Service_Spectrum_VcardAddress
   */
  public function setAdr(Google_Service_Spectrum_VcardAddress $adr)
  {
    $this->adr = $adr;
  }
  /**
   * @return Google_Service_Spectrum_VcardAddress
   */
  public function getAdr()
  {
    return $this->adr;
  }
  /**
   * @param Google_Service_Spectrum_VcardTypedText
   */
  public function setEmail(Google_Service_Spectrum_VcardTypedText $email)
  {
    $this->email = $email;
  }
  /**
   * @return Google_Service_Spectrum_VcardTypedText
   */
  public function getEmail()
  {
    return $this->email;
  }
  public function setFn($fn)
  {
    $this->fn = $fn;
  }
  public function getFn()
  {
    return $this->fn;
  }
  /**
   * @param Google_Service_Spectrum_VcardTypedText
   */
  public function setOrg(Google_Service_Spectrum_VcardTypedText $org)
  {
    $this->org = $org;
  }
  /**
   * @return Google_Service_Spectrum_VcardTypedText
   */
  public function getOrg()
  {
    return $this->org;
  }
  /**
   * @param Google_Service_Spectrum_VcardTelephone
   */
  public function setTel(Google_Service_Spectrum_VcardTelephone $tel)
  {
    $this->tel = $tel;
  }
  /**
   * @return Google_Service_Spectrum_VcardTelephone
   */
  public function getTel()
  {
    return $this->tel;
  }
}
