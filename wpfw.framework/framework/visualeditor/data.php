<?php
global $wpdb;

$sql = "
CREATE TABLE IF NOT EXISTS wpfw_builder_elements (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  PostID bigint(20) NOT NULL,
  Objects text NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
";

$wpdb->query($sql);

$sql = "
CREATE TABLE IF NOT EXISTS wpfw_icons (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  IconFontID bigint(20) NOT NULL,
  ClassName varchar(255) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
";
$wpdb->query($sql);

$sql = "
CREATE TABLE IF NOT EXISTS wpfw_icon_fonts (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  FontName varchar(255) NOT NULL,
  Description text NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
";
$wpdb->query($sql);

$sql = "
CREATE TABLE IF NOT EXISTS wpfw_icons_tags (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  IconID bigint(20) NOT NULL,
  TagID bigint(20) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
";
$wpdb->query($sql);

$sql = "
CREATE TABLE IF NOT EXISTS wpfw_icon_tags (
  ID bigint(20) NOT NULL AUTO_INCREMENT,
  TagName varchar(255) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
";
$wpdb->query($sql);


?>