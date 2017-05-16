<?php
/* This is a sample config file.
 * Edit this file with your own settings and save it as "config.php"
 *
 * IMPORTANT: edit and save this file as plain ASCII text, using a text editor, for instance TextEdit on Mac OS or
 * Notepad on Windows. Make sure there is no character before the opening <?php at the beginning of this file.
 */

/*
 ** MySQL settings - You can get this info from your web host
 */

/** MySQL database username */
define( 'YOURLS_DB_USER', 'your db user name' );

/** MySQL database password */
define( 'YOURLS_DB_PASS', 'your db password' );

/** The name of the database for YOURLS */
define( 'YOURLS_DB_NAME', 'yourls' );

/** MySQL hostname.
 ** If using a non standard port, specify it like 'hostname:port', eg. 'localhost:9999' or '127.0.0.1:666' */
define( 'YOURLS_DB_HOST', 'localhost' );

/** MySQL tables prefix */
define( 'YOURLS_DB_PREFIX', 'yourls_' );

/*
 ** Site options
 */

/** YOURLS installation URL -- all lowercase, no trailing slash at the end.
 ** If you define it to "http://sho.rt", don't use "http://www.sho.rt" in your browser (and vice-versa) */
define( 'YOURLS_SITE', 'http://your-own-domain-here.com' );

/** Server timezone GMT offset */
define( 'YOURLS_HOURS_OFFSET', 0 ); 

/** YOURLS language
 ** Change this setting to use a translation file for your language, instead of the default English.
 ** That translation file (a .mo file) must be installed in the user/language directory.
 ** See http://yourls.org/translations for more information */
define( 'YOURLS_LANG', '' ); 

/** Allow multiple short URLs for a same long URL
 ** Set to true to have only one pair of shortURL/longURL (default YOURLS behavior)
 ** Set to false to allow multiple short URLs pointing to the same long URL (bit.ly behavior) */
define( 'YOURLS_UNIQUE_URLS', true );

/** Private means the Admin area will be protected with login/pass as defined below.
 ** Set to false for public usage (eg on a restricted intranet or for test setups)
 ** Read http://yourls.org/privatepublic for more details if you're unsure */
define( 'YOURLS_PRIVATE', true );

/** A random secret hash used to encrypt cookies. You don't have to remember it, make it long and complicated. Hint: copy from http://yourls.org/cookie **/
define( 'YOURLS_COOKIEKEY', 'modify this text with something random' );

/** Username(s) and password(s) allowed to access the site. Passwords either in plain text or as encrypted hashes
 ** YOURLS will auto encrypt plain text passwords in this file
 ** Read http://yourls.org/userpassword for more information */
$yourls_user_passwords = array(
	'username' => 'password',
	// 'username2' => 'password2',
	// You can have one or more 'login'=>'password' lines
	);

/** Debug mode to output some internal information
 ** Default is false for live site. Enable when coding or before submitting a new issue */
define( 'YOURLS_DEBUG', false );
	
/*
 ** URL Shortening settings
 */

/** URL shortening method: 36 or 62 */
define( 'YOURLS_URL_CONVERT', 36 );
/*
 * 36: generates all lowercase keywords (ie: 13jkm)
 * 62: generates mixed case keywords (ie: 13jKm or 13JKm)
 * Stick to one setting. It's best not to change after you've started creating links.
 */

