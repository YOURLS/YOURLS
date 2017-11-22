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

class Google_Service_Oauth2_JwkKeys extends Google_Model
{
  public $alg;
  public $e;
  public $kid;
  public $kty;
  public $n;
  public $use;

  public function setAlg($alg)
  {
    $this->alg = $alg;
  }
  public function getAlg()
  {
    return $this->alg;
  }
  public function setE($e)
  {
    $this->e = $e;
  }
  public function getE()
  {
    return $this->e;
  }
  public function setKid($kid)
  {
    $this->kid = $kid;
  }
  public function getKid()
  {
    return $this->kid;
  }
  public function setKty($kty)
  {
    $this->kty = $kty;
  }
  public function getKty()
  {
    return $this->kty;
  }
  public function setN($n)
  {
    $this->n = $n;
  }
  public function getN()
  {
    return $this->n;
  }
  public function setUse($use)
  {
    $this->use = $use;
  }
  public function getUse()
  {
    return $this->use;
  }
}
