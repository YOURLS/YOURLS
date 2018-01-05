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
 * The "bookshelves" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $bookshelves = $booksService->bookshelves;
 *  </code>
 */
class Google_Service_Books_Resource_Bookshelves extends Google_Service_Resource
{
  /**
   * Retrieves metadata for a specific bookshelf for the specified user.
   * (bookshelves.get)
   *
   * @param string $userId ID of user for whom to retrieve bookshelves.
   * @param string $shelf ID of bookshelf to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Bookshelf
   */
  public function get($userId, $shelf, $optParams = array())
  {
    $params = array('userId' => $userId, 'shelf' => $shelf);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_Bookshelf");
  }
  /**
   * Retrieves a list of public bookshelves for the specified user.
   * (bookshelves.listBookshelves)
   *
   * @param string $userId ID of user for whom to retrieve bookshelves.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Bookshelves
   */
  public function listBookshelves($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Bookshelves");
  }
}
