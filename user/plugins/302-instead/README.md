302-instead
===========

yourls plugin to send a 302 (temporary) redirect instead of 301 (permanent) for sites where shortlinks may change

This plugin applies across an entire yourls installation - cannot currently be customised per-link. Note that it will only work reliably on *new* links, since old links will have already been cached in browsers due to the use of 301 headers.

Requirements

yourls 1.5 or 1.5.1

Installation

    Create a user/plugins/302-instead directory in yourls
    Place the plugin.php file in above directory
    Activate plugin in yourls
