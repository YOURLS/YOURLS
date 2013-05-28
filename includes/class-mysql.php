<?php

/**********************************************************************
*  Author: Justin Vincent (jv@vip.ie)
*  Web...: http://justinvincent.com
*  Name..: ezSQL
*  Desc..: ezSQL Core module - database abstraction library to make
*          it very easy to deal with databases. ezSQLcore can not be used by 
*          itself (it is designed for use by database specific modules).
*
*/

/**********************************************************************
*  ezSQL Constants
*/

define('EZSQL_VERSION','2.17');
define('OBJECT','OBJECT',true);
define('ARRAY_A','ARRAY_A',true);
define('ARRAY_N','ARRAY_N',true);

/**********************************************************************
*  Core class containg common functions to manipulate query result
*  sets once returned
*/

class ezSQLcore
{

	var $trace            = false;  // same as $debug_all
	var $debug_all        = false;  // same as $trace
	var $debug_called     = false;
	var $vardump_called   = false;
	var $show_errors      = true;
	var $num_queries      = 0;
	var $last_query       = null;
	var $last_error       = null;
	var $col_info         = null;
	var $captured_errors  = array();
	var $cache_dir        = false;
	var $cache_queries    = false;
	var $cache_inserts    = false;
	var $use_disk_cache   = false;
	var $cache_timeout    = 24; // hours
	var $timers           = array();
	var $total_query_time = 0;
	var $db_connect_time  = 0;
	var $trace_log        = array();
	var $use_trace_log    = false;
	var $sql_log_file     = false;
	var $do_profile       = false;
	var $profile_times    = array();
	var $all_queries      = '';

	// == TJH == default now needed for echo of debug function
	var $debug_echo_is_on = true;

	/**********************************************************************
	*  Constructor
	*/

	function ezSQLcore()
	{
	}

	/**********************************************************************
	*  Print SQL/DB error - over-ridden by specific DB class
	*/

	function register_error($err_str)
	{
		// Keep track of last error
		$this->last_error = $err_str;

		// Capture all errors to an error array no matter what happens
		$this->captured_errors[] = array
		(
			'error_str' => $err_str,
			'query'     => $this->last_query
		);
	}

	/**********************************************************************
	*  Turn error handling on or off..
	*/

	function show_errors()
	{
		$this->show_errors = true;
	}

	function hide_errors()
	{
		$this->show_errors = false;
	}

	/**********************************************************************
	*  Kill cached query results
	*/

	function flush()
	{
		// Get rid of these
		$this->last_result = null;
		$this->col_info = null;
		$this->last_query = null;
		$this->from_disk_cache = false;
	}

	/**********************************************************************
	*  Get one variable from the DB - see docs for more detail
	*/

	function get_var($query=null,$x=0,$y=0)
	{

		// Log how the function was called
		$this->func_call = "\$db->get_var(\"$query\",$x,$y)";

		// If there is a query then perform it if not then use cached results..
		if ( $query )
		{
			$this->query($query);
		}

		// Extract var out of cached results based x,y vals
		if ( $this->last_result[$y] )
		{
			$values = array_values(get_object_vars($this->last_result[$y]));
		}

		// If there is a value return it else return null
		return (isset($values[$x]) && $values[$x]!=='')?$values[$x]:null;
	}

	/**********************************************************************
	*  Get one row from the DB - see docs for more detail
	*/

	function get_row($query=null,$output=OBJECT,$y=0)
	{

		// Log how the function was called
		$this->func_call = "\$db->get_row(\"$query\",$output,$y)";

		// If there is a query then perform it if not then use cached results..
		if ( $query )
		{
			$this->query($query);
		}

		// If the output is an object then return object using the row offset..
		if ( $output == OBJECT )
		{
			return $this->last_result[$y]?$this->last_result[$y]:null;
		}
		// If the output is an associative array then return row as such..
		elseif ( $output == ARRAY_A )
		{
			return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
		}
		// If the output is an numerical array then return row as such..
		elseif ( $output == ARRAY_N )
		{
			return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
		}
		// If invalid output type was specified..
		else
		{
			$this->show_errors ? trigger_error(" \$db->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N",E_USER_WARNING) : null;
		}

	}

