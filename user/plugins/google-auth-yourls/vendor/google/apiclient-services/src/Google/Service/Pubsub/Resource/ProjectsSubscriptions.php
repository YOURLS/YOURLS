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
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class Google_Service_Pubsub_Resource_ProjectsSubscriptions extends Google_Service_Resource
{
  /**
   * Acknowledges the messages associated with the `ack_ids` in the
   * `AcknowledgeRequest`. The Pub/Sub system can remove the relevant messages
   * from the subscription.
   *
   * Acknowledging a message whose ack deadline has expired may succeed, but such
   * a message may be redelivered later. Acknowledging a message more than once
   * will not result in an error. (subscriptions.acknowledge)
   *
   * @param string $subscription The subscription whose message is being
   * acknowledged. Format is `projects/{project}/subscriptions/{sub}`.
   * @param Google_Service_Pubsub_AcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function acknowledge($subscription, Google_Service_Pubsub_AcknowledgeRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Creates a subscription to a given topic. If the subscription already exists,
   * returns `ALREADY_EXISTS`. If the corresponding topic doesn't exist, returns
   * `NOT_FOUND`.
   *
   * If the name is not provided in the request, the server will assign a random
   * name for this subscription on the same project as the topic, conforming to
   * the [resource name
   * format](https://cloud.google.com/pubsub/docs/overview#names). The generated
   * name is populated in the returned Subscription object. Note that for REST API
   * requests, you must specify a name in the request. (subscriptions.create)
   *
   * @param string $name The name of the subscription. It must have the format
   * `"projects/{project}/subscriptions/{subscription}"`. `{subscription}` must
   * start with a letter, and contain only letters (`[A-Za-z]`), numbers
   * (`[0-9]`), dashes (`-`), underscores (`_`), periods (`.`), tildes (`~`), plus
   * (`+`) or percent signs (`%`). It must be between 3 and 255 characters in
   * length, and it must not start with `"goog"`.
   * @param Google_Service_Pubsub_Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Subscription
   */
  public function create($name, Google_Service_Pubsub_Subscription $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Subscription");
  }
  /**
   * Deletes an existing subscription. All messages retained in the subscription
   * are immediately dropped. Calls to `Pull` after deletion will return
   * `NOT_FOUND`. After a subscription is deleted, a new one may be created with
   * the same name, but the new one has no association with the old subscription
   * or its topic unless the same topic is specified. (subscriptions.delete)
   *
   * @param string $subscription The subscription to delete. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function delete($subscription, $optParams = array())
  {
    $params = array('subscription' => $subscription);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Gets the configuration details of a subscription. (subscriptions.get)
   *
   * @param string $subscription The name of the subscription to get. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Subscription
   */
  public function get($subscription, $optParams = array())
  {
    $params = array('subscription' => $subscription);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Subscription");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (subscriptions.getIamPolicy)
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
   * Lists matching subscriptions. (subscriptions.listProjectsSubscriptions)
   *
   * @param string $project The name of the cloud project that subscriptions
   * belong to. Format is `projects/{project}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListSubscriptionsResponse`; indicates that this is a continuation of a prior
   * `ListSubscriptions` call, and that the system should return the next page of
   * data.
   * @opt_param int pageSize Maximum number of subscriptions to return.
   * @return Google_Service_Pubsub_ListSubscriptionsResponse
   */
  public function listProjectsSubscriptions($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListSubscriptionsResponse");
  }
  /**
   * Modifies the ack deadline for a specific message. This method is useful to
   * indicate that more time is needed to process a message by the subscriber, or
   * to make the message available for redelivery if the processing was
   * interrupted. Note that this does not modify the subscription-level
   * `ackDeadlineSeconds` used for subsequent messages.
   * (subscriptions.modifyAckDeadline)
   *
   * @param string $subscription The name of the subscription. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param Google_Service_Pubsub_ModifyAckDeadlineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function modifyAckDeadline($subscription, Google_Service_Pubsub_ModifyAckDeadlineRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyAckDeadline', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Modifies the `PushConfig` for a specified subscription.
   *
   * This may be used to change a push subscription to a pull one (signified by an
   * empty `PushConfig`) or vice versa, or change the endpoint URL and other
   * attributes of a push subscription. Messages will accumulate for delivery
   * continuously through the call regardless of changes to the `PushConfig`.
   * (subscriptions.modifyPushConfig)
   *
   * @param string $subscription The name of the subscription. Format is
   * `projects/{project}/subscriptions/{sub}`.
   * @param Google_Service_Pubsub_ModifyPushConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function modifyPushConfig($subscription, Google_Service_Pubsub_ModifyPushConfigRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyPushConfig', array($params), "Google_Service_Pubsub_PubsubEmpty");
  }
  /**
   * Pulls messages from the server. Returns an empty list if there are no
   * messages available in the backlog. The server may return `UNAVAILABLE` if
   * there are too many concurrent pull requests pending for the given
   * subscription. (subscriptions.pull)
   *
   * @param string $subscription The subscription from which messages should be
   * pulled. Format is `projects/{project}/subscriptions/{sub}`.
   * @param Google_Service_Pubsub_PullRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_PullResponse
   */
  public function pull($subscription, Google_Service_Pubsub_PullRequest $postBody, $optParams = array())
  {
    $params = array('subscription' => $subscription, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pull', array($params), "Google_Service_Pubsub_PullResponse");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (subscriptions.setIamPolicy)
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
   * "fail open" without warning. (subscriptions.testIamPermissions)
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
