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
 * The "readingpositions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $readingpositions = $booksService->readingpositions;
 *  </code>
 */
class Google_Service_Books_Resource_MylibraryReadingpositions extends Google_Service_Resource
{
  /**
   * Retrieves my reading position information for a volume.
   * (readingpositions.get)
   *
   * @param string $volumeId ID of volume for which to retrieve a reading
   * position.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string contentVersion Volume content version for which this
   * reading position is requested.
   * @opt_param string source String to identify the originator of this request.
   * @return Google_Service_Books_ReadingPosition
   */
  public function get($volumeId, $optParams = array())
  {
    $params = array('volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_ReadingPosition");
  }
  /**
   * Sets my reading position information for a volume.
   * (readingpositions.setPosition)
   *
   * @param string $volumeId ID of volume for which to update the reading
   * position.
   * @param string $timestamp RFC 3339 UTC format timestamp associated with this
   * reading position.
   * @param string $position Position string for the new volume reading position.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Action that caused this reading position to be set.
   * @opt_param string contentVersion Volume content version for which this
   * reading position applies.
   * @opt_param string deviceCookie Random persistent device cookie optional on
   * set position.
   * @opt_param string source String to identify the originator of this request.
   */
  public function setPosition($volumeId, $timestamp, $position, $optParams = array())
  {
    $params = array('volumeId' => $volumeId, 'timestamp' => $timestamp, 'position' => $position);
    $params = array_merge($params, $optParams);
    return $this->call('setPosition', array($params));
  }
}
