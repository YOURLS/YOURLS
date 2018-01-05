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

class Google_Service_CloudDebugger_Debuggee extends Google_Collection
{
  protected $collection_key = 'sourceContexts';
  public $agentVersion;
  public $description;
  protected $extSourceContextsType = 'Google_Service_CloudDebugger_ExtendedSourceContext';
  protected $extSourceContextsDataType = 'array';
  public $id;
  public $isDisabled;
  public $isInactive;
  public $labels;
  public $project;
  protected $sourceContextsType = 'Google_Service_CloudDebugger_SourceContext';
  protected $sourceContextsDataType = 'array';
  protected $statusType = 'Google_Service_CloudDebugger_StatusMessage';
  protected $statusDataType = '';
  public $uniquifier;

  public function setAgentVersion($agentVersion)
  {
    $this->agentVersion = $agentVersion;
  }
  public function getAgentVersion()
  {
    return $this->agentVersion;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_CloudDebugger_ExtendedSourceContext
   */
  public function setExtSourceContexts($extSourceContexts)
  {
    $this->extSourceContexts = $extSourceContexts;
  }
  /**
   * @return Google_Service_CloudDebugger_ExtendedSourceContext
   */
  public function getExtSourceContexts()
  {
    return $this->extSourceContexts;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsDisabled($isDisabled)
  {
    $this->isDisabled = $isDisabled;
  }
  public function getIsDisabled()
  {
    return $this->isDisabled;
  }
  public function setIsInactive($isInactive)
  {
    $this->isInactive = $isInactive;
  }
  public function getIsInactive()
  {
    return $this->isInactive;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setProject($project)
  {
    $this->project = $project;
  }
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param Google_Service_CloudDebugger_SourceContext
   */
  public function setSourceContexts($sourceContexts)
  {
    $this->sourceContexts = $sourceContexts;
  }
  /**
   * @return Google_Service_CloudDebugger_SourceContext
   */
  public function getSourceContexts()
  {
    return $this->sourceContexts;
  }
  /**
   * @param Google_Service_CloudDebugger_StatusMessage
   */
  public function setStatus(Google_Service_CloudDebugger_StatusMessage $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudDebugger_StatusMessage
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setUniquifier($uniquifier)
  {
    $this->uniquifier = $uniquifier;
  }
  public function getUniquifier()
  {
    return $this->uniquifier;
  }
}