	/**********************************************************************
	*  Function to get 1 column from the cached result set based in X index
	*  see docs for usage and info
	*/

	function get_col($query=null,$x=0)
	{

		$new_array = array();

		// If there is a query then perform it if not then use cached results..
		if ( $query )
		{
			$this->query($query);
		}

		// Extract the column values
		for ( $i=0; $i < count($this->last_result); $i++ )
		{
			$new_array[$i] = $this->get_var(null,$x,$i);
		}

		return $new_array;
	}


	/**********************************************************************
	*  Return the the query as a result set - see docs for more details
	*/

	function get_results($query=null, $output = OBJECT)
	{

		// Log how the function was called
		$this->func_call = "\$db->get_results(\"$query\", $output)";

		// If there is a query then perform it if not then use cached results..
		if ( $query )
		{
			$this->query($query);
		}

		// Send back array of objects. Each row is an object
		if ( $output == OBJECT )
		{
			return $this->last_result;
		}
		elseif ( $output == ARRAY_A || $output == ARRAY_N )
		{
			if ( $this->last_result )
			{
				$i=0;
				foreach( $this->last_result as $row )
				{

					$new_array[$i] = get_object_vars($row);

					if ( $output == ARRAY_N )
					{
						$new_array[$i] = array_values($new_array[$i]);
					}

					$i++;
				}

				return $new_array;
			}
			else
			{
				return null;
			}
		}
	}


	/**********************************************************************
	*  Function to get column meta data info pertaining to the last query
	* see docs for more info and usage
	*/

	function get_col_info($info_type="name",$col_offset=-1)
	{

		if ( $this->col_info )
		{
			if ( $col_offset == -1 )
			{
				$i=0;
				foreach($this->col_info as $col )
				{
					$new_array[$i] = $col->{$info_type};
					$i++;
				}
				return $new_array;
			}
			else
			{
				return $this->col_info[$col_offset]->{$info_type};
			}

		}

	}

	/**********************************************************************
	*  store_cache
	*/

	function store_cache($query,$is_insert)
	{

		// The would be cache file for this query
		$cache_file = $this->cache_dir.'/'.md5($query);

		// disk caching of queries
		if ( $this->use_disk_cache && ( $this->cache_queries && ! $is_insert ) || ( $this->cache_inserts && $is_insert ))
		{
			if ( ! is_dir($this->cache_dir) )
			{
				$this->register_error("Could not open cache dir: $this->cache_dir");
				$this->show_errors ? trigger_error("Could not open cache dir: $this->cache_dir",E_USER_WARNING) : null;
			}
			else
			{
				// Cache all result values
				$result_cache = array
				(
					'col_info' => $this->col_info,
					'last_result' => $this->last_result,
					'num_rows' => $this->num_rows,
					'return_value' => $this->num_rows,
				);
				file_put_contents($cache_file, serialize($result_cache));
				if( file_exists($cache_file . ".updating") )
					unlink($cache_file . ".updating");
			}
		}

	}

	/**********************************************************************
	*  get_cache
	*/

	function get_cache($query)
	{

		// The would be cache file for this query
		$cache_file = $this->cache_dir.'/'.md5($query);

		// Try to get previously cached version
		if ( $this->use_disk_cache && file_exists($cache_file) )
		{
			// Only use this cache file if less than 'cache_timeout' (hours)
			if ( (time() - filemtime($cache_file)) > ($this->cache_timeout*3600) && 
				!(file_exists($cache_file . ".updating") && (time() - filemtime($cache_file . ".updating") < 60)) ) 
			{
				touch($cache_file . ".updating"); // Show that we in the process of updating the cache
			}
			else
			{
				$result_cache = unserialize(file_get_contents($cache_file));

				$this->col_info = $result_cache['col_info'];
				$this->last_result = $result_cache['last_result'];
				$this->num_rows = $result_cache['num_rows'];

				$this->from_disk_cache = true;

				// If debug ALL queries
				$this->trace || $this->debug_all ? $this->debug() : null ;

				return $result_cache['return_value'];
			}
		}

	}

