<?php //подключаемся к базе mysql
$host = "localhost"; //адрес сервера
$user_db = "root"; //имя админа
$pass = "";
$db = "reg";
mysql_connect($host, $user_db, $pass) or die ("No connection to mysql!!!"); //либо происходит подключение, либо умирает в случае ошибки
mysql_select_db ($db) or die ("Can' find DB!!!"); //выбираем бд 
mysql_query("set names utf-8");
session_start();
if (isset($_SESSION['user_id'])) {
    $query = mysql_query("SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'");
    if (mysql_num_rows($query) == 1) {
        $user = mysql_fetch_array($query);
    }
}


?>