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
 * The "invitations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $invitations = $classroomService->invitations;
 *  </code>
 */
class Google_Service_Classroom_Resource_Invitations extends Google_Service_Resource
{
  /**
   * Accepts an invitation, removing it and adding the invited user to the
   * teachers or students (as appropriate) of the specified course. Only the
   * invited user may accept an invitation.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to accept the
   * requested invitation or for access errors. * `FAILED_PRECONDITION` for the
   * following request errors:     * CourseMemberLimitReached     *
   * CourseNotModifiable     * CourseTeacherLimitReached     *
   * UserGroupsMembershipLimitReached * `NOT_FOUND` if no invitation exists with
   * the requested ID. (invitations.accept)
   *
   * @param string $id Identifier of the invitation to accept.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function accept($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
  /**
   * Creates an invitation. Only one invitation for a user and course may exist at
   * a time. Delete and re-create an invitation to make changes.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to create
   * invitations for this course or for access errors. * `NOT_FOUND` if the course
   * or the user does not exist. * `FAILED_PRECONDITION` if the requested user's
   * account is disabled or if the user already has this role or a role with
   * greater permissions. * `ALREADY_EXISTS` if an invitation for the specified
   * user and course already exists. (invitations.create)
   *
   * @param Google_Service_Classroom_Invitation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Invitation
   */
  public function create(Google_Service_Classroom_Invitation $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_Invitation");
  }
  /**
   * Deletes an invitation.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to delete the
   * requested invitation or for access errors. * `NOT_FOUND` if no invitation
   * exists with the requested ID. (invitations.delete)
   *
   * @param string $id Identifier of the invitation to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
  /**
   * Returns an invitation.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to view the
   * requested invitation or for access errors. * `NOT_FOUND` if no invitation
   * exists with the requested ID. (invitations.get)
   *
   * @param string $id Identifier of the invitation to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_Invitation
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_Invitation");
  }
  /**
   * Returns a list of invitations that the requesting user is permitted to view,
   * restricted to those that match the list request.
   *
   * *Note:* At least one of `user_id` or `course_id` must be supplied. Both
   * fields can be supplied.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` for access errors. (invitations.listInvitations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of items to return. Zero means no
   * maximum.
   *
   * The server may return fewer than the specified number of results.
   * @opt_param string courseId Restricts returned invitations to those for a
   * course with the specified identifier.
   * @opt_param string userId Restricts returned invitations to those for a
   * specific user. The identifier can be one of the following:
   *
   * * the numeric identifier for the user * the email address of the user * the
   * string literal `"me"`, indicating the requesting user
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned.
   *
   * The list request must be otherwise identical to the one that resulted in this
   * token.
   * @return Google_Service_Classroom_ListInvitationsResponse
   */
  public function listInvitations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListInvitationsResponse");
  }
}
