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
 * The "proposal" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $proposal = $tagmanagerService->proposal;
 *  </code>
 */
class Google_Service_TagManager_Resource_AccountsContainersWorkspacesProposal extends Google_Service_Resource
{
  /**
   * Creates a GTM Workspace Proposal. (proposal.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{aid}/containers/{cid}/workspace/{wid}
   * @param Google_Service_TagManager_CreateWorkspaceProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_WorkspaceProposal
   */
  public function create($parent, Google_Service_TagManager_CreateWorkspaceProposalRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_TagManager_WorkspaceProposal");
  }
  /**
   * Deletes a GTM Workspace Proposal. (proposal.delete)
   *
   * @param string $path GTM workspace proposal's relative path: Example:
   * accounts/{aid}/containers/{cid}/workspace/{wid}/workspace_proposal
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
}
