<?php
require('connection.php');
require('session.php');
if (isset($_POST['delete'])) {
		// receive all input values from the form
		$password_1 = $_POST['password_1'];
		$user=$_SESSION['username'];
		if (count($errors) == 0) {// register user if there are no errors in the form
			$c=0;
			$password = hash('gost',$password_1);//encrypt the password before saving in the database
			$query = "DELETE FROM  $table where username='$user' and password='$password';";
            if($conn->exec($query))
            {
                session_destroy();
                unset($_SESSION['username']);
                echo '<script type="text/javascript">';
				echo ' alert("deleted successfully")'; 
				echo '</script>';
                header("location: login.php");
            }
			if($c==0)
			{ 
				echo '<script type="text/javascript">';
				echo ' alert("password incorrect")'; 
				echo '</script>';
				unset($_SESSION['success']);
			}
			else{
			$_SESSION['success'] = "SAVED CHANGES";
			header('location: index.php');
		}
    }
}		
?>

