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
 * The "registrations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $registrations = $classroomService->registrations;
 *  </code>
 */
class Google_Service_Classroom_Resource_Registrations extends Google_Service_Resource
{
  /**
   * Creates a `Registration`, causing Classroom to start sending notifications
   * from the provided `feed` to the provided `destination`.
   *
   * Returns the created `Registration`. Currently, this will be the same as the
   * argument, but with server-assigned fields such as `expiry_time` and `id`
   * filled in.
   *
   * Note that any value specified for the `expiry_time` or `id` fields will be
   * ignored.
   *
   * While Classroom may validate the `destination` and return errors on a best
   * effort basis, it is the caller's responsibility to ensure that it exists and
   * that Classroom has permission to publish to it.
   *
   * This method may return the following error codes:
   *
   * * `PERMISSION_DENIED` if:     * the authenticated user does not have
   * permission to receive       notifications from the requested field; or     *
   * the credential provided does not include the appropriate scope for the
   * requested feed.     * another access error is encountered. *
   * `INVALID_ARGUMENT` if:     * no `destination` is specified, or the specified
   * `destination` is not       valid; or     * no `feed` is specified, or the
   * specified `feed` is not valid. * `NOT_FOUND` if:     * the specified `feed`
   * cannot be located, or the requesting user does not       have permission to
   * determine whether or not it exists; or     * the specified `destination`
   * cannot be located, or Classroom has not       been granted permission to
   * publish to it. (registrations.create)
   *
   * @param Google_Service_Classroom_Registration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Registration
   */
  public function create(Google_Service_Classroom_Registration $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Registration");
  }
  /**
   * Deletes a `Registration`, causing Classroom to stop sending notifications for
   * that `Registration`. (registrations.delete)
   *
   * @param string $registrationId The `registration_id` of the `Registration` to
   * be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function delete($registrationId, $optParams = array())
  {
    $params = array('registrationId' => $registrationId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
}
