<?php 

//mysql beállítás: az "sql-mode" nem lehet STRICT_ALL_TABLES

if ($_SERVER["HTTP_HOST"] == HOST_DEV) $GLOBALS['SQLhasznalat'] = ["dbConnect"=>0,"getQuery"=>0,"setQuery"=>0,"sqlArr"=>[]];

dbConnect();

function getQuery($sql, $viewSQL = 0) 
{
    if ($_SERVER["HTTP_HOST"] == HOST_DEV) {
        $GLOBALS['SQLhasznalat']["getQuery"]++;
        $GLOBALS['SQLhasznalat']["sqlArr"][]=$sql;
    }
    
	if ($viewSQL) echo $sql; 
	
    # timeout : Mysql has gone away
	if (!mysqli_ping ($GLOBALS["db_link"])) { mysqli_close($GLOBALS["db_link"]); dbConnect(); }
	
    $rs = array();
	if ($res = mysqli_query($GLOBALS["db_link"], $sql) or die(mysqli_error($GLOBALS["db_link"]))) 
    {	
		$i = 0;
		while ($rs[$i] = mysqli_fetch_assoc($res)) {$i = $i + 1;}  	
        unset ($rs[$i]); #hogy az utolsó üres 'rekord' lemaradjon
	}
    return $rs;	
}

function setQuery($sql, $viewSQL = 0) 
{
    if ($_SERVER["HTTP_HOST"] == HOST_DEV) {
        $GLOBALS['SQLhasznalat']["setQuery"]++;
        $GLOBALS['SQLhasznalat']["sqlArr"][]=$sql;
	}
    
    if ($viewSQL) echo $sql;
	
    # ha esetleg a hosszu runtime miatt a connection megszakadt, akkor reconnect
	if (mysqli_connect_error()) { dbConnect(); }
	
    $ret = array();
    $ret["result"] = mysqli_query($GLOBALS["db_link"], $sql) or die(mysqli_error($GLOBALS["db_link"]));
    $ret["affected_rows"] = mysqli_affected_rows($GLOBALS["db_link"]);
    $ret["insert_id"] = mysqli_insert_id($GLOBALS["db_link"]);
    
	return $ret;
}

function setQueryBind($sql, array $args)
{
    if ($_SERVER["HTTP_HOST"] == HOST_DEV) {
        $GLOBALS['SQLhasznalat']["setQuery"]++;
        $GLOBALS['SQLhasznalat']["sqlArr"][]=$sql;
	}
    
    //if (0) echo $sql;

	# ha esetleg a hosszu runtime miatt a connection megszakadt, akkor reconnect
	if (mysqli_connect_error()) { dbConnect(); }

	$stmt = mysqli_prepare($GLOBALS["db_link"], $sql);
	$params = [];
	$types  = array_reduce($args, function ($string, &$arg) use (&$params) {
		$params[] = &$arg;
		if (is_float($arg))         $string .= 'd';
		elseif (is_integer($arg))   $string .= 'i';
		elseif (is_string($arg))    $string .= 's';
		else                        $string .= 'b';
		return $string;
	}, '');
	array_unshift($params, $types);

	call_user_func_array([$stmt, 'bind_param'], $params);
	$result = mysqli_stmt_execute($stmt) ? mysqli_stmt_get_result($stmt)  : false;
	mysqli_stmt_close($stmt);

	$ret = array();
	$ret["result"] = $result;
	$ret["affected_rows"] = mysqli_affected_rows($GLOBALS["db_link"]);
	$ret["insert_id"] = mysqli_insert_id($GLOBALS["db_link"]);

	return $ret;
}

function dbConnect() 
{
    # FONTOS hogy a mysqli* fusson, a php.ini-ben a extension=php_mysqli.dll-nek szerepelnie kell a extension=php_mysql.dll -hez hasonlóan
    
    if ($_SERVER["HTTP_HOST"] == HOST_DEV) {
        $GLOBALS['SQLhasznalat']["dbConnect"]++;
    }
    
    $GLOBALS["db_link"] = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or $GLOBALS["db_conn_state"] = false;
    mysqli_select_db($GLOBALS["db_link"], DB_DATABASE) or $GLOBALS["db_conn_state"] = false;
    mysqli_query($GLOBALS["db_link"],"SET NAMES UTF8");
}

?>