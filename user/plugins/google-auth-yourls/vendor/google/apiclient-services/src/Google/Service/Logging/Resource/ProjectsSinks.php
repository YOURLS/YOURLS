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
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_Resource_ProjectsSinks extends Google_Service_Resource
{
  /**
   * Creates a sink that exports specified log entries to a destination. The
   * export of newly-ingested log entries begins immediately, unless the sink's
   * writer_identity is not permitted to write to the destination. A sink can
   * export log entries only from the resource owning the sink. (sinks.create)
   *
   * @param string $parent Required. The resource in which to create the sink:
   * "projects/[PROJECT_ID]" "organizations/[ORGANIZATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]" "folders/[FOLDER_ID]" Examples:
   * "projects/my-logging-project", "organizations/123456789".
   * @param Google_Service_Logging_LogSink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool uniqueWriterIdentity Optional. Determines the kind of IAM
   * identity returned as writer_identity in the new sink. If this value is
   * omitted or set to false, and if the sink's parent is a project, then the
   * value returned as writer_identity is the same group or service account used
   * by Stackdriver Logging before the addition of writer identities to this API.
   * The sink's destination must be in the same project as the sink itself.If this
   * field is set to true, or if the sink is owned by a non-project resource such
   * as an organization, then the value of writer_identity will be a unique
   * service account used only for exports from the new sink. For more
   * information, see writer_identity in LogSink.
   * @return Google_Service_Logging_LogSink
   */
  public function create($parent, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Logging_LogSink");
  }
  /**
   * Deletes a sink. If the sink has a unique writer_identity, then that service
   * account is also deleted. (sinks.delete)
   *
   * @param string $sinkName Required. The full resource name of the sink to
   * delete, including the parent resource and the sink identifier:
   * "projects/[PROJECT_ID]/sinks/[SINK_ID]"
   * "organizations/[ORGANIZATION_ID]/sinks/[SINK_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/sinks/[SINK_ID]"
   * "folders/[FOLDER_ID]/sinks/[SINK_ID]" Example: "projects/my-project-id/sinks
   * /my-sink-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LoggingEmpty
   */
  public function delete($sinkName, $optParams = array())
  {
    $params = array('sinkName' => $sinkName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Logging_LoggingEmpty");
  }
  /**
   * Gets a sink. (sinks.get)
   *
   * @param string $sinkName Required. The resource name of the sink:
   * "projects/[PROJECT_ID]/sinks/[SINK_ID]"
   * "organizations/[ORGANIZATION_ID]/sinks/[SINK_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/sinks/[SINK_ID]"
   * "folders/[FOLDER_ID]/sinks/[SINK_ID]" Example: "projects/my-project-id/sinks
   * /my-sink-id".
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_LogSink
   */
  public function get($sinkName, $optParams = array())
  {
    $params = array('sinkName' => $sinkName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Logging_LogSink");
  }
  /**
   * Lists sinks. (sinks.listProjectsSinks)
   *
   * @param string $parent Required. The parent resource whose sinks are to be
   * listed: "projects/[PROJECT_ID]" "organizations/[ORGANIZATION_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]" "folders/[FOLDER_ID]"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. If present, then retrieve the next
   * batch of results from the preceding call to this method. pageToken must be
   * the value of nextPageToken from the previous response. The values of other
   * method parameters should be identical to those in the previous call.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. The presence of
   * nextPageToken in the response indicates that more results might be available.
   * @return Google_Service_Logging_ListSinksResponse
   */
  public function listProjectsSinks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Logging_ListSinksResponse");
  }
  /**
   * Updates a sink. This method replaces the following fields in the existing
   * sink with values from the new sink: destination, and filter. The updated sink
   * might also have a new writer_identity; see the unique_writer_identity field.
   * (sinks.patch)
   *
   * @param string $sinkName Required. The full resource name of the sink to
   * update, including the parent resource and the sink identifier:
   * "projects/[PROJECT_ID]/sinks/[SINK_ID]"
   * "organizations/[ORGANIZATION_ID]/sinks/[SINK_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/sinks/[SINK_ID]"
   * "folders/[FOLDER_ID]/sinks/[SINK_ID]" Example: "projects/my-project-id/sinks
   * /my-sink-id".
   * @param Google_Service_Logging_LogSink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool uniqueWriterIdentity Optional. See sinks.create for a
   * description of this field. When updating a sink, the effect of this field on
   * the value of writer_identity in the updated sink depends on both the old and
   * new values of this field: If the old and new values of this field are both
   * false or both true, then there is no change to the sink's writer_identity. If
   * the old value is false and the new value is true, then writer_identity is
   * changed to a unique service account. It is an error if the old value is true
   * and the new value is set to false or defaulted to false.
   * @opt_param string updateMask Optional. Field mask that specifies the fields
   * in sink that need an update. A sink field will be overwritten if, and only
   * if, it is in the update mask. name and output only fields cannot be
   * updated.An empty updateMask is temporarily treated as using the following
   * mask for backwards compatibility purposes:
   * destination,filter,includeChildren At some point in the future, behavior will
   * be removed and specifying an empty updateMask will be an error.For a detailed
   * FieldMask definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmaskExample: updateMask=filter.
   * @return Google_Service_Logging_LogSink
   */
  public function patch($sinkName, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('sinkName' => $sinkName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Logging_LogSink");
  }
  /**
   * Updates a sink. This method replaces the following fields in the existing
   * sink with values from the new sink: destination, and filter. The updated sink
   * might also have a new writer_identity; see the unique_writer_identity field.
   * (sinks.update)
   *
   * @param string $sinkName Required. The full resource name of the sink to
   * update, including the parent resource and the sink identifier:
   * "projects/[PROJECT_ID]/sinks/[SINK_ID]"
   * "organizations/[ORGANIZATION_ID]/sinks/[SINK_ID]"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/sinks/[SINK_ID]"
   * "folders/[FOLDER_ID]/sinks/[SINK_ID]" Example: "projects/my-project-id/sinks
   * /my-sink-id".
   * @param Google_Service_Logging_LogSink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool uniqueWriterIdentity Optional. See sinks.create for a
   * description of this field. When updating a sink, the effect of this field on
   * the value of writer_identity in the updated sink depends on both the old and
   * new values of this field: If the old and new values of this field are both
   * false or both true, then there is no change to the sink's writer_identity. If
   * the old value is false and the new value is true, then writer_identity is
   * changed to a unique service account. It is an error if the old value is true
   * and the new value is set to false or defaulted to false.
   * @opt_param string updateMask Optional. Field mask that specifies the fields
   * in sink that need an update. A sink field will be overwritten if, and only
   * if, it is in the update mask. name and output only fields cannot be
   * updated.An empty updateMask is temporarily treated as using the following
   * mask for backwards compatibility purposes:
   * destination,filter,includeChildren At some point in the future, behavior will
   * be removed and specifying an empty updateMask will be an error.For a detailed
   * FieldMask definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmaskExample: updateMask=filter.
   * @return Google_Service_Logging_LogSink
   */
  public function update($sinkName, Google_Service_Logging_LogSink $postBody, $optParams = array())
  {
    $params = array('sinkName' => $sinkName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Logging_LogSink");
  }
}
