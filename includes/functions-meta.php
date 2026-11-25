<?php

/**
 * Link preview metadata (description + image), used when a short URL is shared in chat apps and social networks
 * (Zalo, Messenger, Telegram, ...). Their crawlers read Open Graph tags from the short URL: without them, only the long
 * URL is shown. The title itself is the regular link title stored in the URL table.
 *
 * Description and image live in their own table, created on first use (so existing installs need no upgrade step).
 */

/**
 * Create the metadata table if needed (once per request)
 *
 * @return void
 */
function yourls_meta_ensure_table() {
    static $done = false;
    if( $done ) {
        return;
    }
    $done = true;
    try {
        yourls_get_db( 'write-meta_ensure_table' )->perform(
            'CREATE TABLE IF NOT EXISTS `' . YOURLS_DB_TABLE_META . '` ('.
            '`keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT \'\','.
            '`description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,'.
            '`image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,'.
            'PRIMARY KEY (`keyword`)'.
            ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'
        );
    } catch( \Throwable $e ) {
        // Metadata is optional: never break link operations (eg DB user without CREATE privilege)
    }
}

/**
 * Sanitize a link description: plain text, single line, max 300 chars
 *
 * @param  string $description
 * @return string
 */
function yourls_sanitize_link_description( $description ):string {
    $description = yourls_sanitize_title( (string) $description );
    if( function_exists( 'mb_substr' ) ) {
        $description = mb_substr( $description, 0, 300 );
    } else {
        $description = substr( $description, 0, 300 );
    }
    return yourls_apply_filter( 'sanitize_link_description', $description );
}

/**
 * Sanitize a link preview image URL: http(s) only, or empty string
 *
 * @param  string $image
 * @return string
 */
function yourls_sanitize_link_image( $image ):string {
    $image = trim( (string) $image );
    if( $image === '' ) {
        return '';
    }
    $image = yourls_sanitize_url( $image );
    if( !in_array( yourls_get_protocol( $image ), [ 'http://', 'https://' ], true ) ) {
        return '';
    }
    return $image;
}

/**
 * Get the metadata of a short URL
 *
 * @param  string $keyword
 * @return array  [ 'description' => string, 'image' => string ]
 */
function yourls_get_link_meta( $keyword ):array {
    yourls_meta_ensure_table();
    $keyword = yourls_sanitize_keyword( $keyword );
    try {
        $row = yourls_get_db( 'read-get_link_meta' )->fetchObject(
            'SELECT `description`, `image` FROM `' . YOURLS_DB_TABLE_META . '` WHERE `keyword` = :keyword',
            [ 'keyword' => $keyword ]
        );
    } catch( \Throwable $e ) {
        $row = false;
    }
    return [
        'description' => $row ? (string) $row->description : '',
        'image'       => $row ? (string) $row->image : '',
    ];
}

/**
 * Save the metadata of a short URL (both empty = row removed)
 *
 * @param  string $keyword
 * @param  string $description
 * @param  string $image
 * @return void
 */
function yourls_set_link_meta( $keyword, $description = '', $image = '' ) {
    yourls_meta_ensure_table();
    $keyword     = yourls_sanitize_keyword( $keyword );
    $description = yourls_sanitize_link_description( $description );
    $image       = yourls_sanitize_link_image( $image );
    try {
        $ydb = yourls_get_db( 'write-set_link_meta' );
        if( $description === '' && $image === '' ) {
            $ydb->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_META . '` WHERE `keyword` = :keyword', [ 'keyword' => $keyword ] );
            return;
        }
        $ydb->perform(
            'INSERT INTO `' . YOURLS_DB_TABLE_META . '` (`keyword`, `description`, `image`) VALUES (:keyword, :description, :image) ' .
            'ON DUPLICATE KEY UPDATE `description` = VALUES(`description`), `image` = VALUES(`image`)',
            [ 'keyword' => $keyword, 'description' => $description, 'image' => $image ]
        );
    } catch( \Throwable $e ) {
        // optional data: ignore
    }
}

/**
 * Remove the metadata of a short URL
 *
 * @param  string $keyword
 * @return void
 */
