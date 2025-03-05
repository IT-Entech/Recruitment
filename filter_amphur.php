<?php
include_once('C:\xampp\htdocs\connectDB\connectDB.php');
$objCon = connectDB();

// Get the province code from the request
$province_code = $_GET['province_code'];

// Prepare the SQL statement with parameterized query to prevent SQL injection
$sqlap = "SELECT * FROM ms_amphur WHERE province_code = ?";
$params = array($province_code);
$stmt = sqlsrv_prepare($objCon, $sqlap, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the query
if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch results and output them as JSON
$amphurs = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $amphurs[] = $row;
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($objCon);

// Output JSON
header('Content-Type: application/json');
echo json_encode($amphurs);
?>
