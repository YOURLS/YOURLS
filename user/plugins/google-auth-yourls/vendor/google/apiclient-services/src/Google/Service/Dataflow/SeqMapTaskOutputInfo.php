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

class Google_Service_Dataflow_SeqMapTaskOutputInfo extends Google_Model
{
  protected $sinkType = 'Google_Service_Dataflow_Sink';
  protected $sinkDataType = '';
  public $tag;

  /**
   * @param Google_Service_Dataflow_Sink
   */
  public function setSink(Google_Service_Dataflow_Sink $sink)
  {
    $this->sink = $sink;
  }
  /**
   * @return Google_Service_Dataflow_Sink
   */
  public function getSink()
  {
    return $this->sink;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
}
