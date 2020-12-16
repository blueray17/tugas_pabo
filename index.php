<?php
    $conn = new mysqli('db_mysql_pabo', 'devuser', 'devpass', 'test_db');
    $sql = "SELECT * from product";
    $result = $conn->query($sql);
    $i = 1;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            echo $row[3]."<br>";
        }
    }
?>