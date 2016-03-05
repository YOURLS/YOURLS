<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( dirname( __FILE__ ) ).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

yourls_html_head( 'tools', yourls__( 'Cool YOURLS Tools' ) );
yourls_html_logo();
yourls_html_menu();
?>

	<main role="main" class="sub_wrap">

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
        
        <?php $base_bookmarklet = yourls_admin_url( 'index.php' ); ?>
		
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

				<td>
                <?php $js_code = <<<STANDARD_SIMPLE
                // Simple Standard Bookmarklet (new page, no keyword asked)
                var d   = document,
                    w   = window,
                    enc = encodeURIComponent,
                    e   = w.getSelection,
                    k   = d.getSelection,
                    x   = d.selection,
                    s   = (e ? e() : (k) ? k() : (x ? x.createRange().text : 0)),
                    s2  = ((s.toString() == '') ? s : enc(s)),
                    f   = '$base_bookmarklet',
                    l   = d.location.href,
                    ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
                    ur  = l.split(new RegExp(ups))[1],
                    ups = ups.split(/\:/),
                    p   = '?up='+enc(ups[0]+':')+'&us='+enc(ups[1])+'&ur='+enc(ur)+'&t='+enc(d.title)+'&s='+s2,
                    u   = f + p;
                try {
                    throw ('ozhismygod');
                } catch (z) {
                    a = function () {
                        if (!w.open(u)) l.href = u;
                    };
                    if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0);
                    else a();
                }
                void(0);
STANDARD_SIMPLE;
                yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'Shorten' ) );
                ?>
                </td>

				<td>
                <?php $js_code = <<<POPUP_SIMPLE
                // Simple Popup (in-page popup dialog, no keyword asked)
                var d   = document,
                    sc  = d.createElement('script'),
                    l   = d.location.href,
                    enc = encodeURIComponent,
                    ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
                    ur  = l.split(new RegExp(ups))[1],
                    ups = ups.split(/\:/),
                    p   = '?up='+enc(ups[0]+':')+'&us='+enc(ups[1])+'&ur='+enc(ur)+'&t='+enc(d.title);
                window.yourls_callback = function (r) {
                    if (r.short_url) {
                        prompt(r.message, r.short_url);
                    } else {
                        alert('An error occured: ' + r.message);
                    }
                };
                sc.src = '$base_bookmarklet' + p + '&jsonp=yourls';
                void(d.body.appendChild(sc));
POPUP_SIMPLE;
                yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'Instant Shorten' ) );
                ?>
                </td>

            </tr>
			<tr>
				<th class="header"><?php yourls_e( 'Custom Keyword' ); ?></th>

				<td>
                <?php $js_code = <<<CUSTOM_STANDARD
                // Custom Standard (new page, prompt for a keyword)
                var d   = document,
                    enc = encodeURIComponent,
                    w   = window,
                    e   = w.getSelection,
                    k   = d.getSelection,
                    x   = d.selection,
                    s   = (e ? e() : (k) ? k() : (x ? x.createRange().text : 0)),
                    s2  = ((s.toString() == '') ? s : enc(s)),
                    f   = '$base_bookmarklet',
                    l   = d.location.href,
                    ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
                    ur  = l.split(new RegExp(ups))[1],
                    ups = ups.split(/\:/),
                    k   = prompt("Custom URL"),
                    k2  = (k ? '&k=' + k : ""),
                    p   = '?up='+enc(ups[0]+':')+'&us='+enc(ups[1])+'&ur='+enc(ur)+'&t='+enc(d.title)+'&s='+s2 + k2,
                    u   = f + p;
                if (k != null) {
                    try {
                        throw ('ozhismygod');
                    } catch (z) {
                        a = function () {
                            if (!w.open(u)) l = u;
                        };
                        if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0);
                        else a();
                    }
                    void(0)
                }
CUSTOM_STANDARD;
                yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'Custom shorten' ) );
                ?>
                </td>
				
                <td>
                <?php $js_code = <<<CUSTOM_POPUP
                // Custom Popup (prompt for a keyword + on-page popup)
                var d   = document,
                    l   = d.location.href,
                    k   = prompt('Custom URL'),
                    enc = encodeURIComponent,
                    ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
                    ur  = l.split(new RegExp(ups))[1],
                    ups = ups.split(/\:/),
                    p   = '?up='+enc(ups[0]+':')+'&us='+enc(ups[1])+'&ur='+enc(ur)+'&t='+enc(d.title);
                    sc  = d.createElement('script');
                if (k != null) {
                    window.yourls_callback = function (r) {
                        if (r.short_url) {
                            prompt(r.message, r.short_url);
                        } else {
                            alert('An error occured: ' + r.message);
                        }
                    };
                    sc.src = '$base_bookmarklet' + p + '&k=' + k + '&jsonp=yourls';
                    void(d.body.appendChild(sc));
                }
