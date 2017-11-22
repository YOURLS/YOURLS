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
 * The "relyingparty" collection of methods.
 * Typical usage is:
 *  <code>
 *   $identitytoolkitService = new Google_Service_IdentityToolkit(...);
 *   $relyingparty = $identitytoolkitService->relyingparty;
 *  </code>
 */
class Google_Service_IdentityToolkit_Resource_Relyingparty extends Google_Service_Resource
{
  /**
   * Creates the URI used by the IdP to authenticate the user.
   * (relyingparty.createAuthUri)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_CreateAuthUriResponse
   */
  public function createAuthUri(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createAuthUri', array($params), "Google_Service_IdentityToolkit_CreateAuthUriResponse");
  }
  /**
   * Delete user account. (relyingparty.deleteAccount)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_DeleteAccountResponse
   */
  public function deleteAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteAccount', array($params), "Google_Service_IdentityToolkit_DeleteAccountResponse");
  }
  /**
   * Batch download user accounts. (relyingparty.downloadAccount)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_DownloadAccountResponse
   */
  public function downloadAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('downloadAccount', array($params), "Google_Service_IdentityToolkit_DownloadAccountResponse");
  }
  /**
   * Reset password for a user. (relyingparty.emailLinkSignin)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyEmailLinkSigninRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_EmailLinkSigninResponse
   */
  public function emailLinkSignin(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyEmailLinkSigninRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('emailLinkSignin', array($params), "Google_Service_IdentityToolkit_EmailLinkSigninResponse");
  }
  /**
   * Returns the account info. (relyingparty.getAccountInfo)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_GetAccountInfoResponse
   */
  public function getAccountInfo(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getAccountInfo', array($params), "Google_Service_IdentityToolkit_GetAccountInfoResponse");
  }
  /**
   * Get a code for user action confirmation.
   * (relyingparty.getOobConfirmationCode)
   *
   * @param Google_Service_IdentityToolkit_Relyingparty $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_GetOobConfirmationCodeResponse
   */
  public function getOobConfirmationCode(Google_Service_IdentityToolkit_Relyingparty $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getOobConfirmationCode', array($params), "Google_Service_IdentityToolkit_GetOobConfirmationCodeResponse");
  }
  /**
   * Get project configuration. (relyingparty.getProjectConfig)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string delegatedProjectNumber Delegated GCP project number of the
   * request.
   * @opt_param string projectNumber GCP project number of the request.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetProjectConfigResponse
   */
  public function getProjectConfig($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getProjectConfig', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetProjectConfigResponse");
  }
  /**
   * Get token signing public key. (relyingparty.getPublicKeys)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetPublicKeysResponse
   */
  public function getPublicKeys($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getPublicKeys', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetPublicKeysResponse");
  }
  /**
   * Get recaptcha secure param. (relyingparty.getRecaptchaParam)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_GetRecaptchaParamResponse
   */
  public function getRecaptchaParam($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getRecaptchaParam', array($params), "Google_Service_IdentityToolkit_GetRecaptchaParamResponse");
  }
  /**
   * Reset password for a user. (relyingparty.resetPassword)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_ResetPasswordResponse
   */
  public function resetPassword(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetPassword', array($params), "Google_Service_IdentityToolkit_ResetPasswordResponse");
  }
  /**
   * Send SMS verification code. (relyingparty.sendVerificationCode)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySendVerificationCodeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySendVerificationCodeResponse
   */
  public function sendVerificationCode(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySendVerificationCodeRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sendVerificationCode', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySendVerificationCodeResponse");
  }
  /**
   * Set account info for a user. (relyingparty.setAccountInfo)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_SetAccountInfoResponse
   */
  public function setAccountInfo(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setAccountInfo', array($params), "Google_Service_IdentityToolkit_SetAccountInfoResponse");
  }
  /**
   * Set project configuration. (relyingparty.setProjectConfig)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetProjectConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetProjectConfigResponse
   */
  public function setProjectConfig(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetProjectConfigRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setProjectConfig', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetProjectConfigResponse");
  }
  /**
   * Sign out user. (relyingparty.signOutUser)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignOutUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignOutUserResponse
   */
  public function signOutUser(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignOutUserRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('signOutUser', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignOutUserResponse");
  }
  /**
   * Signup new user. (relyingparty.signupNewUser)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignupNewUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_SignupNewUserResponse
   */
  public function signupNewUser(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignupNewUserRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('signupNewUser', array($params), "Google_Service_IdentityToolkit_SignupNewUserResponse");
  }
  /**
   * Batch upload existing user accounts. (relyingparty.uploadAccount)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_UploadAccountResponse
   */
  public function uploadAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('uploadAccount', array($params), "Google_Service_IdentityToolkit_UploadAccountResponse");
  }
  /**
   * Verifies the assertion returned by the IdP. (relyingparty.verifyAssertion)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_VerifyAssertionResponse
   */
  public function verifyAssertion(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verifyAssertion', array($params), "Google_Service_IdentityToolkit_VerifyAssertionResponse");
  }
  /**
   * Verifies the developer asserted ID token. (relyingparty.verifyCustomToken)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyCustomTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_VerifyCustomTokenResponse
   */
  public function verifyCustomToken(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyCustomTokenRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verifyCustomToken', array($params), "Google_Service_IdentityToolkit_VerifyCustomTokenResponse");
  }
  /**
   * Verifies the user entered password. (relyingparty.verifyPassword)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_VerifyPasswordResponse
   */
  public function verifyPassword(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verifyPassword', array($params), "Google_Service_IdentityToolkit_VerifyPasswordResponse");
  }
  /**
   * Verifies ownership of a phone number and creates/updates the user account
   * accordingly. (relyingparty.verifyPhoneNumber)
   *
   * @param Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse
   */
  public function verifyPhoneNumber(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('verifyPhoneNumber', array($params), "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPhoneNumberResponse");
  }
}
