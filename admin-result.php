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
            <th>NO.</th>
            <th>Movie</th>
            <th>Votes recived</th>
        </tr>
    <?php
        $result = mysqli_query($conn, "SELECT 
                                                    m.title,
                                                    SUM(CASE WHEN mc.preference1 = m.movieID THEN 3 ELSE 0 END +
                                                        CASE WHEN mc.preference2 = m.movieID THEN 2 ELSE 0 END +
                                                        CASE WHEN mc.preference3 = m.movieID THEN 1 ELSE 0 END) AS points
                                                        FROM movie_choice mc
                                                        JOIN junior_students js ON mc.studentID = js.studentID
                                                        JOIN movies m ON m.movieID IN (mc.preference1, mc.preference2, mc.preference3)
                                                        GROUP BY m.title
                                                        ORDER BY points DESC;");
        $x=1;
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>" . $x . "</th><th>" . $row['title'] . "</th><th> " . $row["points"] . "</th></tr>";
            $x=$x+1;
          }
    ?>
    </table>
    <br><br><br>
    <table>
        <tr>
            <th>NO.</th>
            <th>Movie</th>
            <th>Votes recived</th>
        </tr>
    <?php
        $result = mysqli_query($conn, "SELECT 
                                                    m.title,
                                                    SUM(CASE WHEN mc.preference1 = m.movieID THEN 3 ELSE 0 END +
                                                        CASE WHEN mc.preference2 = m.movieID THEN 2 ELSE 0 END +
                                                        CASE WHEN mc.preference3 = m.movieID THEN 1 ELSE 0 END) AS points
                                                        FROM movie_choice mc
                                                        JOIN senior_students ss ON mc.studentID = ss.studentID
                                                        JOIN movies m ON m.movieID IN (mc.preference1, mc.preference2, mc.preference3)
                                                        GROUP BY m.title
                                                        ORDER BY points DESC;");
        $x=1;
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>" . $x . "</th><th>" . $row['title'] . "</th><th> " . $row["points"] . "</th></tr>";
            $x=$x+1;
          }
    ?>
    </table>
</body>
</html>