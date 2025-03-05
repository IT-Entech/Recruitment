<?php
function connectDB()
{
    // Database connection parameters
    $serverName = "En_Technology_Win2016,55449";  // IP address or hostname of the SQL Server
    $userName = "sa";             // SQL Server login username
    $userPassword = "System2560";      // SQL Server login password
    $dbName = "EntechDB";            // Name of the database to connect to

    // Connection options
    $connectionInfo = array(
        "Database" => $dbName,
        "UID" => $userName,
        "PWD" => $userPassword,
        "ReturnDatesAsStrings" => true,        // Return date values as strings
        "MultipleActiveResultSets" => true,    // Allow multiple active result sets
        "CharacterSet" => 'UTF-8'             // Set character encoding to UTF-8
    );

    // Attempt to establish a connection
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    return $conn;  // Return the connection object (or FALSE if connection fails)
}
if($conn = connectDB())
	{
		//echo "Database Connecteddd.";
	}
?>
