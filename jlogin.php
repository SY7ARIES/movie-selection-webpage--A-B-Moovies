<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="A.B. Paterson College">
    <title>A B Moovies | A.B. Paterson College</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="a-b-icon.ico">
</head>
<body>
    <img class="bgm" src="login-bg.png" alt="Winton Center of A. B. Paterson College">    
    <div class="container">
        <div class="container-content">
            <div class="icon">
                <a href="https://www.abpat.qld.edu.au/" target="_blank"><img src="a-b-icon.ico"></a>
                <h2>A B Moovies Voting</h2>
            </div>
            <form action="jmovies.php" method="POST">
                <input type="text" placeholder="Email Address" name="email" class="tbox" id="email" required>
                <input type="text" placeholder="Student ID" name="studentID" class="tbox" id="studentID" required>
                <input type="text" placeholder="First Name" name="fname" class="tbox" id="fname" required>
                <input type="text" placeholder="Last Name" name="lname" class="tbox" id="lname" required>
                <input type="submit" class="sbox">
            </form>
        </div>
    </div>
</body>
</html>