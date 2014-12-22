<?php
/**
 * Created by PhpStorm.
 * User: glenndev
 * Date: 22/12/14
 * Time: 11:15
 */

function OpenConnection()
{
    global $conn;

    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "SaleDB";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



}

function CloseConnection()
{
    global $conn;

    $conn->close();

}


function PopulateEmployeeTable()
{
    global $conn;

    $sql = "SELECT * FROM EmployeeSales";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while(  $row = $result->fetch_array(MYSQLI_ASSOC)) {


            echo "<tr>". "<TD>"."Jan"."</TD>"."<TD>".$row['Jan']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."Feb"."</TD>"."<TD>".$row['Feb']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."March"."</TD>"."<TD>".$row['March']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."April"."</TD>"."<TD>".$row['April']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."May"."</TD>"."<TD>".$row['May']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."June"."</TD>"."<TD>".$row['June']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."July"."</TD>"."<TD>".$row['July']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."August"."</TD>"."<TD>".$row['Aug']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."September"."</TD>"."<TD>".$row['Sept']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."October"."</TD>"."<TD>".$row['Oct']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."November"."</TD>"."<TD>".$row['Nov']."</TD>"."</tr>";
            echo "<tr>". "<TD>"."December"."</TD>"."<TD>".$row['Dec']."</TD>"."</tr>";



        }
    } else {
        echo "0 results";
    }

}


function GetEmployeeSalesJSON()

{
    global $conn;

    $sql = "SELECT * FROM EmployeeSales";
    $result = $conn->query($sql);




    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_array(MYSQLI_NUM);
    } else {
        echo "0 results";
    }

    return $row;

}




?>





