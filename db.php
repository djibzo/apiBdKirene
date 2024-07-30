<?php
$serverName = "DJIBRIL\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"BdKirene");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) 
     die( print_r( sqlsrv_errors(), true));
?>