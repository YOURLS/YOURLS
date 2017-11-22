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

class Google_Service_Sheets_FindReplaceResponse extends Google_Model
{
  public $formulasChanged;
  public $occurrencesChanged;
  public $rowsChanged;
  public $sheetsChanged;
  public $valuesChanged;

  public function setFormulasChanged($formulasChanged)
  {
    $this->formulasChanged = $formulasChanged;
  }
  public function getFormulasChanged()
  {
    return $this->formulasChanged;
  }
  public function setOccurrencesChanged($occurrencesChanged)
  {
    $this->occurrencesChanged = $occurrencesChanged;
  }
  public function getOccurrencesChanged()
  {
    return $this->occurrencesChanged;
  }
  public function setRowsChanged($rowsChanged)
  {
    $this->rowsChanged = $rowsChanged;
  }
  public function getRowsChanged()
  {
    return $this->rowsChanged;
  }
  public function setSheetsChanged($sheetsChanged)
  {
    $this->sheetsChanged = $sheetsChanged;
  }
  public function getSheetsChanged()
  {
    return $this->sheetsChanged;
  }
  public function setValuesChanged($valuesChanged)
  {
    $this->valuesChanged = $valuesChanged;
  }
  public function getValuesChanged()
  {
    return $this->valuesChanged;
  }
}
