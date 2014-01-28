API
===

## Features

*   Generate or get existing short URLs, with sequential or custom keyword
*   Get some statistics about your links: top clicked links, least clicked links, newest links
*   Output format: JSON, XML, or simple raw text
*   Authentify either with login/password or using a secure passwordless mechanism

## Usage

You need to send parameters to `http://yoursite.com/yourls-api.php` either via `GET` or `POST` (remember to URL encode parameters if via GET). These parameters are:

*   A valid `username` / `password` pair, or your `signature` (see [Passwordless API requests](http://yourls.org/passwordlessapi))
*   The requested `action`: `"shorturl"` (get short URL for a link), `"expand"` (get long URL of a shorturl), `"url-stats"` (get stats about one short URL), `"stats"` (get stats about your links) or `"db-stats"` (get global link and click count)
*   With `action = "shorturl"` :
	*   the `url` to shorten
	*   optional `keyword` and `title` for custom short URLs
	*   output `format`: either `"jsonp"`, `"json"`, `"xml"` or `"simple"`
*   With `action = "expand"` :
	*   the `shorturl` to expand (can be either `abc` or `http://site/abc`)
	*   output `format`: either `"jsonp"`, `"json"`, `"xml"` or `"simple"`
*   With `action = "url-stats"` :
	*   the `shorturl` for which to get stats (can be either `abc` or `http://site/abc`)
	*   output `format`: either `"jsonp"`, `"json"` or `"xml"`
*   With `action = "stats"` :
	*   the `filter`: either `"top"`, `"bottom"` , `"rand"` or `"last"`
	*   the `limit` (maximum number of links to return)
	*   output `format`: either `"jsonp"`, `"json"` or `"xml"`
*   With `action = "db-stats"` :
	*   output `format`: either `"jsonp"`, `"json"` or `"xml"`

## Sample return

	<result>
		<url>
			<keyword>shorter</keyword>
			<url>http://somereallylongurlyouneedtoshrink.com/</url>
			<title>The Page Title</title>
			<date>2009-06-23 18:08:07</date>
			<ip>127.0.0.1</ip>
		</url>
		<status>success</status>
		<message>http://somereallylongurlyouneedtoshrink.com/ (ID: shorter) added to database</message>
		<title>The Page Title</title>
		<shorturl>http://yoursite.com/shorter</shorturl>
		<statusCode>200</statusCode>
	</result>

## Sample file

There's a sample file included that serves as an example on how to play with the API.