CUSTOM_POPUP;
                yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'Instant Custom Shorten' ) );
                ?>
                </td>
                
			</tr>
			</tbody>
		</table>
        

		<h3><?php yourls_e( 'Social Bookmarklets' ); ?></h3>
		
		<p><?php yourls_e( 'Create a short URL and share it on social networks, all in one click!' ); ?> 	
		<?php yourls_e( 'Click and drag links to your toolbar (or right-click and bookmark it)' ); ?></p>

		<p><?php yourls_e( 'Shorten and share:' ); ?></p>
        
        <p>
        <?php $js_code = <<<FACEBOOK
        // Share on Facebook 
        var d   = document,
            enc = encodeURIComponent,
            f   = '$base_bookmarklet',
            l   = d.location.href,
            ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
            ur  = l.split(new RegExp(ups))[1],
            ups = ups.split(/\:/),
            p   = '?up=' + enc(ups[0]+':') + '&us=' + enc(ups[1]) + '&ur=' + enc(ur) + '&t=' + enc(d.title) + '&share=facebook',
            u   = f + p;
        try {
            throw ('ozhismygod');
        } catch (z) {
            a = function () {
                if (!window.open(u,'Share','width=500,height=340,left=100','_blank')) l.href = u;
            };
            if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0);
            else a();
        }
        void(0);
FACEBOOK;
        yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'YOURLS &amp; Facebook' ) );
        ?>
        
        <?php $js_code = <<<TWITTER
        // Share on Twitter
        var d = document,
            w = window,
            enc = encodeURIComponent,
            e = w.getSelection,
            k = d.getSelection,
            x = d.selection,
            s = (e ? e() : (k) ? k() : (x ? x.createRange().text : 0)),
            s2 = ((s.toString() == '') ? s : '%20%22' + enc(s) + '%22'),
            f = '$base_bookmarklet',
            l = d.location.href,
            ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
            ur = l.split(new RegExp(ups))[1],
            ups = ups.split(/\:/),
            p = '?up=' + enc(ups[0]+':') + '&us=' + enc(ups[1]) + '&ur='+enc(ur) + '&t=' + enc(d.title) + s2 + '&share=twitter',
            u = f + p;
        try {
            throw ('ozhismygod');
        } catch (z) {
            a = function () {
                if (!w.open(u,'Share','width=780,height=265,left=100','_blank')) l = u;
            };
            if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0);
            else a();
        }
        void(0);
TWITTER;
        yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'YOURLS &amp; Twitter' ) );
        ?>
		
        <?php $js_code = <<<TUMBLR
        // Share on Tumlr
        var d = document,
            w = window,
            enc = encodeURIComponent,
            share = 'tumblr',
            e = w.getSelection,
            k = d.getSelection,
            x = d.selection,
            s = (e ? e() : (k) ? k() : (x ? x.createRange().text : 0)),
            s2 = ((s.toString() == '') ? s : '%20%22' + enc(s) + '%22'),
            f = '$base_bookmarklet',
            l = d.location.href,
            ups = l.match( /^[a-zA-Z0-9\+\.-]+:(\/\/)?/ )[0],
            ur = l.split(new RegExp(ups))[1],
            ups = ups.split(/\:/),
            p = '?up=' + enc(ups[0]+':') + '&us=' + enc(ups[1]) + '&ur='+enc(ur) + '&t=' + enc(d.title) + '&s=' + s2 + '&share=tumblr',
            u = f + p;
        try {
            throw ('ozhismygod');
        } catch (z) {
            a = function () {
                if (!w.open(u,'Share','width=450,height=450,left=430','_blank')) l = u;
            };
            if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0);
            else a();
        }
        void(0);
TUMBLR;
        yourls_bookmarklet_link( yourls_make_bookmarklet( $js_code ), yourls__( 'YOURLS &amp; Tumblr' ) );
        ?>
        
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

		<p><?php yourls_se( 'Your secret signature token: <strong><code>%s</code></strong>', yourls_auth_signature() ); ?>
        <?php yourls_e( "(It's a secret. Keep it secret) "); ?></p>

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

	</main>

	<?php } // end is private ?>

<?php yourls_html_footer(); ?>
