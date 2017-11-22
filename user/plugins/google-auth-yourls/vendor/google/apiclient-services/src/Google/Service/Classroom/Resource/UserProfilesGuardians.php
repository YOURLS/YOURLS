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
 * The "guardians" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $guardians = $classroomService->guardians;
 *  </code>
 */
class Google_Service_Classroom_Resource_UserProfilesGuardians extends Google_Service_Resource
{
  /**
   * Deletes a guardian.
   *
   * The guardian will no longer receive guardian notifications and the guardian
   * will no longer be accessible via the API.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if no user that matches the provided `student_id`   is
   * visible to the requesting user, if the requesting user is not   permitted to
   * manage guardians for the student identified by the   `student_id`, if
   * guardians are not enabled for the domain in question,   or for other access
   * errors. * `INVALID_ARGUMENT` if a `student_id` is specified, but its format
   * cannot   be recognized (it is not an email address, nor a `student_id` from
   * the   API). * `NOT_FOUND` if the requesting user is permitted to modify
   * guardians for   the requested `student_id`, but no `Guardian` record exists
   * for that   student with the provided `guardian_id`. (guardians.delete)
   *
   * @param string $studentId The student whose guardian is to be deleted. One of
   * the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user
   * @param string $guardianId The `id` field from a `Guardian`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function delete($studentId, $guardianId, $optParams = array())
  {
    $params = array('studentId' => $studentId, 'guardianId' => $guardianId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
  /**
   * Returns a specific guardian.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if no user that matches the provided `student_id`   is
   * visible to the requesting user, if the requesting user is not   permitted to
   * view guardian information for the student identified by the   `student_id`,
   * if guardians are not enabled for the domain in question,   or for other
   * access errors. * `INVALID_ARGUMENT` if a `student_id` is specified, but its
   * format cannot   be recognized (it is not an email address, nor a `student_id`
   * from the   API, nor the literal string `me`). * `NOT_FOUND` if the requesting
   * user is permitted to view guardians for   the requested `student_id`, but no
   * `Guardian` record exists for that   student that matches the provided
   * `guardian_id`. (guardians.get)
   *
   * @param string $studentId The student whose guardian is being requested. One
   * of the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user
   * @param string $guardianId The `id` field from a `Guardian`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Guardian
   */
  public function get($studentId, $guardianId, $optParams = array())
  {
    $params = array('studentId' => $studentId, 'guardianId' => $guardianId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Guardian");
  }
  /**
   * Returns a list of guardians that the requesting user is permitted to view,
   * restricted to those that match the request.
   *
   * To list guardians for any student that the requesting user may view guardians
   * for, use the literal character `-` for the student ID.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if a `student_id` is specified, and the requesting
   * user is not permitted to view guardian information for that student, if
   * `"-"` is specified as the `student_id` and the user is not a domain
   * administrator, if guardians are not enabled for the domain in question,   if
   * the `invited_email_address` filter is set by a user who is not a   domain
   * administrator, or for other access errors. * `INVALID_ARGUMENT` if a
   * `student_id` is specified, but its format cannot   be recognized (it is not
   * an email address, nor a `student_id` from the   API, nor the literal string
   * `me`). May also be returned if an invalid   `page_token` is provided. *
   * `NOT_FOUND` if a `student_id` is specified, and its format can be
   * recognized, but Classroom has no record of that student.
   * (guardians.listUserProfilesGuardians)
   *
   * @param string $studentId Filter results by the student who the guardian is
   * linked to. The identifier can be one of the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user * the string literal
   * `"-"`, indicating that results should be returned for   all students that the
   * requesting user has access to view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned.
   *
   * The list request must be otherwise identical to the one that resulted in this
   * token.
   * @opt_param string invitedEmailAddress Filter results by the email address
   * that the original invitation was sent to, resulting in this guardian link.
   * This filter can only be used by domain administrators.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum.
   *
   * The server may return fewer than the specified number of results.
   * @return Google_Service_Classroom_ListGuardiansResponse
   */
  public function listUserProfilesGuardians($studentId, $optParams = array())
  {
    $params = array('studentId' => $studentId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListGuardiansResponse");
  }
}
