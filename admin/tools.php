<?php
define( 'YOURLS_ADMIN', true );
require_once dirname( dirname( __FILE__ ) ) . '/includes/load-yourls.php';
yourls_maybe_require_auth();

yourls_html_head( 'tools', yourls__( 'Cool YOURLS Tools' ) );
yourls_template_content( 'before', 'tools' );

yourls_html_htag( yourls__( 'Tools' ), 1 ); ?>

<div class="page-header">
	<?php yourls_html_htag( yourls__( 'Bookmarklets' ), 2, yourls__( 'Handy bookmarklets for easier link shortening and sharing' ) ); ?>
</div>

<?php
yourls_html_htag( yourls__( 'Classic Bookmarklets' ), 3 );

$bookmarks = array (
	'simple'    => array (
		'name'        => yourls__( 'Simple' ),
		'color'       => 'info',
		'description' => yourls__( 'The <span>Simple Bookmarklets</span> will generate a short URL with a random or sequential keyword.' ),
		'link'        => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0);%7D)()",
	),
	'standard'  => array (
		'name'        => yourls__( 'Standard' ),
		'color'       => 'success',
		'description' => yourls__( 'The <span>Standard Bookmarklets</span> will take you to a page where you can easily edit or delete your brand new short URL.' ),
		'link'        => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,k=prompt(%22Custom%20URL%22),k2=(k?'&k='+k:%22%22),p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2+k2,u=f+p;if(k!=null)%7Btry%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0)%7D%7D)()",
	),
	'instant'   => array (
		'name'        => yourls__( 'Instant' ),
		'color'       => 'warning',
		'description' => yourls__( 'The <span>Instant Bookmarklets</span> will pop the short URL without leaving the page you are viewing.' ),
		'link'        => "javascript:(function()%7Bvar%20d=document,s=d.createElement('script');window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&jsonp=yourls';void(d.body.appendChild(s));%7D)();",
	),
	'custom'    => array (
		'name'        => yourls__( 'Custom' ),
		'color'       => 'danger',
		'description' => yourls__( 'The <span>Custom Keyword Bookmarklets</span> will prompt you for a custom keyword first.' ),
		'link'        => "javascript:(function()%7Bvar%20d=document,k=prompt('Custom%20URL'),s=d.createElement('script');if(k!=null){window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&k='+k+'&jsonp=yourls';void(d.body.appendChild(s));%7D%7D)();",
	),
);
	
foreach ( $bookmarks as $bookmark ){
	echo '<a href="' . $bookmark[ 'link' ] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<div class="tools panel panel-' . $bookmark[ 'color' ] . '"><div class="panel-heading">' . $bookmark[ 'name' ] . '</div>';
	echo $bookmark[ 'description' ] . '</div></a>';
}

echo '<div class="clearfix"></div><p>';
yourls_add_label( yourls__( 'Heads up!' ), 'info', 'after' );
yourls_e( "If you want to share a description along with the link you're shortening, simply <span>select text</span> on the page you're viewing before clicking on your bookmarklet link" );
	
echo '</p><p>';
yourls_add_label( yourls__( 'Help' ), 'normal', 'after' );
echo yourls__( 'Click and drag links to your toolbar (or right-click and bookmark it)' ) . '</p>';
		
yourls_html_htag( yourls__( 'Social Bookmarklets' ), 3 );
		
$bookmarks = array ( // Bookmarklets, unformatted for readability: https://gist.github.com/ozh/5495656
	'facebook'        => array (
		'name'        => yourls__( 'YOURLS &amp; Facebook' ),
		'color'       => 'info',
		'description' => yourls__( 'Create a short URL and share it on social networks, all in one click!' ),
		'link'        => "javascript:(function(){var%20d=document,enc=encodeURIComponent,share='facebook',f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&share='+share,u=f+p;try{throw('ozhismygod');}catch(z){a=function(){if(!window.open(u,'Share','width=500,height=340,left=100','_blank'))l.href=u;};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}void(0);})();",
	),
	'twitter'   => array (
		'name'        => yourls__( 'YOURLS &amp; Twitter' ),
		'color'       => 'success',
		'description' => yourls__( 'Create a short URL and share it on social networks, all in one click!' ),
		'link'        => "javascript:(function(){var%20d=document,w=window,enc=encodeURIComponent,share='twitter',e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:'%20%22'+enc(s)+'%22'),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+s2+'&share='+share,u=f+p;try{throw('ozhismygod');}catch(z){a=function(){if(!w.open(u,'Share','width=780,height=265,left=100','_blank'))l.href=u;};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}void(0);})();",
	),
);
	
