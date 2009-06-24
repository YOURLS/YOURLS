<?php
### Require Files
require_once( dirname(dirname(__FILE__)).'/includes/config.php' );

### Variables
$error_msg = array();
$success_msg = array();

### Create Table Query
$create_tables = array();
$create_tables[YOURLS_DB_TABLE_URL] = 'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_URL.'` ('.
							 '`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,'.
							 '`url` VARCHAR(200) NOT NULL,'.
							 '`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,'.
							 '`ip` VARCHAR(41) NOT NULL,'.
							 '`clicks` INT(10) UNSIGNED NOT NULL,'.
							 'PRIMARY KEY  (`id`)'.
							') ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;';
$create_tables[YOURLS_DB_TABLE_NEXTDEC] = 'CREATE TABLE `'.YOURLS_DB_TABLE_NEXTDEC.'` ('.
									'`next_id` BIGINT NOT NULL ,'.
									'PRIMARY KEY (`next_id`)'.
									') ENGINE = MYISAM ;';

### Insert Initial Records
$insert_queries = array();
$insert_queries[] = 'INSERT INTO '.YOURLS_DB_TABLE_NEXTDEC.' VALUES (1)';

### Connect To Database
$db = yourls_db_connect();

## Install YOURLS
if(isset($_REQUEST['install'])) {
	$create_table_count = 0;
	$insert_query_count = 0;
	foreach($create_tables as $table_name => $table_query) {
		$db->query($table_query);
		$create_success = $db->query("SHOW TABLES LIKE '$table_name'");
		if($create_success) {
			$create_table_count++;
			$success_msg[] = "Table '$table_name' created."; 
		} else {
			$error_msg[] = "Error creating table '$table_name'."; 
		}
	}
	foreach($insert_queries as $insert_query) {
		$insert_success = $db->query($insert_query);
		if($insert_success) {
			$insert_query_count++;
			$success_msg[] = 'Query '.$insert_query_count.'/'.sizeof($insert_queries).' executed successfully.'; 
		} else {
			$error_msg[] = 'Error executing '.$insert_query_count.'/'.sizeof($insert_queries).'.'; 
		}
	}
	if(sizeof($create_tables) == $create_table_count && sizeof($insert_queries) == $insert_query_count) {
		$success_msg[] = 'YOURLS successfully installed.';
	} else {
		$error_msg[] = "Error installing YOURLS."; 
	}
} else {
	// Check Whether YOURLS Is Installed
	$db->show_errors = false;
	$is_installed = $db->get_var('SELECT next_id FROM '.YOURLS_DB_TABLE_NEXTDEC);
	if($is_installed != NULL) {
		$error_msg[] = 'YOURLS has already been installed.';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Install &laquo; YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="copyright" content="Copyright &copy; 2008-<?php echo date('Y'); ?> YOURS" />
	<meta name="author" content="Ozh RICHARD, Lester Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/style.css" type="text/css" media="screen" />
	<script src="<?php echo YOURLS_SITE; ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
</head>
<body>
<div id="login">
	<form method="post" action="?"><?php // reset any QUERY parameters ?>
		<p>
			<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" />
		</p>
		<?php
			// Print out any error messages
			if(sizeof($error_msg) > 0) {
				echo '<p class="error">';
				foreach($error_msg as $error) {
					echo $error.'<br />';
				}
				echo '</p>';
			}
			// Print out any success messages
			if(sizeof($success_msg) > 0) {
				echo '<p class="success">';
				foreach($success_msg as $success) {
					echo $success.'<br />';
				}
				echo '</p>';
			}
			// Display install button
			if($is_installed == NULL && !isset($_REQUEST['install'])) {
				echo '<p>&nbsp;</p><p style="text-align: center;"><input type="submit" name="install" value="Install YOURLS" class="button" /></p>';
			} else {
				echo '<p>&nbsp;</p><p style="text-align: center;">&raquo; <a href="'.YOURLS_SITE.'/admin/" title="YOURS Administration Page">YOURS Administration Page</a></p>';
			}
		?>
	</form>
</div>
</body>
</html>