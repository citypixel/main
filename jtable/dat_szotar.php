<?php

try
{
	//Open database connection
	$domain = $_SERVER['HTTP_HOST'];
	if ($domain == 'localhost'){
      $con = mysql_connect("localhost","root","");
      mysql_select_db("merlegek", $con);}
    else{
      $con = mysql_connect("localhost","magnet","center2012");
      mysql_select_db("magnet_center", $con);
    }
    
    mysql_set_charset("utf8",$con);
    $data_table = $_GET["data_table"];
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM $data_table;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
           
		   $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO $data_table (hu, en, ro, megjegyzes) VALUES ('" . $_POST["hu"] . "', '" . $_POST["en"] . "', '" . $_POST["ro"] . "', '" . $_POST["megjegyzes"] . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM $data_table WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);
        
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
        
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
        
		$result = mysql_query("UPDATE $data_table SET hu = '" . $_POST["hu"] . "', en = '" . $_POST["en"] . "', ro = '" . $_POST["ro"] . "', megjegyzes = '" . $_POST["megjegyzes"] . "' WHERE id = '" . $_POST["id"] . "';");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM $data_table WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>