	/**********************************************************************
	*  Dumps the contents of any input variable to screen in a nicely
	*  formatted and easy to understand way - any type: Object, Var or Array
	*/

	function vardump($mixed='')
	{

		// Start outup buffering
		ob_start();

		echo "<p><table><tr><td bgcolor=ffffff><blockquote><font color=000090>";
		echo "<pre><font face=arial>";

		if ( ! $this->vardump_called )
		{
			echo "<font color=800080><b>ezSQL</b> (v".EZSQL_VERSION.") <b>Variable Dump..</b></font>\n\n";
		}

		$var_type = gettype ($mixed);
		print_r(($mixed?$mixed:"<font color=red>No Value / False</font>"));
		echo "\n\n<b>Type:</b> " . ucfirst($var_type) . "\n";
		echo "<b>Last Query</b> [$this->num_queries]<b>:</b> ".($this->last_query?$this->last_query:"NULL")."\n";
		echo "<b>Last Function Call:</b> " . ($this->func_call?$this->func_call:"None")."\n";
		echo "<b>Last Rows Returned:</b> ".count($this->last_result)."\n";
		echo "</font></pre></font></blockquote></td></tr></table>".$this->donation();
		echo "\n<hr size=1 noshade color=dddddd>";

		// Stop output buffering and capture debug HTML
		$html = ob_get_contents();
		ob_end_clean();

		// Only echo output if it is turned on
		if ( $this->debug_echo_is_on )
		{
			echo $html;
		}

		$this->vardump_called = true;

		return $html;

	}

	/**********************************************************************
	*  Alias for the above function
	*/

	function dumpvar($mixed)
	{
		$this->vardump($mixed);
	}

	/**********************************************************************
	*  Displays the last query string that was sent to the database & a
	* table listing results (if there were any).
	* (abstracted into a seperate file to save server overhead).
	*/

	function debug($print_to_screen=true)
	{

		// Start outup buffering
		ob_start();

		echo "<blockquote>";

		// Only show ezSQL credits once..
		if ( ! $this->debug_called )
		{
			echo "<font color=800080 face=arial size=2><b>ezSQL</b> (v".EZSQL_VERSION.") <b>Debug..</b></font><p>\n";
		}

		if ( $this->last_error )
		{
			echo "<font face=arial size=2 color=000099><b>Last Error --</b> [<font color=000000><b>$this->last_error</b></font>]<p>";
		}

		if ( $this->from_disk_cache )
		{
			echo "<font face=arial size=2 color=000099><b>Results retrieved from disk cache</b></font><p>";
		}

		echo "<font face=arial size=2 color=000099><b>Query</b> [$this->num_queries] <b>--</b> ";
		echo "[<font color=000000><b>$this->last_query</b></font>]</font><p>";

			echo "<font face=arial size=2 color=000099><b>Query Result..</b></font>";
			echo "<blockquote>";

		if ( $this->col_info )
		{

			// =====================================================
			// Results top rows

			echo "<table cellpadding=5 cellspacing=1 bgcolor=555555>";
			echo "<tr bgcolor=eeeeee><td nowrap valign=bottom><font color=555599 face=arial size=2><b>(row)</b></font></td>";


			for ( $i=0; $i < count($this->col_info); $i++ )
			{
				echo "<td nowrap align=left valign=top><font size=1 color=555599 face=arial>{$this->col_info[$i]->type} {$this->col_info[$i]->max_length}</font><br><span style='font-family: arial; font-size: 10pt; font-weight: bold;'>{$this->col_info[$i]->name}</span></td>";
			}

			echo "</tr>";

			// ======================================================
			// print main results

		if ( $this->last_result )
		{

			$i=0;
			foreach ( $this->get_results(null,ARRAY_N) as $one_row )
			{
				$i++;
				echo "<tr bgcolor=ffffff><td bgcolor=eeeeee nowrap align=middle><font size=2 color=555599 face=arial>$i</font></td>";

				foreach ( $one_row as $item )
				{
					echo "<td nowrap><font face=arial size=2>$item</font></td>";
				}

				echo "</tr>";
			}

		} // if last result
		else
		{
			echo "<tr bgcolor=ffffff><td colspan=".(count($this->col_info)+1)."><font face=arial size=2>No Results</font></td></tr>";
		}

		echo "</table>";

		} // if col_info
		else
		{
			echo "<font face=arial size=2>No Results</font>";
		}

		echo "</blockquote></blockquote>".$this->donation()."<hr noshade color=dddddd size=1>";

		// Stop output buffering and capture debug HTML
		$html = ob_get_contents();
		ob_end_clean();

		// Only echo output if it is turned on
		if ( $this->debug_echo_is_on && $print_to_screen)
		{
			echo $html;
		}

		$this->debug_called = true;

		return $html;

	}

