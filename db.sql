--
-- Table structure for table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `url` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `clicks` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


**************************************************************************

update:

ALTER TABLE `url` CHANGE `ip` `ip` VARCHAR( 41 );
ALTER TABLE `url` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL;

CREATE TABLE `next_id` (
	`next_id` BIGINT NOT NULL ,
	PRIMARY KEY ( `next_id` )
) ENGINE = MYISAM ;
INSERT INTO next_id VALUES ( 1 ) 