<?php

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Istanbul');

$MysqlBaglan = mysqli_connect('localhost', 'db_user_0001', '52^yv7eV', 'db_name_0001');

if(!$MysqlBaglan){

	exit("SQL");

}

mysqli_query($MysqlBaglan, "SET NAMES 'UTF8'");

?>