function yourls_delete_link_meta( $keyword ) {
    try {
        yourls_get_db( 'write-delete_link_meta' )->perform(
            'DELETE FROM `' . YOURLS_DB_TABLE_META . '` WHERE `keyword` = :keyword',
            [ 'keyword' => yourls_sanitize_keyword( $keyword ) ]
        );
    } catch( \Throwable $e ) {
        // table not created yet, or no privilege: nothing to clean, and deleting a link must never fail because of it
    }
}

// Clean up metadata when a link is deleted
yourls_add_action( 'delete_link', function( $keyword ) { yourls_delete_link_meta( $keyword ); } );

/**
 * Is the current request made by a link preview crawler (chat apps, social networks) ?
 * Filter 'is_link_preview_request' can force the answer, eg to serve the preview page to every visitor.
 *
 * @param  string|null $user_agent  Defaults to the current request user agent
 * @return bool
 */
function yourls_is_link_preview_request( $user_agent = null ):bool {
    $ua = $user_agent ?? ( $_SERVER['HTTP_USER_AGENT'] ?? '' );
    $pattern = yourls_apply_filter( 'link_preview_bot_pattern',
        'facebookexternalhit|facebot|meta-externalagent|zalo|twitterbot|telegrambot|whatsapp|slackbot|slack-imgproxy|' .
        'linkedinbot|discordbot|skypeuripreview|viber|pinterest|redditbot|line-poker|kakaotalk|embedly|vkshare|link-?preview'
    );
    // Facebook/Messenger in-app browsers (FBAN, FBAV, FB_IAN) are real visitors, not crawlers
    $is_bot = (bool) preg_match( '~(' . $pattern . ')~i', (string) $ua ) && !preg_match( '~FBAN|FBAV|FB_IAN~', (string) $ua );
    return (bool) yourls_apply_filter( 'is_link_preview_request', $is_bot, $ua );
}

/**
 * Output the preview page (Open Graph + Twitter card tags) for a short URL, then the visitor is sent to the long URL
 *
 * @param  string $keyword
 * @param  string $url      Long URL
 * @return void
 */
function yourls_link_preview_page( $keyword, $url ) {
    $keyword  = yourls_sanitize_keyword( $keyword );
    $meta     = yourls_get_link_meta( $keyword );
    $title    = yourls_get_keyword_title( $keyword, '' );
    $host     = (string) parse_url( $url, PHP_URL_HOST );
    $title    = $title !== '' ? $title : ( $host !== '' ? $host : $keyword );
    $desc     = $meta['description'] !== '' ? $meta['description'] : $host;
    $image    = $meta['image'];
    $shorturl = yourls_link( $keyword );

    $tags = [
        'og:type'        => 'website',
        'og:site_name'   => $host,
        'og:title'       => $title,
        'og:description' => $desc,
        'og:url'         => $shorturl,
    ];
    if( $image !== '' ) {
        $tags['og:image'] = $image;
    }
    $tags = yourls_apply_filter( 'link_preview_tags', $tags, $keyword, $url );

    yourls_status_header( 200 );
    yourls_content_type_header( 'text/html' );
    yourls_robots_tag_header();
    header( 'Cache-Control: public, max-age=300' );
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo yourls_esc_html( $title ); ?></title>
    <meta name="description" content="<?php echo yourls_esc_attr( $desc ); ?>" />
    <?php foreach( $tags as $property => $content ) { ?>
    <meta property="<?php echo yourls_esc_attr( $property ); ?>" content="<?php echo yourls_esc_attr( $content ); ?>" />
    <?php } ?>
    <meta name="twitter:card" content="<?php echo $image !== '' ? 'summary_large_image' : 'summary'; ?>" />
    <meta name="twitter:title" content="<?php echo yourls_esc_attr( $title ); ?>" />
    <meta name="twitter:description" content="<?php echo yourls_esc_attr( $desc ); ?>" />
    <?php if( $image !== '' ) { ?><meta name="twitter:image" content="<?php echo yourls_esc_attr( $image ); ?>" /><?php } ?>
    <meta http-equiv="refresh" content="0;url=<?php echo yourls_esc_attr( $url ); ?>" />
</head>
<body><p><a href="<?php echo yourls_esc_url( $url ); ?>"><?php echo yourls_esc_html( $title ); ?></a></p></body>
</html>
    <?php
}
