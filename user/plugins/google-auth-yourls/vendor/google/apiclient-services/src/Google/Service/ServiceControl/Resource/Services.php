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
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicecontrolService = new Google_Service_ServiceControl(...);
 *   $services = $servicecontrolService->services;
 *  </code>
 */
class Google_Service_ServiceControl_Resource_Services extends Google_Service_Resource
{
  /**
   * Attempts to allocate quota for the specified consumer. It should be called
   * before the operation is executed.
   *
   * This method requires the `servicemanagement.services.quota` permission on the
   * specified service. For more information, see [Cloud
   * IAM](https://cloud.google.com/iam).
   *
   * **NOTE:** The client **must** fail-open on server errors `INTERNAL`,
   * `UNKNOWN`, `DEADLINE_EXCEEDED`, and `UNAVAILABLE`. To ensure system
   * reliability, the server may inject these errors to prohibit any hard
   * dependency on the quota functionality. (services.allocateQuota)
   *
   * @param string $serviceName Name of the service as specified in the service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See google.api.Service for the definition of a service name.
   * @param Google_Service_ServiceControl_AllocateQuotaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_AllocateQuotaResponse
   */
  public function allocateQuota($serviceName, Google_Service_ServiceControl_AllocateQuotaRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('allocateQuota', array($params), "Google_Service_ServiceControl_AllocateQuotaResponse");
  }
  /**
   * Checks an operation with Google Service Control to decide whether the given
   * operation should proceed. It should be called before the operation is
   * executed.
   *
   * If feasible, the client should cache the check results and reuse them for 60
   * seconds. In case of server errors, the client can rely on the cached results
   * for longer time.
   *
   * NOTE: the CheckRequest has the size limit of 64KB.
   *
   * This method requires the `servicemanagement.services.check` permission on the
   * specified service. For more information, see [Google Cloud
   * IAM](https://cloud.google.com/iam). (services.check)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See [google.api.Service](https://cloud.google.com/service-
   * management/reference/rpc/google.api#google.api.Service) for the definition of
   * a service name.
   * @param Google_Service_ServiceControl_CheckRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_CheckResponse
   */
  public function check($serviceName, Google_Service_ServiceControl_CheckRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_ServiceControl_CheckResponse");
  }
  /**
   * Signals the quota controller that service ends the ongoing usage
   * reconciliation.
   *
   * This method requires the `servicemanagement.services.quota` permission on the
   * specified service. For more information, see [Google Cloud
   * IAM](https://cloud.google.com/iam). (services.endReconciliation)
   *
   * @param string $serviceName Name of the service as specified in the service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See google.api.Service for the definition of a service name.
   * @param Google_Service_ServiceControl_EndReconciliationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_EndReconciliationResponse
   */
  public function endReconciliation($serviceName, Google_Service_ServiceControl_EndReconciliationRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('endReconciliation', array($params), "Google_Service_ServiceControl_EndReconciliationResponse");
  }
  /**
   * Releases previously allocated quota done through AllocateQuota method.
   *
   * This method requires the `servicemanagement.services.quota` permission on the
   * specified service. For more information, see [Cloud
   * IAM](https://cloud.google.com/iam).
   *
   * **NOTE:** The client **must** fail-open on server errors `INTERNAL`,
   * `UNKNOWN`, `DEADLINE_EXCEEDED`, and `UNAVAILABLE`. To ensure system
   * reliability, the server may inject these errors to prohibit any hard
   * dependency on the quota functionality. (services.releaseQuota)
   *
   * @param string $serviceName Name of the service as specified in the service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See google.api.Service for the definition of a service name.
   * @param Google_Service_ServiceControl_ReleaseQuotaRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_ReleaseQuotaResponse
   */
  public function releaseQuota($serviceName, Google_Service_ServiceControl_ReleaseQuotaRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('releaseQuota', array($params), "Google_Service_ServiceControl_ReleaseQuotaResponse");
  }
  /**
   * Reports operation results to Google Service Control, such as logs and
   * metrics. It should be called after an operation is completed.
   *
   * If feasible, the client should aggregate reporting data for up to 5 seconds
   * to reduce API traffic. Limiting aggregation to 5 seconds is to reduce data
   * loss during client crashes. Clients should carefully choose the aggregation
   * time window to avoid data loss risk more than 0.01% for business and
   * compliance reasons.
   *
   * NOTE: the ReportRequest has the size limit of 1MB.
   *
   * This method requires the `servicemanagement.services.report` permission on
   * the specified service. For more information, see [Google Cloud
   * IAM](https://cloud.google.com/iam). (services.report)
   *
   * @param string $serviceName The service name as specified in its service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See [google.api.Service](https://cloud.google.com/service-
   * management/reference/rpc/google.api#google.api.Service) for the definition of
   * a service name.
   * @param Google_Service_ServiceControl_ReportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_ReportResponse
   */
  public function report($serviceName, Google_Service_ServiceControl_ReportRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('report', array($params), "Google_Service_ServiceControl_ReportResponse");
  }
  /**
   * Unlike rate quota, allocation quota does not get refilled periodically. So,
   * it is possible that the quota usage as seen by the service differs from what
   * the One Platform considers the usage is. This is expected to happen only
   * rarely, but over time this can accumulate. Services can invoke
   * StartReconciliation and EndReconciliation to correct this usage drift, as
   * described below: 1. Service sends StartReconciliation with a timestamp in
   * future for each    metric that needs to be reconciled. The timestamp being in
   * future allows    to account for in-flight AllocateQuota and ReleaseQuota
   * requests for the    same metric. 2. One Platform records this timestamp and
   * starts tracking subsequent    AllocateQuota and ReleaseQuota requests until
   * EndReconciliation is    called. 3. At or after the time specified in the
   * StartReconciliation, service    sends EndReconciliation with the usage that
   * needs to be reconciled to. 4. One Platform adjusts its own record of usage
   * for that metric to the    value specified in EndReconciliation by taking in
   * to account any    allocation or release between StartReconciliation and
   * EndReconciliation.
   *
   * Signals the quota controller that the service wants to perform a usage
   * reconciliation as specified in the request.
   *
   * This method requires the `servicemanagement.services.quota` permission on the
   * specified service. For more information, see [Google Cloud
   * IAM](https://cloud.google.com/iam). (services.startReconciliation)
   *
   * @param string $serviceName Name of the service as specified in the service
   * configuration. For example, `"pubsub.googleapis.com"`.
   *
   * See google.api.Service for the definition of a service name.
   * @param Google_Service_ServiceControl_StartReconciliationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceControl_StartReconciliationResponse
   */
  public function startReconciliation($serviceName, Google_Service_ServiceControl_StartReconciliationRequest $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startReconciliation', array($params), "Google_Service_ServiceControl_StartReconciliationResponse");
  }
}
