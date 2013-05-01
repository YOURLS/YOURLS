<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( dirname( __FILE__ ) ).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

yourls_html_head( 'tools', yourls__( 'Cool YOURLS Tools' ) );
yourls_html_logo();
yourls_html_menu();
?>

	<div class="sub_wrap">
	
	<h2><?php yourls_e( 'Bookmarklets' ); ?></h2>
	
		<p><?php yourls_e( 'YOURLS comes with handy <span>bookmarklets</span> for easier link shortening and sharing.' ); ?></p>

		<h3><?php yourls_e( 'Standard or Instant, Simple or Custom' ); ?></h3>
		
		<ul>
			<li><?php yourls_e( 'The <span>Standard Bookmarklets</span> will take you to a page where you can easily edit or delete your brand new short URL.' ); ?></li>
			
			<li><?php yourls_e( 'The <span>Instant Bookmarklets</span> will pop the short URL without leaving the page you are viewing.' ); ?></li>
			
			<li><?php yourls_e( 'The <span>Simple Bookmarklets</span> will generate a short URL with a random or sequential keyword.' ); ?></li>
			
			<li><?php yourls_e( 'The <span>Custom Keyword Bookmarklets</span> will prompt you for a custom keyword first.' ); ?></li>
		</ul>
		
		<p><?php
		yourls_e( "If you want to share a description along with the link you're shortening, simply <span>select text</span> on the page you're viewing before clicking on your bookmarklet link" );
		?></p>
		
		<h3><?php yourls_e( 'The Bookmarklets' ); ?></h3>
		
		<p><?php yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it)' ); ?></p>
		
		<table class="tblSorter" cellpadding="0" cellspacing="1">
			<thead>
			<tr>
				<td>&nbsp;</td>
				<th><?php yourls_e( 'Standard (new page)' ); ?></th>
				<th><?php yourls_e( 'Instant (popup)' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<th class="header"><?php yourls_e( 'Simple' ); ?></th>
				<td><a href="javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='<?php echo yourls_admin_url('index.php'); ?>',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0);%7D)()" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'Shorten' ); ?></a></td>
				<td><a href="javascript:(function()%7Bvar%20d=document,s=d.createElement('script');window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='<?php echo yourls_admin_url('index.php'); ?>?u='+encodeURIComponent(d.location.href)+'&jsonp=yourls';void(d.body.appendChild(s));%7D)();" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'Instant Shorten' ); ?></a></td>
			</tr>
			<tr>
				<th class="header"><?php yourls_e( 'Custom Keyword' ); ?></th>
				<td><a href="javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='<?php echo yourls_admin_url('index.php'); ?>',l=d.location,k=prompt(%22Custom%20URL%22),k2=(k?'&k='+k:%22%22),p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2+k2,u=f+p;if(k!=null)%7Btry%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0)%7D%7D)()" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'Custom shorten' ); ?></a></td>
				<td><a href="javascript:(function()%7Bvar%20d=document,k=prompt('Custom%20URL'),s=d.createElement('script');if(k!=null){window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='<?php echo yourls_admin_url('index.php'); ?>?u='+encodeURIComponent(d.location.href)+'&k='+k+'&jsonp=yourls';void(d.body.appendChild(s));%7D%7D)();" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'Instant Custom Shorten' ); ?></a></td>
			</tr>
			</tbody>
		</table>
		
		<h3><?php yourls_e( 'Social Bookmarklets' ); ?></h3>
		
		<p><?php yourls_e( 'Create a short URL and share it on social networks, all in one click!' ); ?> 	
		<?php yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it)' ); ?></p>

		<p><?php yourls_e( 'Shorten and share:' ); ?>
		<a href="javascript:(function(){var%20d=document,enc=encodeURIComponent,share='facebook',f='<?php echo yourls_admin_url('index.php'); ?>',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&share='+share,u=f+p;try{throw('ozhismygod');}catch(z){a=function(){if(!window.open(u,'Share','width=500,height=340,left=100','_blank'))l.href=u;};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}void(0);})();" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'YOURLS &amp; Facebook' ); ?></a>

		<a href="javascript:(function(){var%20d=document,w=window,enc=encodeURIComponent,share='twitter',e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:'%20%22'+enc(s)+'%22'),f='<?php echo yourls_admin_url("index.php"); ?>',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+s2+'&share='+share,u=f+p;try{throw('ozhismygod');}catch(z){a=function(){if(!w.open(u,'Share','width=780,height=265,left=100','_blank'))l.href=u;};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}void(0);})();" class="bookmarklet" onclick="alert('<?php echo yourls_esc_attr__( 'Drag to your toolbar!' ); ?>');return false;"><?php yourls_e( 'YOURLS &amp; Twitter' ); ?></a>
		
		<?php // Bookmarklets, unformatted for readability: https://gist.github.com/ozh/5495656 ?>
		
		<?php yourls_do_action( 'social_bookmarklet_buttons_after' ); ?>
		
		</p>

	<h2><?php yourls_e( 'Prefix-n-Shorten' ); ?></h2>
		
		<p><?php yourls_se( "When viewing a page, you can also prefix its full URL: just head to your browser's address bar, add \"<span>%s</span>\" to the beginning of the current URL (right before its 'http://' part) and hit enter.", preg_replace('@https?://@', '', YOURLS_SITE) . '/' ); ?></p>
		
		<p><?php
		yourls_e( 'Note: this will probably not work if your web server is running on Windows' );
		if( yourls_is_windows() )
			yourls_e( ' (which seems to be the case here)' );
		?>.</p>


	<?php if( yourls_is_private() ) { ?>

	<h2><?php yourls_e( 'Secure passwordless API call' ); ?></h2>
	
		<p><?php
		yourls_e( 'YOURLS allows API calls the old fashioned way, using <tt>username</tt> and <tt>password</tt> parameters.' );
		echo "\n";
		yourls_e( "If you're worried about sending your credentials into the wild, you can also make API calls without using your login or your password, using a secret signature token." );
		?></p>

		<p><?php
		yourls_se( 'Your secret signature token: <strong><code>%s</code></strong>', yourls_auth_signature() );
		yourls_e( "(It's a secret. Keep it secret) ");
		?></p>

		<p><?php yourls_e( 'This signature token can only be used with the API, not with the admin interface.' ); ?></p>
		
		<ul>
			<li><h3><?php yourls_e( 'Usage of the signature token' ); ?></h3>
			<p><?php yourls_e( 'Simply use parameter <tt>signature</tt> in your API requests. Example:' ); ?></p>
			<p><code><?php echo YOURLS_SITE; ?>/yourls-api.php?signature=<?php echo yourls_auth_signature(); ?>&action=...</code></p>
			</li>
		
			<li><h3><?php yourls_e( 'Usage of a time limited signature token' ); ?></h3>
<pre><code>&lt;?php
$timestamp = time();
<tt>// <?php yourls_e( 'actual value:' ); ?> $time = <?php $time = time(); echo $time; ?></tt>
$signature = md5( $timestamp . '<?php echo yourls_auth_signature(); ?>' ); 
<tt>// <?php yourls_e( 'actual value:' ); ?> $signature = "<?php $sign = md5( $time. yourls_auth_signature() ); echo $sign; ?>"</tt>
?> 
</code></pre>
		<p><?php yourls_e( 'Now use parameters <tt>signature</tt> and <tt>timestamp</tt> in your API requests. Example:' ); ?></p>
		<p><code><?php echo YOURLS_SITE; ?>/yourls-api.php?timestamp=<strong>$timestamp</strong>&signature=<strong>$signature</strong>&action=...</code></p>
		<p><?php yourls_e( 'Actual values:' ); ?><br/>
		<tt><?php echo YOURLS_SITE; ?>/yourls-api.php?timestamp=<?php echo $time; ?>&signature=<?php echo $sign; ?>&action=...</tt></p>
		<p><?php yourls_se( 'This URL would be valid for only %s seconds', YOURLS_NONCE_LIFE ); ?></p>
		</li>
	</ul>
	
	<p><?php yourls_se( 'See the <a href="%s">API documentation</a> for more', YOURLS_SITE . '/readme.html#API' ); ?></p>

	</div>

	<?php } // end is private ?>

<?php yourls_html_footer(); ?>
