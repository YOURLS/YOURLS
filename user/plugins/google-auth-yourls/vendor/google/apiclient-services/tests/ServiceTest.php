<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class Google_Service_ServiceTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    // ensure dependent classes exist
    $this->getMock('Google_Service');
    $this->getMock('Google_Model');
    $this->getMock('Google_Collection');
    $this->getMock('Google_Service_Resource');
  }

  /**
   * @dataProvider serviceProvider
   */
  public function testIncludes($class)
  {
    $this->assertTrue(
        class_exists($class),
        sprintf('Failed asserting class %s exists.', $class)
    );
  }

  public function testCaseConflicts()
  {
    $apis = $this->apiProvider();
    $classes = array_unique(array_map('strtolower', $apis));
    $this->assertCount(count($apis), $classes);
  }

  public function serviceProvider()
  {
    $classes = array();
    $path = __DIR__ . '/../src/Google/Service/';
    foreach (glob($path . "*.php") as $file) {
      $service = basename($file, '.php');
      $classes[] = array('Google_Service_' . $service);
      foreach (glob($path . "{$service}/*.php") as $file) {
        $classes[] = array("Google_Service_{$service}_" . basename($file, '.php'));
      }
      foreach (glob($path . "{$service}/Resource/*.php") as $file) {
        $classes[] = array("Google_Service_{$service}_Resource_" . basename($file, '.php'));
      }
    }

    return $classes;
  }

  public function apiProvider()
  {
    $classes = array();
    $path = __DIR__ . '/../src/Google/Service/*';
    return array_filter(glob($path), 'is_dir');
  }
}
