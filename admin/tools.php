<?php
// Require Files
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

yourls_html_head( 'tools' );
yourls_html_logo();
yourls_html_menu();
?>

	<div class="sub_wrap">
	<h2>Bookmarklet</h2>
		
		<p>YOURLS comes with two handy <span>bookmarklets</span> for easier link shortening.</p>
		<ul>
			<li>The simple one generates a short URL from the page you are currently viewing.</li>
			<li>The second one does the same but first asks for a <span>custom URL keyword</span> &ndash; if you enter none a random one will be picked.</li>
		</ul>
		
		<p>The bookmarklets will take you to a page where you can easily <span>edit</span> or <span>delete</span> your brand new short URL.</p>
		
		<p>There is also a <span>Quick Share</span> tool box to make posting to Twitter, Facebook or Friendfeed a snap.</p>
		
		<p>If you want to share a description along with the link you're shortening, simply <span>select text</span> on the page you're viewing before clicking on your bookmarklet link</p>
		
		<h3>Simple bookmarklet</h3>
		
		<p>Click and drag the link to your toolbar: <a href="javascript:var%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='<?php echo YOURLS_SITE; ?>/admin/index.php',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0);" class="bookmarklet" onclick="alert('Drag to your toolbar!');return false;">Shorten</a> </p>
		
		<h3>Advanced bookmarklet (custom keyword)</h3>
		
		<p>Click and drag the link to your toolbar: <a href="javascript:var%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:('%22'+enc(s)+'%22')),f='<?php echo YOURLS_SITE; ?>/admin/index.php',l=d.location,k=prompt(%22Custom%20URL%22),k2=(k?'&k='+k:%22%22),p='?u='+enc(l.href)+'&t='+enc(d.title)+''+s2+k2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0)" class="bookmarklet" onclick="alert('Drag to your toolbar!');return false;">Custom shorten</a> </p>
	</div>
	
	<?php if( yourls_is_private() ) { ?>

	<div class="sub_wrap">
	<h2>Secure passwordless API call</h2>
		<p>YOURLS allows API calls the old fashioned way, using <tt>username</tt> and <tt>password</tt>
		parameters. If you're worried about sending your credentials into the wild, you can also make API
		calls without using your login or your password, using a secret signature token.</p>
		<p>This signature token can only be used with the API, not with the admin interface.</p>
		<p>Your secret signature token: <strong><?php echo yourls_auth_signature(); ?></strong>
		(It's a secret. Keep it secret)</p>
		
		<h3>Usage of the signature token</h3>
		<p>Simply use parameter <tt>signature</tt> in your API requests. Example:</p>
		<p><code><?php echo YOURLS_SITE; ?>/yourls-api.php?signature=<?php echo yourls_auth_signature(); ?>&action=...</code></p>
		
		<h3>Usage of a time limited signature token</h3>
<pre><code>&lt;?php
$timestamp = time();
<tt>// actual value: $time = <?php $time = time(); echo $time; ?></tt>
$signature = md5( $timestamp . '<?php echo yourls_auth_signature(); ?>' ); 
<tt>// actual value: $signature = "<?php $sign = md5( $time. yourls_auth_signature() ); echo $sign; ?>"</tt>
?> 
</code></pre>
		<p>Now use parameters <tt>signature</tt> and <tt>timestamp</tt> in your API requests. Example:</p>
		<p><code><?php echo YOURLS_SITE; ?>/yourls-api.php?timestamp=<?php echo $time; ?>&signature=<?php echo $sign; ?>&action=...</code></p>
		<p>This URL would be valid for only <?php echo YOURLS_NONCE_LIFE; ?> seconds</p>
		
	
		<p>(See the <a href="http://yourls.org/#API">API documentation</a> for more)</p>

	</div>

	<?php } ?>

<?php yourls_html_footer(); ?>