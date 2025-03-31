<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        font-family: BlinkMacSystemFont,-apple-system,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    .bgm{
        object-fit: cover;
        z-index: 0;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }
    .container {
        display: grid;
        gap: 30px 30px;
        grid-template-columns: auto auto;
        height: 300px;
        width: 600px;
        margin-left: 400px;
        margin-top: 140px;
        border: 3px solid black;
        border-radius: 20px;
        background-color: white;
        padding: 30px;
        position: fixed;
    }
    .container a {
        border: 3px solid black;
        border-radius: 20px;
        padding: 30px;
        font-size: 30px;
        text-align: center;
        text-decoration: none;
    }
    .container a:hover{
        text-decoration: underline;
        background-color: gold;
        color: black;
    }
    .jraw {
        background-color: lightgreen;
        color: black;
    }
    .sraw {
        background-color: green;
        color: white;
    }
    .result {
        grid-column: 1/span 2;
        background-color: yellow;
        color: black;
    }
</style>
<body>
    <img class="bgm" src="login-bg.png">
    <div class="container">
        <a href="admin-jraw.php" class="jraw">Junior School Raw Data</a>
        <a href="admin-sraw.php" class="sraw">Senior School Raw Data</a>
        <a href="admin-result.php" class="result">Voting Results</a>
    </div>
</body>
</html>