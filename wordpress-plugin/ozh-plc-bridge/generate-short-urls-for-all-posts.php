<?php
/*
 * NOTE: you're supposed to load this file directly in your browser,
 * ie http://site.com/wp-content/plugins/ozh-plc-bridge/generate-short-urls-for-all-posts.php
 */

// Load the WordPress Environment
require('../../../wp-blog-header.php');
?>
<h1>Ozh's PLC - WP - Twitter Bridge</h1>
<h2>This file generates a short link for all your blog posts (from older to latest)</h2>
<ol>
<?php
add_filter('posts_orderby', create_function('', 'return "post_date ASC";') );

$archive_query = new WP_Query('showposts=99999');

while ($archive_query->have_posts()) : $archive_query->the_post();
	delete_post_meta($archive_query->post->ID, 'yourls_shorturl'); // remove any previously stored short url
	update_post_meta($archive_query->post->ID, 'yourls_tweeted', 1); // make as if all existing posts had already been tweeted
	echo '<li>'.wp_ozh_yourls_geturl($archive_query->post->ID) .' = ' . $archive_query->post->post_title . "</li>\n";
endwhile;
?>
</ol>

<h3>Done. You can now delete this file !</h3>