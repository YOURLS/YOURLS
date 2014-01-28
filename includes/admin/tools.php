<?php
define( 'YOURLS_ADMIN', true );
require_once dirname( dirname( __FILE__ ) ) . '/load-yourls.php';
yourls_maybe_require_auth();

yourls_html_head( 'tools', yourls__( 'Cool YOURLS Tools' ) );
yourls_template_content( 'before', 'tools' );

yourls_html_htag( yourls__( 'Tools' ), 1, yourls__( 'Easy shortening and sharing' ) ); ?>

<div class="page-header">
	<?php yourls_html_htag( yourls__( 'Bookmarklets' ), 2 ); ?>
</div>

<?php
yourls_html_htag( yourls__( 'Classic Bookmarklets' ), 3 );

echo '<p class="bookmarklet-help">';
yourls_se( 'Short URL can be %1$sDefault%2$s or %3$sCustom%2$s. Behavior can be %4$sStandard%2$s or %5$sPopup%2$s',
	'<strong class="default" title="' . yourls__( 'No question asked' ) . '">', '</strong>', 
	'<strong class="custom" title="' . yourls__( 'Prompt for a custom keyword first' ) . '">', 
	'<strong class="standard" title="' . yourls__( 'Opens a new page to manage your brand new short URL' ) . '">',
	'<strong class="popup" title="'. yourls__( 'Shows the short URL in a popup within the current page' ) . '">' );
echo '</p>';

echo '<p>';
yourls_se( 'For more info, please refer to the <a href="%s">online documentation</a>.', 'https://github.com/YOURLS/YOURLS/wiki/Bookmarklets' );
echo '</p>';

// @TODO: offload this to proper CSS & JS files
echo <<<TEXT
<script>
$(document).ready(function(){
$('.bookmarklet-help strong').tooltip();

// Highlight bookmarklets matching a <strong> element
$('p.bookmarklet-help strong').each( function( i, e ) {
	var booktype = $(e).attr('class');
	$(e).attr( 'id', 'booktype-'+booktype ).addClass('booktype-help');
	$(e).append(' <i class="fa fa-info-circle"></i>');
	$('#booktype-'+booktype).hover(
		function() {
			$('.bookmarklet-type-'+booktype).addClass('bookmarklet-hilite');
		},
		function() {
			$('.bookmarklet-type-'+booktype).removeClass('bookmarklet-hilite');
		}
	);
});

// Highlight <strong> elements matching a bookmarklet
$('div.bookmarklet').hover(
	function() {
		// Get "bookmarklet-type-" classes of hovered element
		var types = $(this).attr('class').split(' ').filter( function( el ){
			return el.match(/bookmarklet-type-.*/);
		}).map( function(e){ return e.replace('bookmarklet-type-', '') ;} );
		$( types ).each( function( i, e ) {
			$('.bookmarklet-help .'+e).addClass('bookmarklet-hilite');
		});
	},
	function() {
		var types = $(this).attr('class').split(' ').filter( function( el ){
			return el.match(/bookmarklet-type-.*/);
		}).map( function(e){ return e.replace('bookmarklet-type-', '') ;} );
		$( types ).each( function( i, e ) {
			$('.bookmarklet-help .'+e).removeClass('bookmarklet-hilite');
		});
	}
);

});
</script><div>

TEXT;

