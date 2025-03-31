<?php 
    include "config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    tr:nth-child(1){
        background-color: gold;
    }    
</style>
<body>
    <table>
        <tr>
            <th>Student's Name</th>
            <th>1st preference</th>
            <th>2nd preference</th>
            <th>3rd preference</th>
        </tr>
    <?php
        $result = mysqli_query($conn, "SELECT ss.fname, ss.lname,
                                                m1.title AS preference1, 
                                                m2.title AS preference2, 
                                                m3.title AS preference3
                                                FROM movie_choice mc
                                                JOIN senior_students ss ON mc.studentID = ss.studentID
                                                LEFT JOIN movies m1 ON mc.preference1 = m1.movieID
                                                LEFT JOIN movies m2 ON mc.preference2 = m2.movieID
                                                LEFT JOIN movies m3 ON mc.preference3 = m3.movieID;");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>" . $row["fname"]. " " . $row["lname"] . "</th><th>" . $row["preference1"]. "</th><th> " . $row["preference2"]. "</th><th> " . $row["preference3"]. "</th></tr>";
          }
    ?>
    </table>
</body>
</html>