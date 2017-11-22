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
 * The "enterprises" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $enterprises = $androidenterpriseService->enterprises;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Enterprises extends Google_Service_Resource
{
  /**
   * Acknowledges notifications that were received from
   * Enterprises.PullNotificationSet to prevent subsequent calls from returning
   * the same notifications. (enterprises.acknowledgeNotificationSet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string notificationSetId The notification set ID as returned by
   * Enterprises.PullNotificationSet. This must be provided.
   */
  public function acknowledgeNotificationSet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('acknowledgeNotificationSet', array($params));
  }
  /**
   * Completes the signup flow, by specifying the Completion token and Enterprise
   * token. This request must not be called multiple times for a given Enterprise
   * Token. (enterprises.completeSignup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string completionToken The Completion token initially returned by
   * GenerateSignupUrl.
   * @opt_param string enterpriseToken The Enterprise token appended to the
   * Callback URL.
   * @return Google_Service_AndroidEnterprise_Enterprise
   */
  public function completeSignup($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('completeSignup', array($params), "Google_Service_AndroidEnterprise_Enterprise");
  }
  /**
   * Returns a unique token to access an embeddable UI. To generate a web UI, pass
   * the generated token into the managed Google Play javascript API. Each token
   * may only be used to start one UI session. See the javascript API
   * documentation for further information. (enterprises.createWebToken)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_AdministratorWebTokenSpec $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_AdministratorWebToken
   */
  public function createWebToken($enterpriseId, Google_Service_AndroidEnterprise_AdministratorWebTokenSpec $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createWebToken', array($params), "Google_Service_AndroidEnterprise_AdministratorWebToken");
  }
  /**
   * Deletes the binding between the EMM and enterprise. This is now deprecated.
   * Use this method only to unenroll customers that were previously enrolled with
   * the insert call, then enroll them again with the enroll call.
   * (enterprises.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Enrolls an enterprise with the calling EMM. (enterprises.enroll)
   *
   * @param string $token The token provided by the enterprise to register the
   * EMM.
   * @param Google_Service_AndroidEnterprise_Enterprise $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_Enterprise
   */
  public function enroll($token, Google_Service_AndroidEnterprise_Enterprise $postBody, $optParams = array())
  {
    $params = array('token' => $token, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enroll', array($params), "Google_Service_AndroidEnterprise_Enterprise");
  }
  /**
   * Generates a sign-up URL. (enterprises.generateSignupUrl)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string callbackUrl The callback URL to which the Admin will be
   * redirected after successfully creating an enterprise. Before redirecting
   * there the system will add a single query parameter to this URL named
   * "enterpriseToken" which will contain an opaque token to be used for the
   * CompleteSignup request. Beware that this means that the URL will be parsed,
   * the parameter added and then a new URL formatted, i.e. there may be some
   * minor formatting changes and, more importantly, the URL must be well-formed
   * so that it can be parsed.
   * @return Google_Service_AndroidEnterprise_SignupInfo
   */
  public function generateSignupUrl($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('generateSignupUrl', array($params), "Google_Service_AndroidEnterprise_SignupInfo");
  }
  /**
   * Retrieves the name and domain of an enterprise. (enterprises.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_Enterprise
   */
  public function get($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_Enterprise");
  }
  /**
   * Returns the Android Device Policy config resource.
   * (enterprises.getAndroidDevicePolicyConfig)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig
   */
  public function getAndroidDevicePolicyConfig($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('getAndroidDevicePolicyConfig', array($params), "Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig");
  }
  /**
   * Returns a service account and credentials. The service account can be bound
   * to the enterprise by calling setAccount. The service account is unique to
   * this enterprise and EMM, and will be deleted if the enterprise is unbound.
   * The credentials contain private key data and are not stored server-side.
   *
   * This method can only be called after calling Enterprises.Enroll or
   * Enterprises.CompleteSignup, and before Enterprises.SetAccount; at other times
   * it will return an error.
   *
   * Subsequent calls after the first will generate a new, unique set of
   * credentials, and invalidate the previously generated credentials.
   *
   * Once the service account is bound to the enterprise, it can be managed using
   * the serviceAccountKeys resource. (enterprises.getServiceAccount)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyType The type of credential to return with the service
   * account. Required.
   * @return Google_Service_AndroidEnterprise_ServiceAccount
   */
  public function getServiceAccount($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('getServiceAccount', array($params), "Google_Service_AndroidEnterprise_ServiceAccount");
  }
  /**
   * Returns the store layout for the enterprise. If the store layout has not been
   * set, returns "basic" as the store layout type and no homepage.
   * (enterprises.getStoreLayout)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreLayout
   */
  public function getStoreLayout($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('getStoreLayout', array($params), "Google_Service_AndroidEnterprise_StoreLayout");
  }
  /**
   * Establishes the binding between the EMM and an enterprise. This is now
   * deprecated; use enroll instead. (enterprises.insert)
   *
   * @param string $token The token provided by the enterprise to register the
   * EMM.
   * @param Google_Service_AndroidEnterprise_Enterprise $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_Enterprise
   */
  public function insert($token, Google_Service_AndroidEnterprise_Enterprise $postBody, $optParams = array())
  {
    $params = array('token' => $token, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidEnterprise_Enterprise");
  }
  /**
   * Looks up an enterprise by domain name. This is only supported for enterprises
   * created via the Google-initiated creation flow. Lookup of the id is not
   * needed for enterprises created via the EMM-initiated flow since the EMM
   * learns the enterprise ID in the callback specified in the
   * Enterprises.generateSignupUrl call. (enterprises.listEnterprises)
   *
   * @param string $domain The exact primary domain name of the enterprise to look
   * up.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_EnterprisesListResponse
   */
  public function listEnterprises($domain, $optParams = array())
  {
    $params = array('domain' => $domain);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_EnterprisesListResponse");
  }
  /**
   * Pulls and returns a notification set for the enterprises associated with the
   * service account authenticated for the request. The notification set may be
   * empty if no notification are pending. A notification set returned needs to be
   * acknowledged within 20 seconds by calling
   * Enterprises.AcknowledgeNotificationSet, unless the notification set is empty.
   * Notifications that are not acknowledged within the 20 seconds will eventually
   * be included again in the response to another PullNotificationSet request, and
   * those that are never acknowledged will ultimately be deleted according to the
   * Google Cloud Platform Pub/Sub system policy. Multiple requests might be
   * performed concurrently to retrieve notifications, in which case the pending
   * notifications (if any) will be split among each caller, if any are pending.
   * If no notifications are present, an empty notification list is returned.
   * Subsequent requests may return more notifications once they become available.
   * (enterprises.pullNotificationSet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMode The request mode for pulling notifications.
   * Specifying waitForNotifications will cause the request to block and wait
   * until one or more notifications are present, or return an empty notification
   * list if no notifications are present after some time. Speciying
   * returnImmediately will cause the request to immediately return the pending
   * notifications, or an empty list if no notifications are present. If omitted,
   * defaults to waitForNotifications.
   * @return Google_Service_AndroidEnterprise_NotificationSet
   */
  public function pullNotificationSet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('pullNotificationSet', array($params), "Google_Service_AndroidEnterprise_NotificationSet");
  }
  /**
   * Sends a test notification to validate the EMM integration with the Google
   * Cloud Pub/Sub service for this enterprise.
   * (enterprises.sendTestPushNotification)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_EnterprisesSendTestPushNotificationResponse
   */
  public function sendTestPushNotification($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('sendTestPushNotification', array($params), "Google_Service_AndroidEnterprise_EnterprisesSendTestPushNotificationResponse");
  }
  /**
   * Sets the account that will be used to authenticate to the API as the
   * enterprise. (enterprises.setAccount)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_EnterpriseAccount $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_EnterpriseAccount
   */
  public function setAccount($enterpriseId, Google_Service_AndroidEnterprise_EnterpriseAccount $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setAccount', array($params), "Google_Service_AndroidEnterprise_EnterpriseAccount");
  }
  /**
   * Sets the Android Device Policy config resource. EMM may use this method to
   * enable or disable Android Device Policy support for the specified enterprise.
   * To learn more about managing devices and apps with Android Device Policy, see
   * the Android Management API. (enterprises.setAndroidDevicePolicyConfig)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig
   */
  public function setAndroidDevicePolicyConfig($enterpriseId, Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setAndroidDevicePolicyConfig', array($params), "Google_Service_AndroidEnterprise_AndroidDevicePolicyConfig");
  }
  /**
   * Sets the store layout for the enterprise. By default, storeLayoutType is set
   * to "basic" and the basic store layout is enabled. The basic layout only
   * contains apps approved by the admin, and that have been added to the
   * available product set for a user (using the  setAvailableProductSet call).
   * Apps on the page are sorted in order of their product ID value. If you create
   * a custom store layout (by setting storeLayoutType = "custom" and setting a
   * homepage), the basic store layout is disabled. (enterprises.setStoreLayout)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param Google_Service_AndroidEnterprise_StoreLayout $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreLayout
   */
  public function setStoreLayout($enterpriseId, Google_Service_AndroidEnterprise_StoreLayout $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setStoreLayout', array($params), "Google_Service_AndroidEnterprise_StoreLayout");
  }
  /**
   * Unenrolls an enterprise from the calling EMM. (enterprises.unenroll)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   */
  public function unenroll($enterpriseId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId);
    $params = array_merge($params, $optParams);
    return $this->call('unenroll', array($params));
  }
}
