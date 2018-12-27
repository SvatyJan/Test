<?php
$dbserver 	= "localhost";
$dbname 		= "root";
$dbpass 		= "";
$db 			= "Fantasy_game";

$conn = mysqli_connect($dbserver,$dbname,$dbpass,$db);

if($conn){
	//echo "pripojeno";
	}
	
$game_config = "CREATE TABLE IF NOT EXISTS `game_config`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		gamename				varchar(32) NOT NULL,
		maintanence 		int(1) NOT NULL,
		icon					varchar(64) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_config))
	{
		echo "Chyba při vytváření tabulky 'config': ".mysqli_error();
	}

$dotaz = "SELECT * FROM game_config";
$vykon = mysqli_query($conn,$dotaz);

$gamename = "Tales of Hyperia";

if(mysqli_num_rows($vykon) == 0){
	$udelej = "INSERT INTO game_config (gamename,maintanence) VALUES ('$gamename',0)";
	$vykonej = mysqli_query($conn,$udelej);
	}
	
	$game_users = "CREATE TABLE IF NOT EXISTS `game_users`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		username 			varchar(36) NOT NULL,
		password 			varchar(64) NOT NULL,
		email					varchar(64) NOT NULL,
		icon					varchar(64) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_users))
	{
		echo "Chyba při vytváření tabulky 'users': ".mysqli_error();
	}
	
	$game_client = "CREATE TABLE IF NOT EXISTS `game_client`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid				int(32) NOT NULL,	
		username 			varchar(36) NOT NULL,
		currency				int(255) NOT NULL,
		irlcurrency			int(255) NOT NULL,
		xp						int(255) NOT NULL,
		level					int(255) NOT NULL,
		race					varchar(32)NOT NULL,
		location				varchar(32) NOT NULL,
		zone					varchar(32) NOT NULL,
		onjourney			int(8)	NOT NULL,
		honor					int(255) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_client))
	{
		echo "Chyba při vytváření tabulky 'client': ".mysqli_error();
	}
	
	$game_stats = "CREATE TABLE IF NOT EXISTS `game_stats`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid				int(32) NOT NULL,	
		username 			varchar(32) NOT NULL,
		hp						int(255) NOT NULL,
		armor					int(255) NOT NULL,
		magicresist			int(255) NOT NULL,
		basedmg				int(255) NOT NULL,
		str					int(255) NOT NULL,
		agi					int(255) NOT NULL,
		intel					int(255) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_stats))
	{
		echo "Chyba při vytváření tabulky 'stats': ".mysqli_error();
	}
	
	$game_friends = "CREATE TABLE IF NOT EXISTS `game_friends`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid1				int(32) NOT NULL,	
		userid2				int(32) NOT NULL,	
		username1 			varchar(32) NOT NULL,
		username2 			varchar(32) NOT NULL,
		friends				int(1) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_friends))
	{
		echo "Chyba při vytváření tabulky 'friends': ".mysqli_error();
	}
	
	//slot je na typ věci, pokud je to zbraň tak se píše i distanec(melee,ranged),dmgtype(magic,physical)
	$game_items = "CREATE TABLE IF NOT EXISTS `game_items`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid				int(32) NOT NULL,	
		username 			varchar(32) NOT NULL,
		itemname 			varchar(32) NOT NULL,
		gold					int(255)		NOT NULL,		
		slot					varchar(32) NOT NULL,
		armor					int(32) NOT NULL,
		magicresist			int(32) NOT NULL,
		damage				int(32) NOT NULL,
		dmgtype				varchar(32) NOT NULL,
		str					int(32) NOT NULL,
		agi					int(32) NOT NULL,
		intel					int(32) NOT NULL,
		equiped				int(8) NOT NULL,
		icon					varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_items))
	{
		echo "Chyba při vytváření tabulky 'items': ".mysqli_error();
	}
	
	$game_spellbar = "CREATE TABLE IF NOT EXISTS `game_spellbar`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid				int(32) NOT NULL,	
		username 			varchar(32) NOT NULL,
		passive				varchar(32) NOT NULL,
		first					varchar(32) NOT NULL,
		second				varchar(32) NOT NULL,
		third					varchar(32) NOT NULL,
		ultimate				varchar(32) NOT NULL,
		icon1					varchar(32) NOT NULL,
		icon2					varchar(32) NOT NULL,
		icon3					varchar(32) NOT NULL,
		icon4					varchar(32) NOT NULL,
		icon5					varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_spellbar))
	{
		echo "Chyba při vytváření tabulky 'spellbar': ".mysqli_error();
	}
	
	$game_timer = "CREATE TABLE IF NOT EXISTS `game_timer`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid				int(32) NOT NULL,	
		username 			varchar(32) NOT NULL,
		start		 			varchar(32) NOT NULL,
		expire	 			varchar(32) NOT NULL,
		cancel	 			int(8) NOT NULL,
		reason 				varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_timer))
	{
		echo "Chyba při vytváření tabulky 'timer': ".mysqli_error();
	}
	
		$game_enemies = "CREATE TABLE IF NOT EXISTS `game_enemies`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name 					varchar(32) NOT NULL,
		hp						int(255) NOT NULL,
		armor					int(255) NOT NULL,
		magicresist			int(255) NOT NULL,
		basedmg				int(255) NOT NULL,
		str					int(255) NOT NULL,
		agi					int(255) NOT NULL,
		intel					int(255) NOT NULL,
		passive				varchar(32) NOT NULL,
		first					varchar(32) NOT NULL,
		second				varchar(32) NOT NULL,
		third					varchar(32) NOT NULL,
		ultimate				varchar(32) NOT NULL,
		icon					varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_enemies))
	{
		echo "Chyba při vytváření tabulky 'enemies': ".mysqli_error();
	}
	
	$game_party = "CREATE TABLE IF NOT EXISTS `game_party`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		leader				varchar(32) NOT NULL,
		second				varchar(32) NOT NULL,
		third					varchar(32) NOT NULL,
		forth					varchar(32) NOT NULL,
		fifth					varchar(32) NOT NULL,
		action				varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_party))
	{
		echo "Chyba při vytváření tabulky 'party': ".mysqli_error();
	}
	
	$game_invites = "CREATE TABLE IF NOT EXISTS `game_invites`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		userid1				int(255) NOT NULL,
		username1			varchar(32) NOT NULL,
		userid2				int(255) NOT NULL,
		username2			varchar(32) NOT NULL,
		party					varchar(32) NOT NULL,
		guild					varchar(32) NOT NULL,
		text					varchar(32) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_invites))
	{
		echo "Chyba při vytváření tabulky 'invites': ".mysqli_error();
	}
	
	$game_chat = "CREATE TABLE IF NOT EXISTS `game_chat`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		username				varchar(32) NOT NULL,
		idhrace				int(16) NOT NULL,
		race					varchar(32) NOT NULL,
		text					varchar(255) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_chat))
	{
		echo "Chyba při vytváření tabulky 'chat': ".mysqli_error();
	}
	
	$game_challenge = "CREATE TABLE IF NOT EXISTS `game_challenge`(
		id						int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		challenger1			varchar(32) NOT NULL,
		challengerid1		int(16) NOT NULL,
		challenger2			varchar(32) NOT NULL,
		challengerid2		int(16) NOT NULL,
		pending				int(1) NOT NULL)
		ENGINE=MyISAM  	DEFAULT CHARSET=utf8";

	if (!mysqli_query($conn, $game_challenge))
	{
		echo "Chyba při vytváření tabulky 'challenge': ".mysqli_error();
	}
	
?>