-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2021 at 05:52 AM
-- Server version: 10.3.30-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rainmfma_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Username` mediumtext NOT NULL,
  `Password` mediumtext NOT NULL,
  `Email` mediumtext NOT NULL,
  `gettc` int(11) NOT NULL,
  `salt` mediumtext NOT NULL,
  `showemail` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `lastOnline` mediumtext NOT NULL,
  `lastOnlineMinutes` mediumtext NOT NULL,
  `lastOnlineHours` mediumtext NOT NULL,
  `status` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `profileviews` int(11) NOT NULL,
  `ShirtPath` mediumtext NOT NULL,
  `PantsPath` mediumtext NOT NULL,
  `hat` int(11) NOT NULL,
  `shirt` int(11) NOT NULL,
  `moderator` int(11) NOT NULL,
  `theme` int(11) NOT NULL,
  `administrator` int(11) NOT NULL,
  `Signature` mediumtext NOT NULL,
  `banned` int(11) NOT NULL DEFAULT 0 COMMENT '0=no; 1=warning; 2=1 day; 3=3 days; 4=7 days; 5=deleted',
  `bannedUntilDay` int(11) NOT NULL,
  `bannedUntilMonth` int(11) NOT NULL,
  `bannedUntilYear` int(11) NOT NULL,
  `bannedReason` mediumtext NOT NULL,
  `bannedFor` mediumtext NOT NULL,
  `ip` mediumtext NOT NULL,
  `floodcheck` int(11) NOT NULL,
  `Accessories` mediumtext NOT NULL,
  `Background` mediumtext NOT NULL,
  `artist` int(11) NOT NULL,
  `manager` int(11) NOT NULL,
  `Bucks` int(11) NOT NULL DEFAULT 20,
  `powerArtist` int(11) NOT NULL,
  `powerCM` int(11) NOT NULL,
  `powerDev` int(11) NOT NULL,
  `powerForumMod` int(11) NOT NULL,
  `powerHeadMod` int(11) NOT NULL,
  `powerImageMod` int(11) NOT NULL,
  `Name` mediumtext NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `Verified` int(11) NOT NULL DEFAULT 1,
  `color` int(11) NOT NULL,
  `powerAdmin` int(11) NOT NULL,
  `Membership` int(11) NOT NULL,
  `Expire` int(255) NOT NULL,
  `Reputation` int(11) NOT NULL DEFAULT 20,
  `lastBucks` int(11) NOT NULL,
  `lastReebs` int(11) NOT NULL,
  `bannedUntil` int(11) NOT NULL,
  `hide` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `streamer` int(11) NOT NULL,
  `limiteds` int(11) NOT NULL,
  `veteran` int(11) NOT NULL,
  `statusupdate` text NOT NULL,
  `bugreporter` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `running` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `userid` int(11) NOT NULL,
  `reason` text NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `bannedbyid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bans_IP`
--

CREATE TABLE `bans_IP` (
  `IP` mediumtext NOT NULL,
  `id` int(11) NOT NULL,
  `bannerid` int(11) NOT NULL,
  `reason` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buysell`
--

