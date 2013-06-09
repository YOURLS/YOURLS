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

echo <<<TEXT
<p class='bookmarklet'>Type: <strong>Simple</strong> (no question asked) or <strong>Custom</strong> (prompt for a custom keyword first)</p>
<p class='bookmarklet'>Behavior: <strong>Standard</strong> (take you to a page to manage your brand new short URL) or <strong>Instant</strong> (pop the short URL without leaving the page you are viewing)</p>

<style>
div.panel.tools {width:23%; float: left; margin:1%}
.bookmarklet-hilite {border:1px solid #1F669C}
.booktype-help {cursor: pointer}
.booktype-help:hover {background: #ccc }
</style>

<script>
$(document).ready(function(){

$('p.bookmarklet strong').each( function( i, e ) {
	var booktype = $(e).text().toLowerCase();
	$(e).attr( 'id', 'booktype-'+booktype ).addClass('booktype-help');
	$(e).append(' <span class="booktype-help"><i class="icon-question-sign"></i></span>');
	$('#booktype-'+booktype).hover(
		function() {
			$('.bookmarklet-type-'+booktype).addClass('bookmarklet-hilite');
		},
		function() {
			$('.bookmarklet-type-'+booktype).removeClass('bookmarklet-hilite');
		}
	);
});

});
</script>
TEXT;

$bookmarks = array (
	'simple-standard'    => array (
		'name'  => 'Standard + Simple',
		'type'  => array( 'standard', 'simple' ),
		'color' => 'info',
		'link'  => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0);%7D)()",
	),
	'custom-standard'  => array (
		'name'  => 'Standard + Custom',
		'type'  => array( 'standard', 'custom' ),
		'color' => 'success',
		'link'  => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,k=prompt(%22Custom%20URL%22),k2=(k?'&k='+k:%22%22),p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2+k2,u=f+p;if(k!=null)%7Btry%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0)%7D%7D)()",
	),
	'simple-instant'   => array (
		'name'  => 'Instant + Simple',
		'type'  => array( 'instant', 'simple' ),
		'color' => 'warning',
		'link'  => "javascript:(function()%7Bvar%20d=document,s=d.createElement('script');window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&jsonp=yourls';void(d.body.appendChild(s));%7D)();",
	),
	'custom-instant'    => array (
		'name'  => 'Instant + Custom',
		'type'  => array( 'instant', 'custom' ),
		'color' => 'danger',
		'link'  => "javascript:(function()%7Bvar%20d=document,k=prompt('Custom%20URL'),s=d.createElement('script');if(k!=null){window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&k='+k+'&jsonp=yourls';void(d.body.appendChild(s));%7D%7D)();",
	),
);

foreach( $bookmarks as $bookmark ) {
	echo '<div class="tools panel panel-' . $bookmark['color'] . ' bookmarklet-type-' . $bookmark['type'][0] . ' bookmarklet-type-' . $bookmark['type'][1] . '">';
	echo '<div class="panel-heading">' . $bookmark['name'] . '</div>';
	echo '<a class="btn" href="' . $bookmark['link'] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<i class="icon-move"></i> YOURLS Shorten';
	echo '</a>';
	echo '</div>';
}

echo '<div class="clearfix"></div>';

echo '<p>';
yourls_add_label( yourls__( 'Help' ), 'normal', 'after' );
yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it)' );
echo '</p>';

echo '<p>';
echo yourls_s( 'For more info, please refer to the <a href="%s">online documentation</a>', 'https://github.com/YOURLS/YOURLS/wiki/Bookmarklets' );
echo '</p>';
	
echo '<p>';
yourls_add_label( yourls__( 'Tip' ), 'info', 'after' );
yourls_e( "If you want to share a description along with the link you're shortening, simply <span>select text</span> on the page you're viewing before clicking on your bookmarklet link" );
echo '</p>';
		
yourls_html_htag( yourls__( 'Social Bookmarklets' ), 3 );

echo '<p>';
yourls_e( 'Create a short URL and share it on social networks, all in one click!' );
echo '</p>';
		
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

foreach( $bookmarks as $bookmark ) {
	echo '<div class="tools panel panel-' . $bookmark['color'] . '">';
	echo '<div class="panel-heading">' . $bookmark['name'] . '</div>';
	echo '<a class="btn" href="' . $bookmark['link'] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<i class="icon-move"></i> ' . $bookmark['name'];
	echo '</a>';
	echo '</div>';
}

/**
foreach ( $bookmarks as $bookmark ){
	echo '<a href="' . $bookmark[ 'link' ] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<div class="tools panel panel-' . $bookmark[ 'color' ] . '"><div class="panel-heading">' . $bookmark[ 'name' ] . '</div>';
	echo $bookmark[ 'description' ] . '</div></a>';
}
/**/

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

	<p id="signature-zone"><?php
			yourls_se( 'Your secret signature token: %s', '<strong><code id="signature">' . yourls_auth_signature() . '</code></strong>' );
			echo '<button id="btn-zclip" data-clipboard-target="signature"><i class="icon-paste"></i></button>';
			yourls_add_label( yourls__( "It's a secret. Keep it secret!" ), 'warning', 'before' );
	?></p>

	<p><?php
			yourls_add_label( yourls__( 'Help' ), 'normal', 'after' );
			yourls_e( 'This signature token can only be used with the API, not with the admin interface.' );
	?></p>
		
	<?php yourls_html_htag( yourls__( 'Usage of the signature token' ), 3 ); ?>
		
	<p><?php echo yourls_s( 'For more info, please refer to the <a href="%s">online documentation</a>', 'https://github.com/YOURLS/YOURLS/wiki/PasswordlessAPI' ); ?></p>

<?php } // end is private 
		  
yourls_template_content( 'after', 'tools' );
?>