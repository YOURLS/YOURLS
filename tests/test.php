<?php

class Tests_test extends PHPUnit_Framework_TestCase {

	function test() {
		$this->assertFalse( yourls_is_installed() );
	}

}