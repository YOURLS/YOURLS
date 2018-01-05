<?php
/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class Google_AuthHandler_AuthHandlerFactory
{
  /**
   * Builds out a default http handler for the installed version of guzzle.
   *
   * @return Google_AuthHandler_Guzzle5AuthHandler|Google_AuthHandler_Guzzle6AuthHandler
   * @throws Exception
   */
  public static function build($cache = null, array $cacheConfig = [])
  {
    $version = ClientInterface::VERSION;

    switch ($version[0]) {
      case '5':
        return new Google_AuthHandler_Guzzle5AuthHandler($cache, $cacheConfig);
      case '6':
        return new Google_AuthHandler_Guzzle6AuthHandler($cache, $cacheConfig);
      default:
        throw new Exception('Version not supported');
    }
  }
}
