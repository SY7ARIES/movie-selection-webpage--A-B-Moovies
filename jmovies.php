<?php
    include "config.php";
    $movies = array();
    for($i=1; $i<=10; $i++){
        $x = array();
        $result = mysqli_query($conn, "SELECT `title`, `year`, `overview`, `length`, `IMDB`, `link` FROM `movies` WHERE `movieID`=$i");

        while($row = mysqli_fetch_assoc($result)){
            $x[] = $row["title"];
            $x[] = $row["year"];
            $x[] = $row["overview"];
            $x[] = $row["length"];
            $x[] = $row["IMDB"];
            $x[] = $row["link"];
        };
        $movies[] = $x;
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="movies.js" defer></script>
    <link rel="stylesheet" href="smovies.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <?php
    if ($_POST["pref"]) {
        $pref = mysqli_real_escape_string($conn, $_POST["pref"]);
        $movie_choice = substr($pref, 13,1); 
        $movie_num_of_pref = substr($pref, 11,1);
        for($i=1; $i<=3; $i++){
            for($j=1; $j<=9; $j++){
                if($movie_choice==$j and $movie_num_of_pref==$i){
                    mysqli_query($conn, "UPDATE `movie_choice` SET preference$i=$j WHERE preference$i=0");
                }
            }
        }

        //show movie selection page 
        echo
        '<img class="bgm" src="galaxy.jpeg">
        <div class="big-hover-modal"></div>
        <div class="container">
            <div class="movies" id="movies">';                    
                for($i=0; $i<=9; $i++){
                    echo '<div class="movie-box" style="background-image:url('. $movies[$i][3] .'.jpg)">
                            <div class="hover-modal" id="hover-modal-'. $i .'">
                                <h1>'. $movies[$i][0] .'</h1>
                                <button class="btn" onclick="document.getElementById(`hover-modal-'. $i .'`).innerHTML = `<h1>'. $movies[$i][0] .'</h1>` + jpref('. $i+1 .')">Vote</button>
                            </div>
                        </div>';
                }
        echo
            '</div>
                <div class="submit-container"><a href="thankyou.php">Submit</a></div>
            </div>';
    }else{
        //insert junior students data into junior_students table
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $studentID = $_POST["studentID"];

        $srepeat = mysqli_query($conn, "SELECT * FROM `senior_students` WHERE `studentID` = $studentID");
        $jrepeat = mysqli_query($conn, "SELECT * FROM `junior_students` WHERE `studentID` = $studentID");

        //check if user already exist in the database
        if((mysqli_num_rows($srepeat)> 0) OR (mysqli_num_rows($jrepeat)>0)){
        
            //if user already exist:
            echo "<img class='ebgm' src='galaxy.jpeg'>
                    <div class='econtainer'>
                        <br>This user has already voted!<br>
                        <a href='jlogin.php'>Try again</a>
                    </div>
                    ";

        }else{
            //if user is new then add data to junior_students table
            mysqli_query($conn, "INSERT INTO `junior_students` (email, fname, lname, studentID) VALUES ('$email', '$fname', '$lname','$studentID')");
            mysqli_query($conn, "INSERT INTO `movie_choice` (studentID) VALUES ('$studentID')");
            
            //show movie selection page 
            echo
                '<img class="bgm" src="galaxy.jpeg">
                <div class="big-hover-modal"></div>
                <div class="container">
                    <h2>Hi, '. $fname .', please vote for the top 3 movies you want to watch</h2>;
                    <div class="movies" id="movies">';                    
                        for($i=0; $i<=9; $i++){
                            echo '<div class="movie-box" style="background-image:url('. $movies[$i][3] .'.jpg)">
                                    <div class="hover-modal" id="hover-modal-'. $i .'">
                                        <h1>'. $movies[$i][0] .'</h1>
                                        <button class="btn" onclick="document.getElementById(`hover-modal-'. $i .'`).innerHTML = `<h1>'. $movies[$i][0] .'</h1>` + jpref('. $i+1 .')">Vote</button>
                                    </div>
                                </div>';
                        }
            echo
                    '</div>
                </div>';
        }
    }
    ?>

</body>
</html>