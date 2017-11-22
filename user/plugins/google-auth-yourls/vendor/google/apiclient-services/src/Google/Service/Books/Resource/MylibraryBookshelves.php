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
class Google_Service_Books_Resource_MylibraryBookshelves extends Google_Service_Resource
{
  /**
   * Adds a volume to a bookshelf. (bookshelves.addVolume)
   *
   * @param string $shelf ID of bookshelf to which to add a volume.
   * @param string $volumeId ID of volume to add.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string reason The reason for which the book is added to the
   * library.
   * @opt_param string source String to identify the originator of this request.
   */
  public function addVolume($shelf, $volumeId, $optParams = array())
  {
    $params = array('shelf' => $shelf, 'volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('addVolume', array($params));
  }
  /**
   * Clears all volumes from a bookshelf. (bookshelves.clearVolumes)
   *
   * @param string $shelf ID of bookshelf from which to remove a volume.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   */
  public function clearVolumes($shelf, $optParams = array())
  {
    $params = array('shelf' => $shelf);
    $params = array_merge($params, $optParams);
    return $this->call('clearVolumes', array($params));
  }
  /**
   * Retrieves metadata for a specific bookshelf belonging to the authenticated
   * user. (bookshelves.get)
   *
   * @param string $shelf ID of bookshelf to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Bookshelf
   */
  public function get($shelf, $optParams = array())
  {
    $params = array('shelf' => $shelf);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_Bookshelf");
  }
  /**
   * Retrieves a list of bookshelves belonging to the authenticated user.
   * (bookshelves.listMylibraryBookshelves)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_Bookshelves
   */
  public function listMylibraryBookshelves($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Bookshelves");
  }
  /**
   * Moves a volume within a bookshelf. (bookshelves.moveVolume)
   *
   * @param string $shelf ID of bookshelf with the volume.
   * @param string $volumeId ID of volume to move.
   * @param int $volumePosition Position on shelf to move the item (0 puts the
   * item before the current first item, 1 puts it between the first and the
   * second and so on.)
   * @param array $optParams Optional parameters.
   *
   * @opt_param string source String to identify the originator of this request.
   */
  public function moveVolume($shelf, $volumeId, $volumePosition, $optParams = array())
  {
    $params = array('shelf' => $shelf, 'volumeId' => $volumeId, 'volumePosition' => $volumePosition);
    $params = array_merge($params, $optParams);
    return $this->call('moveVolume', array($params));
  }
  /**
   * Removes a volume from a bookshelf. (bookshelves.removeVolume)
   *
   * @param string $shelf ID of bookshelf from which to remove a volume.
   * @param string $volumeId ID of volume to remove.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string reason The reason for which the book is removed from the
   * library.
   * @opt_param string source String to identify the originator of this request.
   */
  public function removeVolume($shelf, $volumeId, $optParams = array())
  {
    $params = array('shelf' => $shelf, 'volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('removeVolume', array($params));
  }
}