CREATE TABLE `buysell` (
  `buysell` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `creatorid` int(11) NOT NULL,
  `creatorname` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `type` mediumtext NOT NULL DEFAULT 'hat',
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cost` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `startedbyid` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `started` mediumtext NOT NULL,
  `ending` mediumtext NOT NULL,
  `reward` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forumboards`
--

CREATE TABLE `forumboards` (
  `name` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `totalposts` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forumgroups`
--

CREATE TABLE `forumgroups` (
  `name` mediumtext NOT NULL,
  `posts` int(11) NOT NULL DEFAULT 0,
  `threads` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forumreplies`
--

CREATE TABLE `forumreplies` (
  `inid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `body` mediumtext NOT NULL,
  `siggy` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forumthreads`
--

CREATE TABLE `forumthreads` (
  `inid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `posterid` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `locked` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `body` mediumtext NOT NULL,
  `replies` int(11) NOT NULL,
  `lastposter` mediumtext NOT NULL,
  `order` int(11) NOT NULL,
  `siggy` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `name` mediumtext NOT NULL,
  `icon` int(11) NOT NULL,
  `port` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `creatorid` int(11) NOT NULL,
  `creatorname` mediumtext NOT NULL,
  `banned` int(11) NOT NULL DEFAULT 0 COMMENT '0=no; 1=warning; 2=1 day; 3=3 days; 4=7 days; 5=deleted',
  `ip` mediumtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `creatorip` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupevents`
--

CREATE TABLE `groupevents` (
  `groupid` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `desc` mediumtext NOT NULL,
  `day` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupmembers`
--

CREATE TABLE `groupmembers` (
  `memberid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupranks`
--

CREATE TABLE `groupranks` (
  `rankname` mediumtext NOT NULL,
  `rankvalue` int(11) NOT NULL COMMENT 'the higher than value the higher the rank',
  `groupid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `canDeleteWallPosts` int(11) NOT NULL,
  `canCreateEvents` int(11) NOT NULL,
  `canChangeDescription` int(11) NOT NULL,
  `canExileMembersLowerThan` int(11) NOT NULL,
  `canChangeRanksLowerThan` int(11) NOT NULL,
  `memberid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ownerid` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `logopath` mediumtext NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupwall`
--

CREATE TABLE `groupwall` (
  `groupid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ownerid` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `itemid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `path` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `limited` int(11) NOT NULL,
  `buysell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitekey`
--

CREATE TABLE `invitekey` (
  `invitekey` mediumtext NOT NULL,
  `used` int(11) NOT NULL,
  `usedby` mediumtext NOT NULL,
  `userip` mediumtext NOT NULL,
  `creatorid` int(11) NOT NULL,
  `creatorname` mediumtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `creatorip` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemComments`
--

CREATE TABLE `itemComments` (
  `itemid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `authorid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `type` mediumtext NOT NULL,
  `userid` int(9) NOT NULL,
  `id` int(12) NOT NULL,
  `jobid` int(4) NOT NULL,
  `Forum Moderator` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `type` mediumtext NOT NULL,
  `fromid` int(11) NOT NULL,
  `info` mediumtext NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE `lottery` (
  `enterid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `bucks` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `body` mediumtext NOT NULL,
  `attachedBucks` int(11) NOT NULL,
  `GBL` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `removed` int(11) NOT NULL,
  `archive` int(11) NOT NULL,
  `attachedReebs` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owneditems`
--

CREATE TABLE `owneditems` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `type` mediumtext NOT NULL DEFAULT 'hat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `profitAmount` int(11) NOT NULL,
  `from` int(11) NOT NULL COMMENT '1=shop;2=pm;3=lottery;'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_mainstore`
--

CREATE TABLE `purchases_mainstore` (
  `id` int(11) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_userstore`
--

CREATE TABLE `purchases_userstore` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

CREATE TABLE `refers` (
  `senderid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `code` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reporter` text NOT NULL,
  `reportee` text NOT NULL,
  `reason` text NOT NULL,
  `comment` text NOT NULL,
  `toid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `reportID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Report_User`
--

CREATE TABLE `Report_User` (
  `Report_User` int(11) NOT NULL,
  `id` text NOT NULL,
  `reason` text NOT NULL,
  `comment` text NOT NULL,
  `userid` text NOT NULL,
  `reporterid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_mainstore`
--

CREATE TABLE `sales_mainstore` (
  `id` int(11) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `buysell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_userstore`
--

CREATE TABLE `sales_userstore` (
  `id` int(11) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `buysell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `buysell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `Name` mediumtext NOT NULL,
  `Description` mediumtext NOT NULL,
  `id` int(11) NOT NULL,
  `creatorid` int(11) NOT NULL,
  `path` mediumtext NOT NULL COMMENT 'i.e.- username/skin.png',
  `numbersold` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `islimited` int(11) NOT NULL COMMENT '0=no, 1-inf=amnt',
  `onsell` int(11) NOT NULL DEFAULT 1,
  `type` mediumtext NOT NULL,
  `MouthPath` mediumtext NOT NULL,
  `remaining` int(11) NOT NULL,
  `rare` int(11) NOT NULL,
  `allowcomment` int(11) NOT NULL DEFAULT 1,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ismain` int(11) NOT NULL COMMENT '0=no;yes=true;',
  `accepted` int(11) NOT NULL,
  `reebprice` int(11) NOT NULL,
  `buysell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shout`
--

CREATE TABLE `shout` (
  `by` text NOT NULL,
  `color` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shout_hist`
--

CREATE TABLE `shout_hist` (
  `shouter` text NOT NULL,
  `shout` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statusupdate`
--

CREATE TABLE `statusupdate` (
  `statusupdate` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE `tc` (
  `reebtobuck` int(11) NOT NULL,
  `bucktoreeb` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `myitemid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `token` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bans_IP`
--
ALTER TABLE `bans_IP`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumboards`
--
ALTER TABLE `forumboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumgroups`
--
ALTER TABLE `forumgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumreplies`
--
ALTER TABLE `forumreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumthreads`
--
ALTER TABLE `forumthreads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupevents`
--
ALTER TABLE `groupevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupmembers`
--
ALTER TABLE `groupmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupranks`
--
ALTER TABLE `groupranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupwall`
--
ALTER TABLE `groupwall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitekey`
--
ALTER TABLE `invitekey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemComments`
--
ALTER TABLE `itemComments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owneditems`
--
ALTER TABLE `owneditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_mainstore`
--
ALTER TABLE `purchases_mainstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_userstore`
--
ALTER TABLE `purchases_userstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refers`
--
ALTER TABLE `refers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `Report_User`
--
ALTER TABLE `Report_User`
  ADD PRIMARY KEY (`Report_User`),
  ADD UNIQUE KEY `Report_User_2` (`Report_User`),
  ADD UNIQUE KEY `Report_User_3` (`Report_User`),
  ADD KEY `Report_User` (`Report_User`);

--
-- Indexes for table `sales_mainstore`
--
ALTER TABLE `sales_mainstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_userstore`
--
ALTER TABLE `sales_userstore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc`
--
ALTER TABLE `tc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bans_IP`
--
ALTER TABLE `bans_IP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumboards`
--
ALTER TABLE `forumboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumgroups`
--
ALTER TABLE `forumgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumreplies`
--
ALTER TABLE `forumreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumthreads`
--
ALTER TABLE `forumthreads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupevents`
--
ALTER TABLE `groupevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupmembers`
--
ALTER TABLE `groupmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupranks`
--
ALTER TABLE `groupranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupwall`
--
ALTER TABLE `groupwall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitekey`
--
ALTER TABLE `invitekey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemComments`
--
ALTER TABLE `itemComments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Job`
--
ALTER TABLE `Job`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owneditems`
--
ALTER TABLE `owneditems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profits`
--
ALTER TABLE `profits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_mainstore`
--
ALTER TABLE `purchases_mainstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_userstore`
--
ALTER TABLE `purchases_userstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refers`
--
ALTER TABLE `refers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_mainstore`
--
ALTER TABLE `sales_mainstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_userstore`
--
ALTER TABLE `sales_userstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