foreach ( $bookmarks as $bookmark ){
	echo '<a href="' . $bookmark[ 'link' ] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<div class="tools panel panel-' . $bookmark[ 'color' ] . '"><div class="panel-heading">' . $bookmark[ 'name' ] . '</div>';
	echo $bookmark[ 'description' ] . '</div></a>';
}

yourls_do_action( 'social_bookmarklet_buttons_after' ); 
		
echo '<div class="clearfix"></div><p>';
yourls_add_label( yourls__( 'Help' ), 'normal', 'after' );
yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it)' ) . '</p>';
?>
	
<div class="page-header">
	<?php yourls_html_htag( yourls__( 'Prefix-n-Shorten' ), 2 ); ?>
</div>
		
<p><?php yourls_se( "When viewing a page, you can also prefix its full URL: just head to your browser's address bar, add <code>%s</code> to the beginning of the current URL (right before its <code>http://</code> part) and hit enter.", preg_replace('@https?://@', '', YOURLS_SITE) . '/' ); ?></p>
		
<p>
<?php
yourls_add_label( yourls__( 'Note' ), 'warning', 'after' );
yourls_e('This will probably not work if your web server is running on Windows' );
if( yourls_is_windows() )
	echo ' ' . yourls__( '(which seems to be the case here)' );
?>.</p>

<?php if( yourls_is_private() ) { ?>

	<div class="page-header">
		<?php yourls_html_htag( yourls__( 'Secure API' ), 2 ); ?>
	</div>
	
	<p><?php
			yourls_e( 'YOURLS allows API calls the old fashioned way, using <code>username</code> and <code>password</code> parameters.' );
			echo "\n";
			yourls_e( "If you're worried about sending your credentials into the wild, you can also make API calls without using your login or your password, using a secret signature token." );
	?></p>

	<p><?php
			yourls_se( 'Your secret signature token: %s', '<strong><code id="signature">' . yourls_auth_signature() . '</code></strong>' );
			echo '<button id="btn-zclip" data-clipboard-target="signature"><i class="icon icon-paste"></i></button>';
			yourls_add_label( yourls__( "It's a secret. Keep it secret!" ), 'warning', 'before' );
	?></p>

	<p><?php
			yourls_add_label( yourls__( 'Help' ), 'normal', 'after' );
			yourls_e( 'This signature token can only be used with the API, not with the admin interface.' );
	?></p>
		
	<?php yourls_html_htag( yourls__( 'Usage of the signature token' ), 3 ); ?>
		
	<p><?php yourls_e( 'Simply use parameter <code>signature</code> in your API requests. Example:' ); ?><br />
	<code><?php echo YOURLS_SITE; ?>/yourls-api.php?signature=<?php echo yourls_auth_signature(); ?>&action=...</code></p>
				
	<?php yourls_html_htag( yourls__( 'Usage of a time limited signature token' ), 3 ); ?>
		
<pre>&lt;?php
$timestamp = time();
// <?php yourls_e( 'actual value:' ); ?> $time = <?php $time = time(); echo $time; ?> 
$signature = md5( $timestamp . '<?php echo yourls_auth_signature(); ?>' );
// <?php yourls_e( 'actual value:' ); ?> $signature = "<?php $sign = md5( $time. yourls_auth_signature() ); echo $sign; ?>"
?></pre>

	<p><?php yourls_e( 'Now use parameters <code>signature</code> and <code>timestamp</code> in your API requests. Example:' ); ?><br />
	<code><?php echo YOURLS_SITE; ?>/yourls-api.php?timestamp=<strong>$timestamp</strong>&signature=<strong>$signature</strong>&action=...</code></p>
	<p><?php yourls_e( 'Actual values:' ); ?><br/>
	<code><?php echo YOURLS_SITE; ?>/yourls-api.php?timestamp=<?php echo $time; ?>&signature=<?php echo $sign; ?>&action=...</code></p>
		
		
	<p><?php 
			yourls_add_label( yourls__( 'Info' ), 'success', 'after' );
			yourls_se( 'This URL would be valid for only %s seconds.', '<strong>' . YOURLS_NONCE_LIFE . '</strong>' ); 
	?></p>

	<hr />
	<p><em><?php yourls_se( 'See the <a href="%s">API documentation</a> for more.', YOURLS_SITE . '/docs/#api' ); ?></em></p>

<?php } // end is private 
		  
yourls_template_content( 'after', 'tools' );
?>