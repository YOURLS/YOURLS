<?php
// Require Files
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

yourls_html_head( 'tools' );
?>
	<h1>
		<a href="<?php echo YOURLS_SITE; ?>/admin/index.php" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
		<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
	</h1>
	<?php if ( yourls_is_private() ) { ?>
	<p>Your are logged in as: <strong><?php echo YOURLS_USER; ?></strong>. <a href="?mode=logout" title="Logout">Logout</a></p>
	<?php } ?>

	<div id="tools_desc">

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

<?php yourls_html_footer(); ?>