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
 * The "speech" collection of methods.
 * Typical usage is:
 *  <code>
 *   $speechService = new Google_Service_CloudSpeechAPI(...);
 *   $speech = $speechService->speech;
 *  </code>
 */
class Google_Service_CloudSpeechAPI_Resource_Speech extends Google_Service_Resource
{
  /**
   * Perform asynchronous speech-recognition: receive results via the
   * google.longrunning.Operations interface. Returns either an `Operation.error`
   * or an `Operation.response` which contains an `AsyncRecognizeResponse`
   * message. (speech.asyncrecognize)
   *
   * @param Google_Service_CloudSpeechAPI_AsyncRecognizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSpeechAPI_Operation
   */
  public function asyncrecognize(Google_Service_CloudSpeechAPI_AsyncRecognizeRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('asyncrecognize', array($params), "Google_Service_CloudSpeechAPI_Operation");
  }
  /**
   * Perform synchronous speech-recognition: receive results after all audio has
   * been sent and processed. (speech.syncrecognize)
   *
   * @param Google_Service_CloudSpeechAPI_SyncRecognizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudSpeechAPI_SyncRecognizeResponse
   */
  public function syncrecognize(Google_Service_CloudSpeechAPI_SyncRecognizeRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('syncrecognize', array($params), "Google_Service_CloudSpeechAPI_SyncRecognizeResponse");
  }
}
