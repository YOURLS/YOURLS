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

class Google_Service_TagManager_WorkspaceProposal extends Google_Collection
{
  protected $collection_key = 'reviewers';
  protected $authorsType = 'Google_Service_TagManager_WorkspaceProposalUser';
  protected $authorsDataType = 'array';
  public $fingerprint;
  protected $historyType = 'Google_Service_TagManager_WorkspaceProposalHistory';
  protected $historyDataType = 'array';
  public $path;
  protected $reviewersType = 'Google_Service_TagManager_WorkspaceProposalUser';
  protected $reviewersDataType = 'array';
  public $status;

  /**
   * @param Google_Service_TagManager_WorkspaceProposalUser
   */
  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }
  /**
   * @return Google_Service_TagManager_WorkspaceProposalUser
   */
  public function getAuthors()
  {
    return $this->authors;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Google_Service_TagManager_WorkspaceProposalHistory
   */
  public function setHistory($history)
  {
    $this->history = $history;
  }
  /**
   * @return Google_Service_TagManager_WorkspaceProposalHistory
   */
  public function getHistory()
  {
    return $this->history;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Google_Service_TagManager_WorkspaceProposalUser
   */
  public function setReviewers($reviewers)
  {
    $this->reviewers = $reviewers;
  }
  /**
   * @return Google_Service_TagManager_WorkspaceProposalUser
   */
  public function getReviewers()
  {
    return $this->reviewers;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