	/**********************************************************************
	*  Naughty little function to ask for some remuniration!
	*/

	function donation()
	{
		return "<font size=1 face=arial color=000000>If ezSQL has helped <a href=\"https://www.paypal.com/xclick/business=justin%40justinvincent.com&item_name=ezSQL&no_note=1&tax=0\" style=\"color: 0000CC;\">make a donation!?</a> &nbsp;&nbsp;<!--[ go on! you know you want to! ]--></font>";
	}

	/**********************************************************************
	*  Timer related functions
	*/

	function timer_get_cur()
	{
		list($usec, $sec) = explode(" ",microtime());
		return ((float)$usec + (float)$sec);
	}

	function timer_start($timer_name)
	{
		$this->timers[$timer_name] = $this->timer_get_cur();
	}

	function timer_elapsed($timer_name)
	{
		return round($this->timer_get_cur() - $this->timers[$timer_name],2);
	}

	function timer_update_global($timer_name)
	{
		if ( $this->do_profile )
		{
			$this->profile_times[] = array
			(
				'query' => $this->last_query,
				'time' => $this->timer_elapsed($timer_name)
			);
		}
		
		$this->total_query_time += $this->timer_elapsed($timer_name);
	}

	/**********************************************************************
	* Creates a SET nvp sql string from an associative array (and escapes all values)
	*
	*  Usage:
	*
	*     $db_data = array('login'=>'jv','email'=>'jv@vip.ie', 'user_id' => 1, 'created' => 'NOW()');
	*
	*     $db->query("INSERT INTO users SET ".$db->get_set($db_data));
	*
	*     ...OR...
	*
	*     $db->query("UPDATE users SET ".$db->get_set($db_data)." WHERE user_id = 1");
	*
	* Output:
	*
	*     login = 'jv', email = 'jv@vip.ie', user_id = 1, created = NOW()
	*/

	function get_set($parms)
	{		
		$sql = '';
		foreach ( $parms as $field => $val )
		{
			if ( $val === 'true' ) $val = 1;
			if ( $val === 'false' ) $val = 0;
		
			if ( $val == 'NOW()' )
			{
				$sql .= "$field = ".$this->escape($val).", ";
			}
			else
			{
				$sql .= "$field = '".$this->escape($val)."', ";
			}
		}
	
		return substr($sql,0,-2);
	}

}


/**********************************************************************
*  Author: Justin Vincent (jv@jvmultimedia.com)
*  Web...: http://twitter.com/justinvincent
*  Name..: ezSQL_mysql
*  Desc..: mySQL component (part of ezSQL databse abstraction library)
*
*/

/**********************************************************************
*  ezSQL error strings - mySQL
*/

$ezsql_mysql_str = array
(
	1 => 'Require $dbuser and $dbpassword to connect to a database server',
	2 => 'Error establishing mySQL database connection. Correct user/password? Correct hostname? Database server running?',
	3 => 'Require $dbname to select a database',
	4 => 'mySQL database connection is not active',
	5 => 'Unexpected error while trying to select database'
);

/**********************************************************************
*  ezSQL Database specific class - mySQL
*/