$bookmarks = array (
	'simple' => array (
		'name'  => yourls__( 'Default + Standard' ),
		'type'  => array( 'default', 'standard' ),
		'link'  => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2,u=f+p;try%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0);%7D)()",
	),
	'custom' => array (
		'name'  => yourls__( 'Custom + Standard' ),
		'type'  => array( 'standard', 'custom' ),
		'link'  => "javascript:(function()%7Bvar%20d=document,w=window,enc=encodeURIComponent,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),s2=((s.toString()=='')?s:enc(s)),f='" . yourls_admin_url( 'index.php' ) . "',l=d.location,k=prompt(%22Custom%20URL%22),k2=(k?'&k='+k:%22%22),p='?u='+enc(l.href)+'&t='+enc(d.title)+'&s='+s2+k2,u=f+p;if(k!=null)%7Btry%7Bthrow('ozhismygod');%7Dcatch(z)%7Ba=function()%7Bif(!w.open(u))l.href=u;%7D;if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();%7Dvoid(0)%7D%7D)()",
	),
	'simple-pop' => array (
		'name'  => yourls__( 'Default + Popup' ),
		'type'  => array( 'default', 'popup' ),
		'link'  => "javascript:(function()%7Bvar%20d=document,s=d.createElement('script');window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&jsonp=yourls';void(d.body.appendChild(s));%7D)();",
	),
	'custom-pop' => array (
		'name'  => yourls__( 'Custom + Popup' ),
		'type'  => array( 'popup', 'custom' ),
		'link'  => "javascript:(function()%7Bvar%20d=document,k=prompt('Custom%20URL'),s=d.createElement('script');if(k!=null){window.yourls_callback=function(r)%7Bif(r.short_url)%7Bprompt(r.message,r.short_url);%7Delse%7Balert('An%20error%20occured:%20'+r.message);%7D%7D;s.src='" . yourls_admin_url( 'index.php' ) . "?u='+encodeURIComponent(d.location.href)+'&k='+k+'&jsonp=yourls';void(d.body.appendChild(s));%7D%7D)();",
	),
);

$bookmarks = yourls_apply_filter( 'classic_bookmarklet_data', $bookmarks );

foreach( $bookmarks as $bookmark ) {
	echo '<div class="bookmarklet bookmarklet-type-' . $bookmark['type'][0] . ' bookmarklet-type-' . $bookmark['type'][1] . '">';
	echo '<div class="panel-heading">' . $bookmark['name'] . '</div>';
	echo '<div class="panel-body"><a href="' . $bookmark['link'] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<i class="fa fa-arrows"></i> ' . yourls__( 'YOURLS Shorten' );
	echo '</a></div>';
	echo '</div>';
}

yourls_do_action( 'classic_bookmarklets_buttons_after' ); 

echo '</div>';

echo '<p>';
yourls_add_label( yourls__( 'Help' ), 'default', 'after' );
yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it).' );
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
	'facebook'  => array (
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

$bookmarks = yourls_apply_filter( 'social_bookmarklets_data', $bookmarks );

foreach( $bookmarks as $bookmark ) {
	echo '<div class="bookmarklet panel-' . $bookmark['color'] . '">';
	echo '<div class="panel-heading">' . $bookmark['name'] . '</div>';
	echo '<a href="' . $bookmark['link'] . '" onclick="alert(\'' . yourls_esc_attr__( 'Drag to your toolbar!' ) . '\');return false;">';
	echo '<i class="fa fa-arrow"></i> ' . $bookmark['name'];
	echo '</a>';
	echo '</div>';
}

yourls_do_action( 'social_bookmarklet_buttons_after' ); 
		
echo '<div class="clearfix"></div><p>';
yourls_add_label( yourls__( 'Help' ), 'default', 'after' );
yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it).' ) . '</p>';
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
		yourls_e( "If you're worried about sending your credentials into the wild, you can also make API calls without using your login or your password, using a secret signature token." );
	?></p>

	<p id="signature-zone"><?php
		yourls_se( 'Your secret signature token: %s', '<strong><code id="signature">' . yourls_auth_signature() . '</code></strong>' );
		yourls_html_zeroclipboard( 'signature' );
		yourls_add_label( yourls__( "It's a secret. Keep it secret!" ), 'danger', 'before' );
	?></p>

	<p><?php
		yourls_add_label( yourls__( 'Note' ), 'warning', 'after' );
		yourls_e( 'This signature token can only be used with the API, not with the admin interface.' );
	?></p>
		
	<p><?php echo yourls_s( 'For more info, please refer to the <a href="%s">online documentation</a>.', 'https://github.com/YOURLS/YOURLS/wiki/PasswordlessAPI' ); ?></p>

<?php } // end is private 
		  
yourls_template_content( 'after', 'tools' );
