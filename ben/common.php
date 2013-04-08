<?php

include_once "bajc_config.php";
// This page is mainly used for all functions in the bajc dev
// 2013-2-24
// Author: Ben
// Email: arkilis@gmail.com
// All copyrights reserved


// get the current date
function getCurDate()
{
    date_default_timezone_set('Australia/Brisbane');
    return  date("Ymd");
}

// get the current date and time 
function getCurDateTime()
{
    date_default_timezone_set('Australia/Brisbane');
    return  date("YmdHis");
}

// Connection to DB
// return conn
function getConn()
{
    // connect to the database
    $conn=mysql_connect("localhost","root","admin") or die("Could not connect:".mysql_error());
    mysql_select_db("bajc");

    return $conn;
}


// get user's email address
// if found return email address
// else return NULL
function getEmailFromUserId($conn, $userid)
{
	if(isset($userid))
	{
		$sql="select email from user where id=".$userid;
		$res= mysql_query($sql, $conn);
		$row= mysql_fetch_array($res, MYSQL_NUM);

		return $row[0];
	}
	else
		return NULL;
}

// get user's username
// if found return user' username
// else return NULL
function getUsernameFromId($conn, $userid)
{
	if(isset($userid))
	{
		$sql="select username from user where id=".$userid;
		$res= mysql_query($sql, $conn);
		$row= mysql_fetch_array($res, MYSQL_NUM);

		return $row[0];
	}
	else
		return NULL;
}

// get user's title and last name from user id
// if found return usre's title and last name
// else return NULL
function getTitleLnameFromId($conn, $userid)
{
	if(isset($userid))
	{
		$sql="select title,lname from user where id=".$userid;
		$res= mysql_query($sql, $conn);
		$row= mysql_fetch_array($res, MYSQL_NUM);

		return $row[0]." ".$row[1];
	}
	else
		return NULL;
}

// get user's id from user's username
// return user's id if found
// otherwise return NULL
function getIdFromUsername($conn, $username)
{
	if(isset($username))
	{
		$sql="select id from user where username='".$username."'";
		$res= mysql_query($sql, $conn);
		$row= mysql_fetch_array($res, MYSQL_NUM);

		return $row[0];
	}
	else
		return NULL;
}

// get system's date and time
// $szDeadline string type, format: Y-m-d H:i:s
// return True or False
function checkDeadline($szDeadline)
{
	date_default_timezone_set('Australia/Brisbane');
	$currentDateTime = date("Y-m-d H:i:s",time());
	$Deadline= strtotime($szDeadline);
	
	if($currentDateTime<$Deadline)
		return true;
	else
		return false;
}





?>
