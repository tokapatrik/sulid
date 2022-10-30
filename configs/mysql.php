<?php 

dbConnect();

function dbConnect() 
{
	$GLOBALS["dbConnection"] = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
    mysqli_select_db($GLOBALS["dbConnection"], DB_DATABASE);
    mysqli_query($GLOBALS["dbConnection"],"SET NAMES UTF8");
}

function getQuery($query , $echoQuery = 0) 
{
	if ($echoQuery==1)
	{ 
		echo $query; 
	}

    # timeout : Mysql has gone away
	if (!mysqli_ping($GLOBALS["dbConnection"]))
	{ 
		mysqli_close($GLOBALS["dbConnection"]); 
		dbConnect(); 
	}
	
    $data = array();
	$result = mysqli_query($GLOBALS["dbConnection"], $query);
	$error=mysqli_error($GLOBALS["dbConnection"]);
	if ($error=='') 
    {	
		$i = 0;
		while ($data[$i] = mysqli_fetch_assoc($result))
		{
			$i = $i + 1;
		}  	
        unset ($data[$i]);
	}
	else
	{
		die($error);
	}
    return $data;	
}

function setQuery($query , $echoQuery = 0) 
{
    
    if ($echoQuery==1)
	{ 
		echo $query; 
	}
	
    $data = array();
    $data = mysqli_query($GLOBALS["dbConnection"], $query);
	$error=mysqli_error($GLOBALS["dbConnection"]);
	if ($error!='') 
    {
		die($error);
	}
    
	return $data;
}

?>