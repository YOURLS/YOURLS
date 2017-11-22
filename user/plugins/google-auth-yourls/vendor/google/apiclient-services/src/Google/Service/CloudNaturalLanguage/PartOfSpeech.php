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

class Google_Service_CloudNaturalLanguage_PartOfSpeech extends Google_Model
{
  public $aspect;
  public $case;
  public $form;
  public $gender;
  public $mood;
  public $number;
  public $person;
  public $proper;
  public $reciprocity;
  public $tag;
  public $tense;
  public $voice;

  public function setAspect($aspect)
  {
    $this->aspect = $aspect;
  }
  public function getAspect()
  {
    return $this->aspect;
  }
  public function setCase($case)
  {
    $this->case = $case;
  }
  public function getCase()
  {
    return $this->case;
  }
  public function setForm($form)
  {
    $this->form = $form;
  }
  public function getForm()
  {
    return $this->form;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function getGender()
  {
    return $this->gender;
  }
  public function setMood($mood)
  {
    $this->mood = $mood;
  }
  public function getMood()
  {
    return $this->mood;
  }
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
  }
  public function setPerson($person)
  {
    $this->person = $person;
  }
  public function getPerson()
  {
    return $this->person;
  }
  public function setProper($proper)
  {
    $this->proper = $proper;
  }
  public function getProper()
  {
    return $this->proper;
  }
  public function setReciprocity($reciprocity)
  {
    $this->reciprocity = $reciprocity;
  }
  public function getReciprocity()
  {
    return $this->reciprocity;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
  public function setTense($tense)
  {
    $this->tense = $tense;
  }
  public function getTense()
  {
    return $this->tense;
  }
  public function setVoice($voice)
  {
    $this->voice = $voice;
  }
  public function getVoice()
  {
    return $this->voice;
  }
}
