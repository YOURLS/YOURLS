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
 * The "beacons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $beacons = $proximitybeaconService->beacons;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_Beacons extends Google_Service_Resource
{
  /**
   * Activates a beacon. A beacon that is active will return information and
   * attachment data when queried via `beaconinfo.getforobserved`. Calling this
   * method on an already active beacon will do nothing (but will return a
   * successful response code).
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.activate)
   *
   * @param string $beaconName Beacon that should be activated. A beacon name has
   * the format "beacons/N!beaconId" where the beaconId is the base16 ID broadcast
   * by the beacon and N is a code for the beacon's type. Possible values are `3`
   * for Eddystone-UID, `4` for Eddystone-EID, `1` for iBeacon, or `5` for
   * AltBeacon. For Eddystone-EID beacons, you may use either the current EID or
   * the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to activate. If the
   * project id is not specified then the project making the request is used. The
   * project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconEmpty
   */
  public function activate($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_Proximitybeacon_ProximitybeaconEmpty");
  }
  /**
   * Deactivates a beacon. Once deactivated, the API will not return information
   * nor attachment data for the beacon when queried via
   * `beaconinfo.getforobserved`. Calling this method on an already inactive
   * beacon will do nothing (but will return a successful response code).
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.deactivate)
   *
   * @param string $beaconName Beacon that should be deactivated. A beacon name
   * has the format "beacons/N!beaconId" where the beaconId is the base16 ID
   * broadcast by the beacon and N is a code for the beacon's type. Possible
   * values are `3` for Eddystone-UID, `4` for Eddystone-EID, `1` for iBeacon, or
   * `5` for AltBeacon. For Eddystone-EID beacons, you may use either the current
   * EID or the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to deactivate. If
   * the project id is not specified then the project making the request is used.
   * The project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconEmpty
   */
  public function deactivate($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('deactivate', array($params), "Google_Service_Proximitybeacon_ProximitybeaconEmpty");
  }
  /**
   * Decommissions the specified beacon in the service. This beacon will no longer
   * be returned from `beaconinfo.getforobserved`. This operation is permanent --
   * you will not be able to re-register a beacon with this ID again.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.decommission)
   *
   * @param string $beaconName Beacon that should be decommissioned. A beacon name
   * has the format "beacons/N!beaconId" where the beaconId is the base16 ID
   * broadcast by the beacon and N is a code for the beacon's type. Possible
   * values are `3` for Eddystone-UID, `4` for Eddystone-EID, `1` for iBeacon, or
   * `5` for AltBeacon. For Eddystone-EID beacons, you may use either the current
   * EID of the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to decommission. If
   * the project id is not specified then the project making the request is used.
   * The project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconEmpty
   */
  public function decommission($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('decommission', array($params), "Google_Service_Proximitybeacon_ProximitybeaconEmpty");
  }
  /**
   * Deletes the specified beacon including all diagnostics data for the beacon as
   * well as any attachments on the beacon (including those belonging to other
   * projects). This operation cannot be undone.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.delete)
   *
   * @param string $beaconName Beacon that should be deleted. A beacon name has
   * the format "beacons/N!beaconId" where the beaconId is the base16 ID broadcast
   * by the beacon and N is a code for the beacon's type. Possible values are `3`
   * for Eddystone-UID, `4` for Eddystone-EID, `1` for iBeacon, or `5` for
   * AltBeacon. For Eddystone-EID beacons, you may use either the current EID or
   * the beacon's "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to delete. If not
   * provided, the project that is making the request is used. Optional.
   * @return Google_Service_Proximitybeacon_ProximitybeaconEmpty
   */
  public function delete($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Proximitybeacon_ProximitybeaconEmpty");
  }
  /**
   * Returns detailed information about the specified beacon.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **viewer**, **Is owner** or **Can edit** permissions in
   * the Google Developers Console project.
   *
   * Requests may supply an Eddystone-EID beacon name in the form:
   * `beacons/4!beaconId` where the `beaconId` is the base16 ephemeral ID
   * broadcast by the beacon. The returned `Beacon` object will contain the
   * beacon's stable Eddystone-UID. Clients not authorized to resolve the beacon's
   * ephemeral Eddystone-EID broadcast will receive an error. (beacons.get)
   *
   * @param string $beaconName Resource name of this beacon. A beacon name has the
   * format "beacons/N!beaconId" where the beaconId is the base16 ID broadcast by
   * the beacon and N is a code for the beacon's type. Possible values are `3` for
   * Eddystone-UID, `4` for Eddystone-EID, `1` for iBeacon, or `5` for AltBeacon.
   * For Eddystone-EID beacons, you may use either the current EID or the beacon's
   * "stable" UID. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to request. If the
   * project id is not specified then the project making the request is used. The
   * project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_Beacon
   */
  public function get($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Proximitybeacon_Beacon");
  }
  /**
   * Searches the beacon registry for beacons that match the given search
   * criteria. Only those beacons that the client has permission to list will be
   * returned.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **viewer**, **Is owner** or **Can edit** permissions in
   * the Google Developers Console project. (beacons.listBeacons)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token obtained from a previous
   * request to list beacons.
   * @opt_param string q Filter query string that supports the following field
   * filters:
   *
   * * **description:`""`**   For example: **description:"Room 3"**   Returns
   * beacons whose description matches tokens in the string "Room 3"   (not
   * necessarily that exact string).   The string must be double-quoted. *
   * **status:``**   For example: **status:active**   Returns beacons whose status
   * matches the given value. Values must be   one of the Beacon.Status enum
   * values (case insensitive). Accepts   multiple filters which will be combined
   * with OR logic. * **stability:``**   For example: **stability:mobile**
   * Returns beacons whose expected stability matches the given value.   Values
   * must be one of the Beacon.Stability enum values (case   insensitive). Accepts
   * multiple filters which will be combined with   OR logic. * **place\_id:`""`**
   * For example: **place\_id:"ChIJVSZzVR8FdkgRXGmmm6SslKw="**   Returns beacons
   * explicitly registered at the given place, expressed as   a Place ID obtained
   * from [Google Places API](/places/place-id). Does not   match places inside
   * the given place. Does not consider the beacon's   actual location (which may
   * be different from its registered place).   Accepts multiple filters that will
   * be combined with OR logic. The place   ID must be double-quoted. *
   * **registration\_time`[<|>|<=|>=]`**   For example:
   * **registration\_time>=1433116800**   Returns beacons whose registration time
   * matches the given filter.   Supports the operators: <, >, <=, and >=.
   * Timestamp must be expressed as   an integer number of seconds since midnight
   * January 1, 1970 UTC. Accepts   at most two filters that will be combined with
   * AND logic, to support   "between" semantics. If more than two are supplied,
   * the latter ones are   ignored. * **lat:` lng: radius:`**   For example:
   * **lat:51.1232343 lng:-1.093852 radius:1000**   Returns beacons whose
   * registered location is within the given circle.   When any of these fields
   * are given, all are required. Latitude and   longitude must be decimal degrees
   * between -90.0 and 90.0 and between   -180.0 and 180.0 respectively. Radius
   * must be an integer number of   meters between 10 and 1,000,000 (1000 km). *
   * **property:`"="`**   For example: **property:"battery-type=CR2032"**
   * Returns beacons which have a property of the given name and value.   Supports
   * multiple filters which will be combined with OR logic.   The entire
   * name=value string must be double-quoted as one string. *
   * **attachment\_type:`""`**   For example: **attachment_type:"my-namespace/my-
   * type"**   Returns beacons having at least one attachment of the given
   * namespaced   type. Supports "any within this namespace" via the partial
   * wildcard   syntax: "my-namespace". Supports multiple filters which will be
   * combined with OR logic. The string must be double-quoted. *
   * **indoor\_level:`""`**   For example: **indoor\_level:"1"**   Returns beacons
   * which are located on the given indoor level. Accepts   multiple filters that
   * will be combined with OR logic.
   *
   * Multiple filters on the same field are combined with OR logic (except
   * registration_time which is combined with AND logic). Multiple filters on
   * different fields are combined with AND logic. Filters should be separated by
   * spaces.
   *
   * As with any HTTP query string parameter, the whole filter expression must be
   * URL-encoded.
   *
   * Example REST request: `GET
   * /v1beta1/beacons?q=status:active%20lat:51.123%20lng:-1.095%20radius:1000`
   * @opt_param int pageSize The maximum number of records to return for this
   * request, up to a server-defined upper limit.
   * @opt_param string projectId The project id to list beacons under. If not
   * present then the project credential that made the request is used as the
   * project. Optional.
   * @return Google_Service_Proximitybeacon_ListBeaconsResponse
   */
  public function listBeacons($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Proximitybeacon_ListBeaconsResponse");
  }
  /**
   * Registers a previously unregistered beacon given its `advertisedId`. These
   * IDs are unique within the system. An ID can be registered only once.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.register)
   *
   * @param Google_Service_Proximitybeacon_Beacon $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the project the beacon will be
   * registered to. If the project id is not specified then the project making the
   * request is used. Optional.
   * @return Google_Service_Proximitybeacon_Beacon
   */
  public function register(Google_Service_Proximitybeacon_Beacon $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('register', array($params), "Google_Service_Proximitybeacon_Beacon");
  }
  /**
   * Updates the information about the specified beacon. **Any field that you do
   * not populate in the submitted beacon will be permanently erased**, so you
   * should follow the "read, modify, write" pattern to avoid inadvertently
   * destroying data.
   *
   * Changes to the beacon status via this method will be  silently ignored. To
   * update beacon status, use the separate methods on this API for activation,
   * deactivation, and decommissioning. Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **Is owner** or **Can edit** permissions in the Google
   * Developers Console project. (beacons.update)
   *
   * @param string $beaconName Resource name of this beacon. A beacon name has the
   * format "beacons/N!beaconId" where the beaconId is the base16 ID broadcast by
   * the beacon and N is a code for the beacon's type. Possible values are `3` for
   * Eddystone, `1` for iBeacon, or `5` for AltBeacon.
   *
   * This field must be left empty when registering. After reading a beacon,
   * clients can use the name for future operations.
   * @param Google_Service_Proximitybeacon_Beacon $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId The project id of the beacon to update. If the
   * project id is not specified then the project making the request is used. The
   * project id must match the project that owns the beacon. Optional.
   * @return Google_Service_Proximitybeacon_Beacon
   */
  public function update($beaconName, Google_Service_Proximitybeacon_Beacon $postBody, $optParams = array())
  {
    $params = array('beaconName' => $beaconName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Proximitybeacon_Beacon");
  }
}
