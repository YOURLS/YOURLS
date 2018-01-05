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
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $subscriptions = $androidpublisherService->subscriptions;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_PurchasesSubscriptions extends Google_Service_Resource
{
  /**
   * Cancels a user's subscription purchase. The subscription remains valid until
   * its expiration time. (subscriptions.cancel)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function cancel($packageName, $subscriptionId, $token, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params));
  }
  /**
   * Defers a user's subscription purchase until a specified future expiration
   * time. (subscriptions.defer)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param Google_Service_AndroidPublisher_SubscriptionPurchasesDeferRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_SubscriptionPurchasesDeferResponse
   */
  public function defer($packageName, $subscriptionId, $token, Google_Service_AndroidPublisher_SubscriptionPurchasesDeferRequest $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('defer', array($params), "Google_Service_AndroidPublisher_SubscriptionPurchasesDeferResponse");
  }
  /**
   * Checks whether a user's subscription purchase is valid and returns its expiry
   * time. (subscriptions.get)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_SubscriptionPurchase
   */
  public function get($packageName, $subscriptionId, $token, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_SubscriptionPurchase");
  }
  /**
   * Refunds a user's subscription purchase, but the subscription remains valid
   * until its expiration time and it will continue to recur.
   * (subscriptions.refund)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function refund($packageName, $subscriptionId, $token, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token);
    $params = array_merge($params, $optParams);
    return $this->call('refund', array($params));
  }
  /**
   * Refunds and immediately revokes a user's subscription purchase. Access to the
   * subscription will be terminated immediately and it will stop recurring.
   * (subscriptions.revoke)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function revoke($packageName, $subscriptionId, $token, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token);
    $params = array_merge($params, $optParams);
    return $this->call('revoke', array($params));
  }
}
