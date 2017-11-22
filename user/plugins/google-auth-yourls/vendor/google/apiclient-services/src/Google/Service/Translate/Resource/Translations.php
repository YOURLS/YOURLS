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
 * The "translations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $translations = $translateService->translations;
 *  </code>
 */
class Google_Service_Translate_Resource_Translations extends Google_Service_Resource
{
  /**
   * Translates input text, returning translated text.
   * (translations.listTranslations)
   *
   * @param string|array $q The input text to translate. Repeat this parameter to
   * perform translation operations on multiple text inputs.
   * @param string $target The language to use for translation of the input text,
   * set to one of the language codes listed in Language Support.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string model The `model` type requested for this translation.
   * Valid values are listed in public documentation.
   * @opt_param string source The language of the source text, set to one of the
   * language codes listed in Language Support. If the source language is not
   * specified, the API will attempt to identify the source language automatically
   * and return it within the response.
   * @opt_param string cid The customization id for translate
   * @opt_param string format The format of the source text, in either HTML
   * (default) or plain-text. A value of "html" indicates HTML and a value of
   * "text" indicates plain-text.
   * @return Google_Service_Translate_TranslationsListResponse
   */
  public function listTranslations($q, $target, $optParams = array())
  {
    $params = array('q' => $q, 'target' => $target);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Translate_TranslationsListResponse");
  }
  /**
   * Translates input text, returning translated text. (translations.translate)
   *
   * @param Google_Service_Translate_TranslateTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_TranslationsListResponse
   */
  public function translate(Google_Service_Translate_TranslateTextRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('translate', array($params), "Google_Service_Translate_TranslationsListResponse");
  }
}