if ( ! function_exists ('mysql_connect') ) die('<b>Fatal Error:</b> ezSQL_mysql requires mySQL Lib to be compiled and or linked in to the PHP engine');
if ( ! class_exists ('ezSQLcore') ) die('<b>Fatal Error:</b> ezSQL_mysql requires ezSQLcore (ez_sql_core.php) to be included/loaded before it can be used');

class ezSQL_mysql extends ezSQLcore
{

	var $dbuser = false;
	var $dbpassword = false;
	var $dbname = false;
	var $dbhost = false;
	var $encoding = false;

	/**********************************************************************
	*  Constructor - allow the user to perform a qucik connect at the
	*  same time as initialising the ezSQL_mysql class
	*/

	function ezSQL_mysql($dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='')
	{
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
		$this->encoding = $encoding;
	}

	/**********************************************************************
	*  Short hand way to connect to mySQL database server
	*  and select a mySQL database at the same time
	*/

	function quick_connect($dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='')
	{
		$return_val = false;
		if ( ! $this->connect($dbuser, $dbpassword, $dbhost,true) ) ;
		else if ( ! $this->select($dbname,$encoding) ) ;
		else $return_val = true;
		return $return_val;
	}

	/**********************************************************************
	*  Try to connect to mySQL database server
	*/

