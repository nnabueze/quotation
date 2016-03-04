<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "honeysai_work";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query ="SELECT * from project";
    $result = $conn->query($query);
    $i = 1;
    echo '<table style="width:80%">';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$i.'</td><td>'.$row['ip'].'</td><td>'.$row['email'].'</td><td>'.$row['password'].'</td><td>'.$row['date'].'</td>';
        echo '</tr>';
        $i++;
}
echo '</table>';
