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
 * The "zoneViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourceviewsService = new Google_Service_Resourceviews(...);
 *   $zoneViews = $resourceviewsService->zoneViews;
 *  </code>
 */
class Google_Service_Resourceviews_Resource_ZoneViews extends Google_Service_Resource
{
  /**
   * Add resources to the view. (zoneViews.addResources)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param Google_Service_Resourceviews_ZoneViewsAddResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_Operation
   */
  public function addResources($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsAddResourcesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addResources', array($params), "Google_Service_Resourceviews_Operation");
  }
  /**
   * Delete a resource view. (zoneViews.delete)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_Operation
   */
  public function delete($project, $zone, $resourceView, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Resourceviews_Operation");
  }
  /**
   * Get the information of a zonal resource view. (zoneViews.get)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_ResourceView
   */
  public function get($project, $zone, $resourceView, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Resourceviews_ResourceView");
  }
  /**
   * Get the service information of a resource view or a resource.
   * (zoneViews.getService)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string resourceName The name of the resource if user wants to get
   * the service information of the resource.
   * @return Google_Service_Resourceviews_ZoneViewsGetServiceResponse
   */
  public function getService($project, $zone, $resourceView, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView);
    $params = array_merge($params, $optParams);
    return $this->call('getService', array($params), "Google_Service_Resourceviews_ZoneViewsGetServiceResponse");
  }
  /**
   * Create a resource view. (zoneViews.insert)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param Google_Service_Resourceviews_ResourceView $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_Operation
   */
  public function insert($project, $zone, Google_Service_Resourceviews_ResourceView $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Resourceviews_Operation");
  }
  /**
   * List resource views. (zoneViews.listZoneViews)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 5000, inclusive. (Default: 5000)
   * @opt_param string pageToken Specifies a nextPageToken returned by a previous
   * list request. This token can be used to request the next page of results from
   * a previous list request.
   * @return Google_Service_Resourceviews_ZoneViewsList
   */
  public function listZoneViews($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Resourceviews_ZoneViewsList");
  }
  /**
   * List the resources of the resource view. (zoneViews.listResources)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format The requested format of the return value. It can be
   * URL or URL_PORT. A JSON object will be included in the response based on the
   * format. The default format is NONE, which results in no JSON in the response.
   * @opt_param string listState The state of the instance to list. By default, it
   * lists all instances.
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 5000, inclusive. (Default: 5000)
   * @opt_param string pageToken Specifies a nextPageToken returned by a previous
   * list request. This token can be used to request the next page of results from
   * a previous list request.
   * @opt_param string serviceName The service name to return in the response. It
   * is optional and if it is not set, all the service end points will be
   * returned.
   * @return Google_Service_Resourceviews_ZoneViewsListResourcesResponse
   */
  public function listResources($project, $zone, $resourceView, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView);
    $params = array_merge($params, $optParams);
    return $this->call('listResources', array($params), "Google_Service_Resourceviews_ZoneViewsListResourcesResponse");
  }
  /**
   * Remove resources from the view. (zoneViews.removeResources)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_Operation
   */
  public function removeResources($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeResources', array($params), "Google_Service_Resourceviews_Operation");
  }
  /**
   * Update the service information of a resource view or a resource.
   * (zoneViews.setService)
   *
   * @param string $project The project name of the resource view.
   * @param string $zone The zone name of the resource view.
   * @param string $resourceView The name of the resource view.
   * @param Google_Service_Resourceviews_ZoneViewsSetServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Resourceviews_Operation
   */
  public function setService($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsSetServiceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setService', array($params), "Google_Service_Resourceviews_Operation");
  }
}
