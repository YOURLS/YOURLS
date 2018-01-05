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
 * The "guardianInvitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $guardianInvitations = $classroomService->guardianInvitations;
 *  </code>
 */
class Google_Service_Classroom_Resource_UserProfilesGuardianInvitations extends Google_Service_Resource
{
  /**
   * Creates a guardian invitation, and sends an email to the guardian asking them
   * to confirm that they are the student's guardian.
   *
   * Once the guardian accepts the invitation, their `state` will change to
   * `COMPLETED` and they will start receiving guardian notifications. A
   * `Guardian` resource will also be created to represent the active guardian.
   *
   * The request object must have the `student_id` and `invited_email_address`
   * fields set. Failing to set these fields, or setting any other fields in the
   * request, will result in an error.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the current user does not have permission to
   * manage guardians, if the guardian in question has already rejected   too many
   * requests for that student, if guardians are not enabled for the   domain in
   * question, or for other access errors. * `RESOURCE_EXHAUSTED` if the student
   * or guardian has exceeded the guardian   link limit. * `INVALID_ARGUMENT` if
   * the guardian email address is not valid (for   example, if it is too long),
   * or if the format of the student ID provided   cannot be recognized (it is not
   * an email address, nor a `user_id` from   this API). This error will also be
   * returned if read-only fields are set,   or if the `state` field is set to to
   * a value other than `PENDING`. * `NOT_FOUND` if the student ID provided is a
   * valid student ID, but   Classroom has no record of that student. *
   * `ALREADY_EXISTS` if there is already a pending guardian invitation for   the
   * student and `invited_email_address` provided, or if the provided
   * `invited_email_address` matches the Google account of an existing
   * `Guardian` for this user. (guardianInvitations.create)
   *
   * @param string $studentId ID of the student (in standard format)
   * @param Google_Service_Classroom_GuardianInvitation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_GuardianInvitation
   */
  public function create($studentId, Google_Service_Classroom_GuardianInvitation $postBody, $optParams = array())
  {
    $params = array('studentId' => $studentId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_GuardianInvitation");
  }
  /**
   * Returns a specific guardian invitation.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to view
   * guardian invitations for the student identified by the `student_id`, if
   * guardians are not enabled for the domain in question, or for other   access
   * errors. * `INVALID_ARGUMENT` if a `student_id` is specified, but its format
   * cannot   be recognized (it is not an email address, nor a `student_id` from
   * the   API, nor the literal string `me`). * `NOT_FOUND` if Classroom cannot
   * find any record of the given student or   `invitation_id`. May also be
   * returned if the student exists, but the   requesting user does not have
   * access to see that student. (guardianInvitations.get)
   *
   * @param string $studentId The ID of the student whose guardian invitation is
   * being requested.
   * @param string $invitationId The `id` field of the `GuardianInvitation` being
   * requested.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_GuardianInvitation
   */
  public function get($studentId, $invitationId, $optParams = array())
  {
    $params = array('studentId' => $studentId, 'invitationId' => $invitationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_GuardianInvitation");
  }
  /**
   * Returns a list of guardian invitations that the requesting user is permitted
   * to view, filtered by the parameters provided.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if a `student_id` is specified, and the requesting
   * user is not permitted to view guardian invitations for that student, if
   * `"-"` is specified as the `student_id` and the user is not a domain
   * administrator, if guardians are not enabled for the domain in question,   or
   * for other access errors. * `INVALID_ARGUMENT` if a `student_id` is specified,
   * but its format cannot   be recognized (it is not an email address, nor a
   * `student_id` from the   API, nor the literal string `me`). May also be
   * returned if an invalid   `page_token` or `state` is provided. * `NOT_FOUND`
   * if a `student_id` is specified, and its format can be   recognized, but
   * Classroom has no record of that student.
   * (guardianInvitations.listUserProfilesGuardianInvitations)
   *
   * @param string $studentId The ID of the student whose guardian invitations are
   * to be returned. The identifier can be one of the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user * the string literal
   * `"-"`, indicating that results should be returned for   all students that the
   * requesting user is permitted to view guardian   invitations.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string invitedEmailAddress If specified, only results with the
   * specified `invited_email_address` will be returned.
   * @opt_param string states If specified, only results with the specified
   * `state` values will be returned. Otherwise, results with a `state` of
   * `PENDING` will be returned.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum.
   *
   * The server may return fewer than the specified number of results.
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned.
   *
   * The list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListGuardianInvitationsResponse
   */
  public function listUserProfilesGuardianInvitations($studentId, $optParams = array())
  {
    $params = array('studentId' => $studentId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListGuardianInvitationsResponse");
  }
  /**
   * Modifies a guardian invitation.
   *
   * Currently, the only valid modification is to change the `state` from
   * `PENDING` to `COMPLETE`. This has the effect of withdrawing the invitation.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the current user does not have permission to
   * manage guardians, if guardians are not enabled for the domain in question
   * or for other access errors. * `FAILED_PRECONDITION` if the guardian link is
   * not in the `PENDING` state. * `INVALID_ARGUMENT` if the format of the student
   * ID provided   cannot be recognized (it is not an email address, nor a
   * `user_id` from   this API), or if the passed `GuardianInvitation` has a
   * `state` other than   `COMPLETE`, or if it modifies fields other than `state`.
   * * `NOT_FOUND` if the student ID provided is a valid student ID, but
   * Classroom has no record of that student, or if the `id` field does not
   * refer to a guardian invitation known to Classroom.
   * (guardianInvitations.patch)
   *
   * @param string $studentId The ID of the student whose guardian invitation is
   * to be modified.
   * @param string $invitationId The `id` field of the `GuardianInvitation` to be
   * modified.
   * @param Google_Service_Classroom_GuardianInvitation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the course
   * to update. This field is required to do an update. The update will fail if
   * invalid fields are specified. The following fields are valid:
   *
   * * `state`
   *
   * When set in a query parameter, this field should be specified as
   *
   * `updateMask=,,...`
   * @return Google_Service_Classroom_GuardianInvitation
   */
  public function patch($studentId, $invitationId, Google_Service_Classroom_GuardianInvitation $postBody, $optParams = array())
  {
    $params = array('studentId' => $studentId, 'invitationId' => $invitationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Classroom_GuardianInvitation");
  }
}
