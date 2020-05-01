<?php require('session.php');?>
<?php require('update_score.php');?>
<html>
<head>
    <title>Quizz Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="quiz_style.css">
</head>

<body>
    <h2>Quiz</h2>
    <p id="instruction"> on start you'll have 50 seconds to answer</p>
    <b><p id="timer" style="align:right;">time left:50secs</p></b>
    <button id="start" onclick="start()">Start</button>
    <div id="quiz"></div>
    <form method="post" action=" ">
        <div id="score1"></div>
        <div id="results"></div>
</form>
<a href="index.php">Home</a>
</body>
<script src="quiz_handler.js"></script>
</html>