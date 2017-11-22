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
 * The "workspaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $workspaces = $tagmanagerService->workspaces;
 *  </code>
 */
class Google_Service_TagManager_Resource_AccountsContainersWorkspaces extends Google_Service_Resource
{
  /**
   * Creates a Workspace. (workspaces.create)
   *
   * @param string $parent GTM parent Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param Google_Service_TagManager_Workspace $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_Workspace
   */
  public function create($parent, Google_Service_TagManager_Workspace $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_TagManager_Workspace");
  }
  /**
   * Creates a Container Version from the entities present in the workspace,
   * deletes the workspace, and sets the base container version to the newly
   * created version. (workspaces.create_version)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Google_Service_TagManager_CreateContainerVersionRequestVersionOptions $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_CreateContainerVersionResponse
   */
  public function create_version($path, Google_Service_TagManager_CreateContainerVersionRequestVersionOptions $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create_version', array($params), "Google_Service_TagManager_CreateContainerVersionResponse");
  }
  /**
   * Deletes a Workspace. (workspaces.delete)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a Workspace. (workspaces.get)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_Workspace
   */
  public function get($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_TagManager_Workspace");
  }
  /**
   * Gets a GTM Workspace Proposal. (workspaces.getProposal)
   *
   * @param string $path GTM workspace proposal's relative path: Example:
   * accounts/{aid}/containers/{cid}/workspace/{wid}/workspace_proposal
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_WorkspaceProposal
   */
  public function getProposal($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('getProposal', array($params), "Google_Service_TagManager_WorkspaceProposal");
  }
  /**
   * Finds conflicting and modified entities in the workspace.
   * (workspaces.getStatus)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_GetWorkspaceStatusResponse
   */
  public function getStatus($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('getStatus', array($params), "Google_Service_TagManager_GetWorkspaceStatusResponse");
  }
  /**
   * Lists all Workspaces that belong to a GTM Container.
   * (workspaces.listAccountsContainersWorkspaces)
   *
   * @param string $parent GTM parent Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return Google_Service_TagManager_ListWorkspacesResponse
   */
  public function listAccountsContainersWorkspaces($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_TagManager_ListWorkspacesResponse");
  }
  /**
   * Quick previews a workspace by creating a fake container version from all
   * entities in the provided workspace. (workspaces.quick_preview)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_QuickPreviewResponse
   */
  public function quick_preview($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('quick_preview', array($params), "Google_Service_TagManager_QuickPreviewResponse");
  }
  /**
   * Resolves a merge conflict for a workspace entity by updating it to the
   * resolved entity passed in the request. (workspaces.resolve_conflict)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Google_Service_TagManager_Entity $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the entity_in_workspace in the merge conflict.
   */
  public function resolve_conflict($path, Google_Service_TagManager_Entity $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resolve_conflict', array($params));
  }
  /**
   * Syncs a workspace to the latest container version by updating all unmodified
   * workspace entities and displaying conflicts for modified entities.
   * (workspaces.sync)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_SyncWorkspaceResponse
   */
  public function sync($path, $optParams = array())
  {
    $params = array('path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('sync', array($params), "Google_Service_TagManager_SyncWorkspaceResponse");
  }
  /**
   * Updates a Workspace. (workspaces.update)
   *
   * @param string $path GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Google_Service_TagManager_Workspace $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the workspace in storage.
   * @return Google_Service_TagManager_Workspace
   */
  public function update($path, Google_Service_TagManager_Workspace $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_TagManager_Workspace");
  }
  /**
   * Updates a GTM Workspace Proposal. (workspaces.updateProposal)
   *
   * @param string $path GTM workspace proposal's relative path: Example:
   * accounts/{aid}/containers/{cid}/workspace/{wid}/workspace_proposal
   * @param Google_Service_TagManager_UpdateWorkspaceProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_TagManager_WorkspaceProposal
   */
  public function updateProposal($path, Google_Service_TagManager_UpdateWorkspaceProposalRequest $postBody, $optParams = array())
  {
    $params = array('path' => $path, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateProposal', array($params), "Google_Service_TagManager_WorkspaceProposal");
  }
}
