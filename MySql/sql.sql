SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
CREATE TABLE IF NOT EXISTS `chat_main` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `to` varchar(50) NOT NULL default 'all',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;
CREATE TABLE IF NOT EXISTS `cmds` (
  `id` int(5) NOT NULL auto_increment,
  `cmd` varchar(50) NOT NULL,
  `des` varchar(255) NOT NULL,
  `level` int(1) NOT NULL default '0',
  `type` enum('sql','php','none/js') NOT NULL,
  `code` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
CREATE TABLE IF NOT EXISTS `config` (
  `title` varchar(255) NOT NULL default '',
  `des` varchar(255) default NULL,
  `words` text,
  `name` varchar(255) default NULL,
  `line` text,
  `copy` varchar(255) default NULL,
  PRIMARY KEY  (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL auto_increment,
  `user` varchar(25) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;