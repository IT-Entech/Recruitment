<?php
include_once('C:\xampp\htdocs\connectDB\connectDB.php');
$objCon = connectDB();

// Get the province code from the request
$amphur_code = $_GET['amphur_code'];

// Prepare the SQL statement with parameterized query to prevent SQL injection
$sqltb = "SELECT * FROM ms_tambon WHERE amphur_code = ?";
$params = array($amphur_code);
$stmt = sqlsrv_prepare($objCon, $sqltb, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the query
if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch results and output them as JSON
$tambons = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $tambons[] = $row;
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($objCon);

// Output JSON
header('Content-Type: application/json');
echo json_encode($tambons);
?>