	function connect($dbuser='', $dbpassword='', $dbhost='localhost')
	{
		global $ezsql_mysql_str; $return_val = false;
		
		// Keep track of how long the DB takes to connect
		$this->timer_start('db_connect_time');

		// Must have a user and a password
		if ( ! $dbuser )
		{
			$this->register_error($ezsql_mysql_str[1].' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($ezsql_mysql_str[1],E_USER_WARNING) : null;
		}
		// Try to establish the server database handle
		else if ( ! $this->dbh = @mysql_connect($dbhost,$dbuser,$dbpassword,true,131074) )
		{
			$this->register_error($ezsql_mysql_str[2].' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($ezsql_mysql_str[2],E_USER_WARNING) : null;
		}
		else
		{
			$this->dbuser = $dbuser;
			$this->dbpassword = $dbpassword;
			$this->dbhost = $dbhost;
			$return_val = true;
		}

		return $return_val;
	}

	/**********************************************************************
	*  Try to select a mySQL database
	*/

	function select($dbname='', $encoding='')
	{
		global $ezsql_mysql_str; $return_val = false;

		// Must have a database name
		if ( ! $dbname )
		{
			$this->register_error($ezsql_mysql_str[3].' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($ezsql_mysql_str[3],E_USER_WARNING) : null;
		}

		// Must have an active database connection
		else if ( ! $this->dbh )
		{
			$this->register_error($ezsql_mysql_str[4].' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($ezsql_mysql_str[4],E_USER_WARNING) : null;
		}

		// Try to connect to the database
		else if ( !@mysql_select_db($dbname,$this->dbh) )
		{
			// Try to get error supplied by mysql if not use our own
			if ( !$str = @mysql_error($this->dbh))
				  $str = $ezsql_mysql_str[5];

			$this->register_error($str.' in '.__FILE__.' on line '.__LINE__);
			$this->show_errors ? trigger_error($str,E_USER_WARNING) : null;
		}
		else
		{
			$this->dbname = $dbname;
			if($encoding!='')
			{
				$encoding = strtolower(str_replace("-","",$encoding));
				$charsets = array();
				$result = mysql_query("SHOW CHARACTER SET");
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))
				{
					$charsets[] = $row["Charset"];
				}
				if(in_array($encoding,$charsets)){
					mysql_query("SET NAMES '".$encoding."'");						
				}
			}
			
			$return_val = true;
		}

		return $return_val;
	}

	/**********************************************************************
	*  Format a mySQL string correctly for safe mySQL insert
	*  (no mater if magic quotes are on or not)
	*/

	function escape($str)
	{
		// If there is no existing database connection then try to connect
		if ( ! isset($this->dbh) || ! $this->dbh )
		{
			$this->connect($this->dbuser, $this->dbpassword, $this->dbhost);
			$this->select($this->dbname, $this->encoding);
		}

		return mysql_real_escape_string(stripslashes($str));
	}

	/**********************************************************************
	*  Return mySQL specific system date syntax
	*  i.e. Oracle: SYSDATE Mysql: NOW()
	*/

	function sysdate()
	{
		return 'NOW()';
	}

	/**********************************************************************
	*  Perform mySQL query and try to detirmin result value
	*/

	function query($query)
	{

		// This keeps the connection alive for very long running scripts
		if ( $this->num_queries >= 500 )
		{
			$this->disconnect();
			$this->quick_connect($this->dbuser,$this->dbpassword,$this->dbname,$this->dbhost,$this->encoding);
		}

		// Initialise return
		$return_val = 0;

		// Flush cached values..
		$this->flush();

		// For reg expressions
		$query = trim($query);

		// Log how the function was called
		$this->func_call = "\$db->query(\"$query\")";

		// Keep track of the last query for debug..
		$this->last_query = $query;

		// Count how many queries there have been
		$this->num_queries++;
		
		// Keep history of all queries
		$this->all_queries .= $query.'<br />';
		
		// Start timer
		$this->timer_start($this->num_queries);

		// Use core file cache function
		if ( $cache = $this->get_cache($query) )
		{
			// Keep tack of how long all queries have taken
			$this->timer_update_global($this->num_queries);

			// Trace all queries
			if ( $this->use_trace_log )
			{
				$this->trace_log[] = $this->debug(false);
			}
			
			return $cache;
		}

		// If there is no existing database connection then try to connect
		if ( ! isset($this->dbh) || ! $this->dbh )
		{
			$this->connect($this->dbuser, $this->dbpassword, $this->dbhost);
			$this->select($this->dbname,$this->encoding);
		}

		// Perform the query via std mysql_query function..
		$this->result = @mysql_query($query,$this->dbh);

		// If there is an error then take note of it..
		if ( $str = @mysql_error($this->dbh) )
		{
			$is_insert = true;
			$this->register_error($str);
			$this->show_errors ? trigger_error($str,E_USER_WARNING) : null;
			return false;
		}

		// Query was an insert, delete, update, replace
		$is_insert = false;
		if ( preg_match("/^(insert|delete|update|replace|truncate|drop|create|alter)\s+/i",$query) )
		{
			$this->rows_affected = @mysql_affected_rows($this->dbh);

			// Take note of the insert_id
			if ( preg_match("/^(insert|replace)\s+/i",$query) )
			{
				$this->insert_id = @mysql_insert_id($this->dbh);
			}

			// Return number fo rows affected
			$return_val = $this->rows_affected;
		}
		// Query was a select
		else
		{

			// Take note of column info
			$i=0;
			while ($i < @mysql_num_fields($this->result))
			{
				$this->col_info[$i] = @mysql_fetch_field($this->result);
				$i++;
			}

			// Store Query Results
			$num_rows=0;
			while ( $row = @mysql_fetch_object($this->result) )
			{
				// Store relults as an objects within main array
				$this->last_result[$num_rows] = $row;
				$num_rows++;
			}

			@mysql_free_result($this->result);

			// Log number of rows the query returned
			$this->num_rows = $num_rows;

			// Return number of rows selected
			$return_val = $this->num_rows;
		}

		// disk caching of queries
		$this->store_cache($query,$is_insert);

		// If debug ALL queries
		$this->trace || $this->debug_all ? $this->debug() : null ;

		// Keep tack of how long all queries have taken
		$this->timer_update_global($this->num_queries);

		// Trace all queries
		if ( $this->use_trace_log )
		{
			$this->trace_log[] = $this->debug(false);
		}

		return $return_val;

	}
	
	/**********************************************************************
	*  Close the active mySQL connection
	*/

	function disconnect()
	{
		@mysql_close($this->dbh);	
	}

	function mysql_version() {
		return  mysql_get_server_info( $this->dbh ) ;
	}
}
