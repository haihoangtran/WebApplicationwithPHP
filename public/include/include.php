<?

/*
 * Title: Connect to mySQL Database
 * This code will attempt to connect to the database located at
 * limi.cs.uh.edu:3306, if unsuccessfull, a "die" command will be issued.
 * Name: Michael Tran
 * Date: 11/29/2012
 * Date Approved:
 * Name of Approver:
 *
 * $username,password are the login credentials
 * $server, database are the database to connect to
 *
 * Names of files accessed:
 * Names of files changed:
 *
 * Faults:
 */
?><?php

//--START Connect to DB
$username = "TEAM6OFHS";
$password = "TEAM6OFHS#";
$server = "limi.cs.uh.edu:3306";
$database = "TEAM6OFHS";

$link = mysql_connect($server, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

// make dvddb the current db
@mysql_select_db($database) or die("Unable to select database");

//--END Connect to DB
?>
