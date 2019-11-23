<?php

class DBConnection{
	private static $host="localhost";
	private static $db_uname="root";
	private static $db_pass ="";	
	private static $dbname ="stylish_db";

	public static function connectDB(){

		$dbobj = new mysqli(self::$host,self::$db_uname,self::$db_pass,self::$dbname);

		if($dbobj->connect_errno){
			echo("DB Connection error <br>");
			echo("Error Text : ".$dbobj->connect_error);
			exit;
		}
		return $dbobj;
	}
}




?>