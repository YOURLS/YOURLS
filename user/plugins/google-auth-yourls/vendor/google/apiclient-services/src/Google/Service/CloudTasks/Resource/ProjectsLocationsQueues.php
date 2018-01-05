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
 * The "queues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtasksService = new Google_Service_CloudTasks(...);
 *   $queues = $cloudtasksService->queues;
 *  </code>
 */
class Google_Service_CloudTasks_Resource_ProjectsLocationsQueues extends Google_Service_Resource
{
  /**
   * Creates a queue.
   *
   * WARNING: Using this method may have unintended side effects if you are using
   * an App Engine `queue.yaml` or `queue.xml` file to manage your queues. Read
   * [Overview of Queue Management and queue.yaml](/cloud-tasks/docs/queue-yaml)
   * carefully before using this method. (queues.create)
   *
   * @param string $parent Required.
   *
   * The location name in which the queue will be created. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`
   *
   * The list of allowed locations can be obtained by calling Cloud Tasks'
   * implementation of google.cloud.location.Locations.ListLocations.
   * @param Google_Service_CloudTasks_Queue $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Queue
   */
  public function create($parent, Google_Service_CloudTasks_Queue $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Deletes a queue.
   *
   * This command will delete the queue even if it has tasks in it.
   *
   * Note: If you delete a queue, a queue with the same name can't be created for
   * 7 days.
   *
   * WARNING: Using this method may have unintended side effects if you are using
   * an App Engine `queue.yaml` or `queue.xml` file to manage your queues. Read
   * [Overview of Queue Management and queue.yaml](/cloud-tasks/docs/queue-yaml)
   * carefully before using this method. (queues.delete)
   *
   * @param string $name Required.
   *
   * The queue name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_CloudtasksEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudTasks_CloudtasksEmpty");
  }
  /**
   * Gets a queue. (queues.get)
   *
   * @param string $name Required.
   *
   * The resource name of the queue. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Queue
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Gets the access control policy for a Queue. Returns an empty policy if the
   * resource exists and does not have a policy set.
   *
   * Authorization requires the following [Google IAM](/iam) permission on the
   * specified resource parent:
   *
   * * `cloudtasks.queues.getIamPolicy` (queues.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudTasks_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Policy
   */
  public function getIamPolicy($resource, Google_Service_CloudTasks_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudTasks_Policy");
  }
  /**
   * Lists queues.
   *
   * Queues are returned in lexicographical order.
   * (queues.listProjectsLocationsQueues)
   *
   * @param string $parent Required.
   *
   * The location name. For example: `projects/PROJECT_ID/locations/LOCATION_ID`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter `filter` can be used to specify a subset of queues.
   * Any Queue field can be used as a filter and several operators as supported.
   * For example: `<=, <, >=, >, !=, =, :`. The filter syntax is the same as
   * described in [Stackdriver's Advanced Logs
   * Filters](/logging/docs/view/advanced_filters).
   *
   * Sample filter "app_engine_http_target: *".
   *
   * Note that using filters might cause fewer queues than the requested_page size
   * to be returned.
   * @opt_param string pageToken A token identifying the page of results to
   * return.
   *
   * To request the first page results, page_token must be empty. To request the
   * next page of results, page_token must be the value of
   * ListQueuesResponse.next_page_token returned from the previous call to
   * CloudTasks.ListQueues method. It is an error to switch the value of
   * ListQueuesRequest.filter while iterating through pages.
   * @opt_param int pageSize Requested page size.
   *
   * The maximum page size is 9800. If unspecified, the page size will be the
   * maximum. Fewer queues than requested might be returned, even if more queues
   * exist; use ListQueuesResponse.next_page_token to determine if more queues
   * exist.
   * @return Google_Service_CloudTasks_ListQueuesResponse
   */
  public function listProjectsLocationsQueues($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudTasks_ListQueuesResponse");
  }
  /**
   * Updates a queue.
   *
   * This method creates the queue if it does not exist and updates the queue if
   * it does exist.
   *
   * WARNING: Using this method may have unintended side effects if you are using
   * an App Engine `queue.yaml` or `queue.xml` file to manage your queues. Read
   * [Overview of Queue Management and queue.yaml](/cloud-tasks/docs/queue-yaml)
   * carefully before using this method. (queues.patch)
   *
   * @param string $name The queue name.
   *
   * The queue name must have the following format:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   *
   * * `PROJECT_ID` can contain letters ([A-Za-z]), numbers ([0-9]),    hyphens
   * (-), colons (:), or periods (.). * `QUEUE_ID` can contain letters ([A-Za-z]),
   * numbers ([0-9]), or   hyphens (-). The maximum length is 100 characters.
   *
   * Caller-specified and required in CreateQueueRequest, after which it becomes
   * output only.
   * @param Google_Service_CloudTasks_Queue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask used to specify which fields of the queue
   * are being updated.
   *
   * If empty, then all fields will be updated.
   * @return Google_Service_CloudTasks_Queue
   */
  public function patch($name, Google_Service_CloudTasks_Queue $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Pauses the queue.
   *
   * If a queue is paused then the system will stop executing the tasks in the
   * queue until it is resumed via CloudTasks.ResumeQueue. Tasks can still be
   * added when the queue is paused. The state of the queue is stored in
   * Queue.queue_state; if paused it will be set to Queue.QueueState.PAUSED.
   * (queues.pause)
   *
   * @param string $name Required.
   *
   * The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param Google_Service_CloudTasks_PauseQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Queue
   */
  public function pause($name, Google_Service_CloudTasks_PauseQueueRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Purges a queue by deleting all of its tasks.
   *
   * All tasks created before this method is called are permanently deleted.
   *
   * Purge operations can take up to one minute to take effect. Tasks might be
   * dispatched before the purge takes effect. A purge is irreversible.
   * (queues.purge)
   *
   * @param string $name Required.
   *
   * The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param Google_Service_CloudTasks_PurgeQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Queue
   */
  public function purge($name, Google_Service_CloudTasks_PurgeQueueRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('purge', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Resume a queue.
   *
   * This method resumes a queue after it has been Queue.QueueState.PAUSED or
   * Queue.QueueState.DISABLED. The state of a queue is stored in
   * Queue.queue_state; after calling this method it will be set to
   * Queue.QueueState.RUNNING.
   *
   * WARNING: Resuming many high-QPS queues at the same time can lead to target
   * overloading. If you are resuming high-QPS queues, follow the 500/50/5 pattern
   * described in [Managing Cloud Tasks Scaling Risks](/cloud-tasks/pdfs/managing-
   * cloud-tasks-scaling-risks-2017-06-05.pdf). (queues.resume)
   *
   * @param string $name Required.
   *
   * The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param Google_Service_CloudTasks_ResumeQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Queue
   */
  public function resume($name, Google_Service_CloudTasks_ResumeQueueRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_CloudTasks_Queue");
  }
  /**
   * Sets the access control policy for a Queue. Replaces any existing policy.
   *
   * Note: The Cloud Console does not check queue-level IAM permissions yet.
   * Project-level permissions are required to use the Cloud Console.
   *
   * Authorization requires the following [Google IAM](/iam) permission on the
   * specified resource parent:
   *
   * * `cloudtasks.queues.setIamPolicy` (queues.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudTasks_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudTasks_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudTasks_Policy");
  }
  /**
   * Returns permissions that a caller has on a Queue. If the resource does not
   * exist, this will return an empty set of permissions, not a
   * google.rpc.Code.NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (queues.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudTasks_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudTasks_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudTasks_TestIamPermissionsResponse");
  }
}
