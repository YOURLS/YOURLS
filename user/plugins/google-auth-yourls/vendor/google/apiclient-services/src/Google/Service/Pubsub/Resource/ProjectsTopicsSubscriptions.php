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
class Google_Service_Pubsub_Resource_ProjectsTopicsSubscriptions extends Google_Service_Resource
{
  /**
   * Lists the name of the subscriptions for this topic.
   * (subscriptions.listProjectsTopicsSubscriptions)
   *
   * @param string $topic The name of the topic that subscriptions are attached
   * to. Format is `projects/{project}/topics/{topic}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListTopicSubscriptionsResponse`; indicates that this is a continuation of a
   * prior `ListTopicSubscriptions` call, and that the system should return the
   * next page of data.
   * @opt_param int pageSize Maximum number of subscription names to return.
   * @return Google_Service_Pubsub_ListTopicSubscriptionsResponse
   */
  public function listProjectsTopicsSubscriptions($topic, $optParams = array())
  {
    $params = array('topic' => $topic);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListTopicSubscriptionsResponse");
  }
}
