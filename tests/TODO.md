# Tests to write

We should write tests about...  
_List to be completed any time we think about a function that's not covered_

- api
- fetching data
	* IP
	* Geo
	* Referrer
- upgrade
- search (?)
- more database manipulations

### In tests/misc.php:
* options ?
* yourls_create_nonce( $action, $user = false )
* yourls_verify_nonce( $action, $nonce = false, $user = false, $return = '' )
* yourls_get_relative_url( $url, $strict = true )
* maintenance mode (feature not ready yet)

### In tests/formatting.php
* yourls_get_remote_title( $url ) with various awful UTF8 cases