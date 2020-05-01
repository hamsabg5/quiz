<?php
require('connection.php');
try{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $query = $conn->prepare( "SELECT * FROM users WHERE username='$username';");
		$query->execute();
		if($query->rowCount()>0)
         echo 1;
        else 
         echo 0;
		
		$query = $conn->prepare( "SELECT * FROM users WHERE email='$email';");
		$query->execute();
		if($query->rowCount()>0)
          echo 1;
        else 
          echo 0;
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>