/** 
* Reserved keywords (so that generated URLs won't match them)
* Define here negative, unwanted or potentially misleading keywords.
*/
$yourls_reserved_URL = array('porn', 'faggot', 'sex', 'nigger', 'fuck', 'cunt', 'dick', 'gay','ahole', 'anus', 'ash0le', 'ash0les', 'asholes', 'ass', 'Ass', 'Monkey', 'Assface', 'assh0le', 'assh0lez', 'asshole', 'assholes', 'assholz', 'asswipe', 'azzhole', 'bassterds', 'bastard', 'bastards', 'bastardz', 'basterds', 'basterdz', 'Biatch', 'bitch', 'bitches', 'Blow', 'Job', 'boffing', 'butthole', 'buttwipe', 'c0ck', 'c0cks', 'c0k', 'Carpet', 'Muncher', 'cawk', 'cawks', 'Clit', 'cnts', 'cntz', 'cock', 'cockhead', 'cock-head', 'cocks', 'CockSucker', 'cock-sucker', 'crap', 'cum', 'cunt', 'cunts', 'cuntz', 'dild0', 'dild0s', 'dildo', 'dildos', 'dilld0', 'dilld0s', 'dominatricks', 'dominatrics', 'dominatrix', 'dyke', 'enema', 'f', 'u', 'c', 'k', 'f', 'u', 'c', 'k', 'e', 'r', 'fag', 'fag1t', 'faget', 'fagg1t', 'faggit', 'fagit', 'fags', 'fagz', 'faig', 'faigs', 'fart', 'flipping', 'the', 'bird', 'fuck', 'fucker', 'fuckin', 'fucking', 'fucks', 'Fudge', 'Packer', 'fuk', 'Fukah', 'Fuken', 'fuker', 'Fukin', 'Fukk', 'Fukkah', 'Fukken', 'Fukker', 'Fukkin', 'g00k', 'gay', 'gayboy', 'gaygirl', 'gays', 'gayz', 'God-damned', 'h00r', 'h0ar', 'h0re', 'hells', 'hoar', 'hoor', 'hoore', 'jackoff', 'jap', 'japs', 'jerk-off', 'jisim', 'jiss', 'jizm', 'jizz', 'knob', 'knobs', 'knobz', 'kunt', 'kunts', 'kuntz', 'Lesbian', 'Lezzian', 'Lipshits', 'Lipshitz', 'masochist', 'masokist', 'massterbait', 'masstrbait', 'masstrbate', 'masterbaiter', 'masterbate', 'masterbates', 'Motha', 'Fucker', 'Motha', 'Fuker', 'Motha', 'Fukkah', 'Motha', 'Fukker', 'Mother', 'Fucker', 'Mother', 'Fukah', 'Mother', 'Fuker', 'Mother', 'Fukkah', 'Mother', 'Fukker', 'mother-fucker', 'Mutha', 'Fucker', 'Mutha', 'Fukah', 'Mutha', 'Fuker', 'Mutha', 'Fukkah', 'Mutha', 'Fukker', 'n1gr', 'nastt', 'nigger;', 'nigur;', 'niiger;', 'niigr;', 'orafis', 'orgasim;', 'orgasm', 'orgasum', 'oriface', 'orifice', 'orifiss', 'packi', 'packie', 'packy', 'paki', 'pakie', 'paky', 'pecker', 'peeenus', 'peeenusss', 'peenus', 'peinus', 'pen1s', 'penas', 'penis', 'penis-breath', 'penus', 'penuus', 'Phuc', 'Phuck', 'Phuk', 'Phuker', 'Phukker', 'polac', 'polack', 'polak', 'Poonani', 'pr1c', 'pr1ck', 'pr1k', 'pusse', 'pussee', 'pussy', 'puuke', 'puuker', 'queer', 'queers', 'queerz', 'qweers', 'qweerz', 'qweir', 'recktum', 'rectum', 'retard', 'sadist', 'scank', 'schlong', 'screwing', 'semen', 'sexy', 'Sh!t', 'sh1t', 'sh1ter', 'sh1ts', 'sh1tter', 'sh1tz', 'shit', 'shits', 'shitter', 'Shitty', 'Shity', 'shitz', 'Shyt', 'Shyte', 'Shytty', 'Shyty', 'skanck', 'skank', 'skankee', 'skankey', 'skanks', 'Skanky', 'slut', 'sluts', 'Slutty', 'slutz', 'son-of-a-bitch', 'tit', 'turd', 'va1jina', 'vag1na', 'vagiina', 'vagina', 'vaj1na', 'vajina', 'vullva', 'vulva', 'w0p', 'wh00r', 'wh0re', 'whore', 'xrated', 'xxx', 'b!+ch', 'bitch', 'blowjob', 'clit', 'arschloch', 'shit', 'ass', 'asshole', 'b!tch', 'b17ch', 'b1tch', 'bastard', 'bi+ch', 'boiolas', 'buceta', 'c0ck', 'cawk', 'chink', 'cipa', 'clits', 'cock', 'cum', 'dildo', 'dirsa', 'ejakulate', 'fatass', 'fcuk', 'fuk', 'fux0r', 'hoer', 'hore', 'jism', 'kawk', 'l3itch', 'l3i+ch', 'lesbian', 'masturbate', 'masterbat*', 'masterbat3', 'motherfucker', 's.o.b.', 'mofo', 'nazi', 'nigga', 'nutsack', 'pimpis', 'pusse', 'pussy', 'scrotum', 'sh!t', 'shemale', 'shi+', 'sh!+', 'slut', 'smut', 'teets', 'tits', 'boobs', 'b00bs', 'teez', 'testical', 'testicle', 'titt', 'w00se', 'jackoff', 'wank', 'whoar', 'whore', '*damn', '*dyke', '*fuck*', '*shit*', '@$$', 'amcik', 'andskota', 'arse*', 'assrammer', 'ayir', 'bi7ch', 'bitch*', 'bollock*', 'breasts', 'butt-pirate', 'cabron', 'cazzo', 'chraa', 'chuj', 'Cock*', 'cunt*', 'd4mn', 'daygo', 'dego', 'dick*', 'dike*', 'dupa', 'dziwka', 'ejackulate', 'Ekrem*', 'Ekto', 'enculer', 'faen', 'fag*', 'fanculo', 'fanny', 'feces', 'feg', 'Felcher', 'ficken', 'fitt*', 'Flikker', 'foreskin', 'Fotze', 'Fu(*', 'fuk*', 'futkretzn', 'gay', 'gook', 'guiena', 'h0r', 'h4x0r', 'hell', 'helvete', 'hoer*', 'honkey', 'Huevon', 'hui', 'injun', 'jizz', 'kanker*', 'kike', 'klootzak', 'kraut', 'knulle', 'kuk', 'kuksuger', 'Kurac', 'kurwa', 'kusi*', 'kyrpa*', 'lesbo', 'mamhoon', 'masturbat*', 'merd*', 'mibun', 'monkleigh', 'mouliewop', 'muie', 'mulkku', 'muschi', 'nazis', 'nepesaurio', 'nigger*', 'orospu', 'paska*', 'perse', 'picka', 'pierdol*', 'pillu*', 'pimmel', 'piss*', 'pizda', 'poontsee', 'poop', 'p0rn', 'pr0n', 'preteen', 'pula', 'pule', 'puta', 'puto', 'qahbeh', 'queef*', 'rautenberg', 'schaffer', 'scheiss*', 'schlampe', 'schmuck', 'screw', 'sh!t*', 'sharmuta', 'sharmute', 'shipal', 'shiz', 'skribz', 'skurwysyn', 'sphencter', 'spic', 'spierdalaj', 'splooge', 'suka', 'b00b*', 'testicle*', 'titt*', 'twat', 'vittu', 'wank*', 'wetback*', 'wichser', 'wop*', 'yed', 'zabourah'
                             );

/*
 ** Personal settings would go after here.
 */

