<?php
/**
 * Created by PhpStorm.
 * User: glenndev
 * Date: 22/12/14
 * Time: 11:38
 */
include 'ConnectDB.php';

OpenConnection();


$Month = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
$Sales = GetEmployeeSalesJSON();

$NewSales = array();

// High charts expects the Sales array items to be Integers
foreach ($Sales as $value) {
    settype($value, "integer");
    array_push($NewSales, $value);
}

$graph_data = array('Month'=>$Month, 'Sales'=>$NewSales);

echo json_encode($graph_data);

CloseConnection();
exit;
?>