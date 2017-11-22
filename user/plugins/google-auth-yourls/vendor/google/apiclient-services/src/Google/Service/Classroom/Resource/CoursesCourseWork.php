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
 * The "courseWork" collection of methods.
 * Typical usage is:
 *  <code>
 *   $classroomService = new Google_Service_Classroom(...);
 *   $courseWork = $classroomService->courseWork;
 *  </code>
 */
class Google_Service_Classroom_Resource_CoursesCourseWork extends Google_Service_Resource
{
  /**
   * Creates course work.
   *
   * The resulting course work (and corresponding student submissions) are
   * associated with the Developer Console project of the [OAuth client
   * ID](https://support.google.com/cloud/answer/6158849) used to make the
   * request. Classroom API requests to modify course work and student submissions
   * must be made with an OAuth client ID from the associated Developer Console
   * project.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course, create course work in the requested course, share a Drive
   * attachment, or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course does not exist. *
   * `FAILED_PRECONDITION` for the following request error:     *
   * AttachmentNotVisible (courseWork.create)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param Google_Service_Classroom_CourseWork $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWork
   */
  public function create($courseId, Google_Service_Classroom_CourseWork $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Classroom_CourseWork");
  }
  /**
   * Deletes a course work.
   *
   * This request must be made by the Developer Console project of the [OAuth
   * client ID](https://support.google.com/cloud/answer/6158849) used to create
   * the corresponding course work item.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting developer project did not create the
   * corresponding course work, if the requesting user is not permitted to delete
   * the requested course or for access errors. * `FAILED_PRECONDITION` if the
   * requested course work has already been deleted. * `NOT_FOUND` if no course
   * exists with the requested ID. (courseWork.delete)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work to delete. This identifier is
   * a Classroom-assigned identifier.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_ClassroomEmpty
   */
  public function delete($courseId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Classroom_ClassroomEmpty");
  }
  /**
   * Returns course work.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or course work, or for access errors. * `INVALID_ARGUMENT`
   * if the request is malformed. * `NOT_FOUND` if the requested course or course
   * work does not exist. (courseWork.get)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWork
   */
  public function get($courseId, $id, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Classroom_CourseWork");
  }
  /**
   * Returns a list of course work that the requester is permitted to view.
   *
   * Course students may only view `PUBLISHED` course work. Course teachers and
   * domain administrators may view all course work.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or for access errors. * `INVALID_ARGUMENT` if the request is
   * malformed. * `NOT_FOUND` if the requested course does not exist.
   * (courseWork.listCoursesCourseWork)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional sort ordering for results. A comma-
   * separated list of fields with an optional sort direction keyword. Supported
   * fields are `updateTime` and `dueDate`. Supported direction keywords are `asc`
   * and `desc`. If not specified, `updateTime desc` is the default behavior.
   * Examples: `dueDate asc,updateTime desc`, `updateTime,dueDate desc`
   * @opt_param string pageToken nextPageToken value returned from a previous list
   * call, indicating that the subsequent page of results should be returned.
   *
   * The list request must be otherwise identical to the one that resulted in this
   * token.
   * @opt_param int pageSize Maximum number of items to return. Zero or
   * unspecified indicates that the server may assign a maximum.
   *
   * The server may return fewer than the specified number of results.
   * @opt_param string courseWorkStates Restriction on the work status to return.
   * Only courseWork that matches is returned. If unspecified, items with a work
   * status of `PUBLISHED` is returned.
   * @return Google_Service_Classroom_ListCourseWorkResponse
   */
  public function listCoursesCourseWork($courseId, $optParams = array())
  {
    $params = array('courseId' => $courseId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Classroom_ListCourseWorkResponse");
  }
  /**
   * Modifies assignee mode and options of a coursework.
   *
   * Only a teacher of the course that contains the coursework may call this
   * method.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting user is not permitted to access the
   * requested course or course work or for access errors. * `INVALID_ARGUMENT` if
   * the request is malformed. * `NOT_FOUND` if the requested course or course
   * work does not exist. (courseWork.modifyAssignees)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the coursework.
   * @param Google_Service_Classroom_ModifyCourseWorkAssigneesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Classroom_CourseWork
   */
  public function modifyAssignees($courseId, $id, Google_Service_Classroom_ModifyCourseWorkAssigneesRequest $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyAssignees', array($params), "Google_Service_Classroom_CourseWork");
  }
  /**
   * Updates one or more fields of a course work.
   *
   * See google.classroom.v1.CourseWork for details of which fields may be updated
   * and who may change them.
   *
   * This request must be made by the Developer Console project of the [OAuth
   * client ID](https://support.google.com/cloud/answer/6158849) used to create
   * the corresponding course work item.
   *
   * This method returns the following error codes:
   *
   * * `PERMISSION_DENIED` if the requesting developer project did not create the
   * corresponding course work, if the user is not permitted to make the requested
   * modification to the student submission, or for access errors. *
   * `INVALID_ARGUMENT` if the request is malformed. * `FAILED_PRECONDITION` if
   * the requested course work has already been deleted. * `NOT_FOUND` if the
   * requested course, course work, or student submission does not exist.
   * (courseWork.patch)
   *
   * @param string $courseId Identifier of the course. This identifier can be
   * either the Classroom-assigned identifier or an alias.
   * @param string $id Identifier of the course work.
   * @param Google_Service_Classroom_CourseWork $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Mask that identifies which fields on the course
   * work to update. This field is required to do an update. The update fails if
   * invalid fields are specified. If a field supports empty values, it can be
   * cleared by specifying it in the update mask and not in the CourseWork object.
   * If a field that does not support empty values is included in the update mask
   * and not set in the CourseWork object, an `INVALID_ARGUMENT` error will be
   * returned.
   *
   * The following fields may be specified by teachers:
   *
   * * `title` * `description` * `state` * `due_date` * `due_time` * `max_points`
   * * `scheduled_time` * `submission_modification_mode`
   * @return Google_Service_Classroom_CourseWork
   */
  public function patch($courseId, $id, Google_Service_Classroom_CourseWork $postBody, $optParams = array())
  {
    $params = array('courseId' => $courseId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Classroom_CourseWork");
  }
}
