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
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $topics = $pubsubService->topics;
 *  </code>
 */
class Google_Service_Pubsub_Resource_ProjectsTopics extends Google_Service_Resource
{
  /**
   * Creates the given topic with the given name. (topics.create)
   *
   * @param string $name The name of the topic. It must have the format
   * `"projects/{project}/topics/{topic}"`. `{topic}` must start with a letter,
   * and contain only letters (`[A-Za-z]`), numbers (`[0-9]`), dashes (`-`),
   * underscores (`_`), periods (`.`), tildes (`~`), plus (`+`) or percent signs
   * (`%`). It must be between 3 and 255 characters in length, and it must not
   * start with `"goog"`.
   * @param Google_Service_Pubsub_Topic $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Topic
   */
  public function create($name, Google_Service_Pubsub_Topic $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Topic");
  }
  /**
   * Deletes the topic with the given name. Returns `NOT_FOUND` if the topic does
   * not exist. After a topic is deleted, a new topic may be created with the same
   * name; this is an entirely new topic with none of the old configuration or
   * subscriptions. Existing subscriptions to this topic are not deleted, but
   * their `topic` field is set to `_deleted-topic_`. (topics.delete)
   *
   * @param string $topic Name of the topic to delete. Format is
   * `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function delete($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Gets the configuration of a topic. (topics.get)
   *
   * @param string $topic The name of the topic to get. Format is
   * `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Topic
   */
  public function get($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Topic");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (topics.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }
  /**
   * Lists matching topics. (topics.listProjectsTopics)
   *
   * @param string $project The name of the cloud project that topics belong to.
   * Format is `projects/{project}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListTopicsResponse`; indicates that this is a continuation of a prior
   * `ListTopics` call, and that the system should return the next page of data.
   * @opt_param int pageSize Maximum number of topics to return.
   * @return Google_Service_Pubsub_ListTopicsResponse
   */
  public function listProjectsTopics($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListTopicsResponse");
  }
  /**
   * Adds one or more messages to the topic. Returns `NOT_FOUND` if the topic does
   * not exist. The message payload must not be empty; it must contain  either a
   * non-empty data field, or at least one attribute. (topics.publish)
   *
   * @param string $topic The messages in the request will be published on this
   * topic. Format is `projects/{project}/topics/{topic}`.
   * @param Google_Service_Pubsub_PublishRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PublishResponse
   */
  public function publish($topic, Google_Service_Pubsub_PublishRequest $postBody, $optParams = array())
  {
    $params = array('topic' => $topic, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Pubsub_PublishResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (topics.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Pubsub_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function setIamPolicy($resource, Google_Service_Pubsub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (topics.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Pubsub_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Pubsub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Pubsub_TestIamPermissionsResponse");
  }
}
